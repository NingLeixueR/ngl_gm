<html>
	<h2>�����ʼ�</h2>
	<form action="./add_mail.php" method="post" accept-charset="UTF-8">
		<?php require_once "../serverls.php";?>
		���id:<input name="roleid" type="text"/><br/>
		�ʼ�����:<br/>
		<textarea id="content" name="content" rows="10" cols="100"></textarea><br/>
		�ʼ�����(��Ʒid*��Ʒ���� ����*�ŷָ�):<br/>
		<textarea id="items" name="items" rows="5" cols="100"></textarea><br/>
		<input type="submit" value="���"/><br/>
	</form>
</body>
</html>