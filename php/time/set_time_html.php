<html>
	<h2>���÷�����ʱ��</h2>
	<form action="./set_time.php" method="post" accept-charset="UTF-8">
		<?php require_once "../serverls.php";?>
		<?php require_once "../servertype.php";?>
		��:<input name="year" type="text"/><br/>
		��:<input name="mon" type="text"/><br/>
		��:<input name="day" type="text"/><br/>
		ʱ:<input name="hour" type="text"/><br/>
		��:<input name="min" type="text"/><br/>
		��:<input name="sec" type="text"/><br/>
		<input type="submit" value="����"/><br/>
	</form>
</body>
</html>