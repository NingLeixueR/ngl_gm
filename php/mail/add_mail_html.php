<html>
	<h2>�����ʼ�</h2>
	<form action="./add_mail.php" method="post" accept-charset="UTF-8">
		<?php require_once "../serverls.php";?>
		���id:<input name="m_roleid" type="text"/><br/>
		�ʼ�����:<br/>
		<textarea id="m_content" name="m_content" rows="10" cols="100"></textarea><br/>
		�ʼ�����(��Ʒid*��Ʒ���� ����*�ŷָ�):<br/>
		<textarea id="m_items" name="m_items" rows="5" cols="100"></textarea><br/>
		<input type="submit" value="���"/><br/>
	</form>
</body>
</html>