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
	'actor_name' => 'actor_manage_role',
	'operator' => 'roleban',
	'data' => array(
		'roleid' => $_POST['roleid'],
		'stat' => $_POST['stat'],
	)
 );
 
 $json = json_encode($arr); 
 $so->send($json);
 $response = $so->wait_response(); 

?>