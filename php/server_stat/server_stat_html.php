<html>
	<h2>服务器状态</h2>

	<form action="./server_stat.php" method="post" accept-charset="UTF-8">
		<?php require_once "../serverls.php";?>
		
<?php
echo "enum NODE_TYPE<br/>"; 
echo "{<br/>"; 
echo "	DB = 1,				// 数据库服务器<br/>"; 
echo "	ACTORSERVER = 2,	// actor 服务器<br/>"; 
echo "	GAME = 3,			// 逻辑服务器<br/>"; 
echo "	GATEWAY = 4,		// 网关服务器<br/>"; 
echo "	LOGIN = 5,			// 登录服务器<br/>"; 
echo "	ROBOT = 6,			// 测试机器人服务器<br/>"; 
echo "	WORLD = 7,			// 世界服务器<br/>"; 
echo "	LOG = 8,			// 日志服务器<br/>"; 
echo "	RELOADCSV = 9,		// 重载分发csv服务器<br/>"; 
echo "	CROSS = 10,			// 跨服服务器<br/>"; 
echo "	CROSSDB = 11,		// 跨服数据库服务器<br/>"; 
echo "};<br/>"; 
?>
		NODE_TYPE:<input name="type" type="text"/><br/>
		<input type="submit" value="查看"/><br/>
	</form>
</body>
</html>