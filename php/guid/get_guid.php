<?php
 include '../SocketByte.php';
 
 $so = new SocketByte();
 if($so->connectServer($_POST['server']) == false)
 {
	 echo "connect err!!!";
	 return;
 }
 
 /*
	需要发送给服务器的字段包括
	actor_name  指定actor的类型  单例必须
	actor_id	操作制定actor    非单例必须
	operator	制定操作类型（自定义字符串）
	data        可选数据	
 */
 
 $arr = array(
	'actor_name' => 'ACTOR_GM',
	'operator' => 'guid',
	'data' => array(
		'servertype' => array(7),
		'actor_name' => $_POST['actor_name'],
		'area' => $_POST['area'],
		'dataid' => $_POST['dataid'],
	)
 );
 
 $json = json_encode($arr); 
 $so->send($json);
 $response = $so->wait_response(); 

?>