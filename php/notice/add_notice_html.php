<html>
	<h2>��ӹ���</h2>
	<form action="./add_notice.php" method="post" accept-charset="UTF-8">
		<?php require_once "../serverls.php";?>
		��������:<br/><textarea id="m_notice" name="m_notice" rows="50" cols="100"></textarea><br/>
		��ʼʱ��:<input name="m_starttime" type="text"/><br/>
		����ʱ��:<input name="m_finishtime" type="text"/><br/>
		<input type="submit" value="���"/><br/>
	</form>
</body>
</html>