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
	'actor_id' => $_POST['m_roleid'],
	'operator' => 'bantalk',
	'data' => $_POST['m_duration']
 );
 
 $json = json_encode($arr); 
 $so->send($json);
 $response = $so->wait_response(); 

?>