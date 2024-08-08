<?php
require_once 'config.php';

class SocketByte {
	private $socket;
	
	public function connect($server, $port) 
	{
		//echo "<br/>$server, $port<br/>";
		$this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($this->socket === false) {
			echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
			return false;
		}
		socket_set_option($this->socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => 15, 'usec' => 0));
		$result = socket_connect($this->socket, $server, $port);
		if ($result === false) {
			echo "socket_connect() failed.\nReason:  ($server)($port)($result) " . socket_strerror(socket_last_error($this->socket)) . "\n";
			return false;
		}
		return true;
	}
	
	public function connectServer($id)
	{
		$con = mysql_connect(DB_IP . ":" . DB_PORT, DB_USER, DB_PASS);
		if(!$con)
		{
			echo 'Can not connect: ' . mysql_error();
			return false;
		}
			
		mysql_select_db(GMSYS, $con);
		mysql_query("set names 'utf8'");
		
		$QueryStr = "select * from db_server where id={$id};";
		//echo $QueryStr."<br/>";
		$QueryResult = mysql_query($QueryStr);
		if ($Row = mysql_fetch_array($QueryResult, MYSQL_ASSOC))
		{
			//echo "{$Row['ip']}:{$Row['port']}<br/>";
			//return false;
			return $this->connect($Row['ip'], $Row['port']);
		}
		return false;
	}
	
	public function close() 
	{
		sleep(1);
		socket_close($this->socket);
	}
	
//enum EPH
//{
//	EPH_MASK_VALUE = 0xff,
//	EPH_MASK_COUNT = 2,
//	EPH_MASK = 0,								// 用于确认是否使用包
//	EPH_BYTES = EPH_MASK_COUNT,					// 协议字节数
//	EPH_TIME,									// 发送端的时间戳
//	EPH_PROTOCOLNUM,							// 协议号
//	EPH_PROTOCOLTYPE,							// 协议类型 EPROTOCOL_TYPE
//	EPH_ACTOR_TYPEAREA,							// ACTOR_TYPE_AREA
//	EPH_ACTOR_ID,								// ACTOR_ID
//	EPH_REQUEST_ACTOR_TYPEAREA,					// Request REQUEST_ACTOR_TYPE_AREA
//	EPH_REQUEST_ACTOR_ID,						// Request ACTOR_ID
//	EPH_SUM,	
//};

	private $EPH_MASK_COUNT 	= 2;
	private $EPH_MASK 			= 0;
	private $EPH_BYTES 			= 2;
	private $EPH_TIME 			= 3;
	private $EPH_PROTOCOLNUM 	= 4;
	private $EPH_PROTOCOLTYPE 	= 5;
	private $EPH_ACTOR_TYPEAREA = 6;
	private $EPH_ACTOR_ID 		= 7;
	private $EPH_REQUEST_ACTOR_TYPEAREA = 8;
	private $EPH_REQUEST_ACTOR_ID = 9;
	private $EPH_SUM 			= 10;
	
	private $head = array();
	private $recvhead= array();
	private $datajson = "";
	
	public function SetMask()
	{
		for($i =  $this->EPH_MASK;$i < $this->EPH_MASK + $this->EPH_MASK_COUNT;++$i)
		{
			$this->head[$i] = 0xffffffff;
		}
	}
	
	public function SetTime()
	{
		$this->head[$this->EPH_TIME] = time(); 
	}
	
	public function SetProtocolNum()
	{
		$this->head[$this->EPH_PROTOCOLNUM] = 200000001;
	}
	
	public function SetProtocolType()
	{
//enum EPROTOCOL_TYPE
//{
//	EPROTOCOL_TYPE_CUSTOM,			// 自定义二进制协议
//	EPROTOCOL_TYPE_PROTOCOLBUFF,	// protobuff协议
//	EPROTOCOL_TYPE_COUNT,
//	EPROTOCOL_TYPE_ERROR,
//};
		$this->head[$this->EPH_PROTOCOLTYPE] = 0;
	}
	
	public function SetActor()
	{
		$this->head[$this->EPH_ACTOR_TYPEAREA] = -65516;
		$this->head[$this->EPH_ACTOR_ID] = -1;
	}
	
	public function SetRequestActor()
	{
		$this->head[$this->EPH_REQUEST_ACTOR_TYPEAREA] = -1;
		$this->head[$this->EPH_REQUEST_ACTOR_ID] = -1;
	}
	
	
	public function SetBytes()
	{
		//echo "Byte:".(2+strlen($this->datajson))."<br/>";
		$this->head[$this->EPH_BYTES] = 2+strlen($this->datajson);
	}
	
	function intToUint16($value) 
	{
		// 确保$value是int类型
		$value = intval($value);
		return $value & 0xFFFF; // 使用位运算，保留最低的16位
	}
	
	public function send($jsonstr)
	{
		$this->datajson = $jsonstr;
		
		$this->SetMask();
		$this->SetTime();
		$this->SetProtocolNum();
		$this->SetProtocolType();
		$this->SetActor();
		$this->SetRequestActor();
		$this->SetBytes();
		ksort($this->head);
		
		$sbuff = "";
		//echo "head:";
		foreach($this->head as $k => $v)
		{
			$sbuff .= pack("V", $v);
			//echo $k.":".$v." ";
		}
		//echo "<br/>";
		
		
		$sbuff .= pack("S", $this->intToUint16(strlen($this->datajson)));
		$sbuff .= $this->datajson;
		
		//echo "sbuff = [{$sbuff}]<br/>";
		
		socket_write($this->socket, $sbuff, 4*$this->EPH_SUM+2+strlen($this->datajson));		
	}
	
	public function wait_response($isjson = true) 
	{
		$rst = socket_read($this->socket, 4*$this->EPH_SUM);
		if (!$rst) 
		{
			if ($rst != "")
				echo socket_strerror(socket_last_error());
			else
				die("Socket closed by server!<br>");
			return false;
		}
		
		$recvhead = array();
		for($i = 0; $i < 4*$this->EPH_SUM ;$i += 4)
		{
			$bin = substr($rst, $i, $i+4);
			$arr = unpack("V", $bin);
			$recvhead[$i/4] = $arr[1];
		}
		
		//print_r($recvhead);
		$rst = socket_read($this->socket, $recvhead[$this->EPH_BYTES]);
		//echo "<br/>$rst<br/>";
		$rst = substr($rst, 2);
		//echo "<br/>收到的json<br/>$rst<br/>";
		if($isjson)
			header('Content-Type: application/json');
		echo "$rst";
		return json_decode($rst, true);
	}
	
}
?>