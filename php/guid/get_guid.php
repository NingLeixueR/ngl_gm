<?php
 include '../SocketByte.php';
 
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
	'actor_name' => 'ACTOR_GM',
	'operator' => 'guid',
	'data' => array(
		'm_actor_name' => $_POST['m_actor_name'],
		'm_area' => $_POST['m_area'],
		'm_dataid' => $_POST['m_dataid'],
	)
 );
 
 $json = json_encode($arr); 
 $so->send($json);
 $response = $so->wait_response(); 

?>