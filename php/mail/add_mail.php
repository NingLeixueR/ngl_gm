<?php
 include '../SocketByte.php';
 
 $array = explode("\r\n",$_POST['items']);
 $arrayitem = array();
 foreach($array as $id => $item)
 {
	 $items = explode("*", $item);
	 $arrayitem[] = array(
		"itemtid"=>$items[0],
		"itemtcount"=>$items[1],
	 );
 }
 
 $so = new SocketByte();
 if($so->connectServer($_POST['server']) == false)
 {
	 echo "connect err!!!";
	 return;
 }
 
 /*
	��Ҫ���͸����������ֶΰ���
	actor_name  ָ��actor������  ��������
	actor_id	�����ƶ�actor    �ǵ�������
	operator	�ƶ��������ͣ��Զ����ַ�����
	data        ��ѡ����	
 */
 
 $arr = array(
	'actor_name' => 'ACTOR_MAIL',
	'operator' => 'add_mail',
	'data' => array(
		'roleid' => $_POST['roleid'],
		'content' => $_POST['content'],
		'items' => $arrayitem,
	)
 );
 
 $json = json_encode($arr); 
 $so->send($json);
 $response = $so->wait_response(); 

?>