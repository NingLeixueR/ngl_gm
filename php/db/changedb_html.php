<html>
	<h2>��������</h2>
	<form action="./changedb.php" method="post" accept-charset="UTF-8">
		<?php require_once "../serverls.php";?>
		<?php
			//enum ENUM_DB
			//{
			//	ENUM_DB_ACCOUNT = 0;		// �˺�����
			//	ENUM_DB_ROLE = 1;			// �������
			//	ENUM_DB_BRIEF = 2;			// ��Ҽ�Ҫ����
			//	ENUM_DB_BAG = 3;			// ��������
			//	ENUM_DB_KEYVALUE = 4;		// ��ֵ����
			//	ENUM_DB_MAIL = 5;			// �ʼ�����
			//	ENUM_DB_GUILD = 6;			// ��������
			//	ENUM_DB_NOTICE = 7;			// ��������
			//	ENUM_DB_RANKLIST = 8;		// ��������
			//	ENUM_DB_ACTIVITY = 9;		// �����
			//	ENUM_DB_TASK = 10;			// ��������
			//	ENUM_DB_COUNT = 11;
			//};
		?>
		<select name="db">
			<option value="0">�˺�����</option>
			<option value="1">�������</option>
			<option value="2">��Ҽ�Ҫ����</option>
			<option value="3">��������</option>
			<option value="4">��ֵ����</option>
			<option value="5">�ʼ�����</option>
			<option value="6">��������</option>
			<option value="7">��������</option>
			<option value="8">��������</option>
			<option value="9">�����</option>
			<option value="10">��������</option>
		</select><br/>
		data:<br/>
		<textarea id="data" name="data" rows="50" cols="100"></textarea><br/>
		<input type="submit" value="��ѯ"/><br/>
	</form>
</body>
</html>