<html>
	<h2>������״̬</h2>

	<form action="./server_stat.php" method="post" accept-charset="UTF-8">
		<?php require_once "../serverls.php";?>
		
<?php
echo "enum NODE_TYPE<br/>"; 
echo "{<br/>"; 
echo "	DB = 1,				// ���ݿ������<br/>"; 
echo "	ACTORSERVER = 2,	// actor ������<br/>"; 
echo "	GAME = 3,			// �߼�������<br/>"; 
echo "	GATEWAY = 4,		// ���ط�����<br/>"; 
echo "	LOGIN = 5,			// ��¼������<br/>"; 
echo "	ROBOT = 6,			// ���Ի����˷�����<br/>"; 
echo "	WORLD = 7,			// ���������<br/>"; 
echo "	LOG = 8,			// ��־������<br/>"; 
echo "	RELOADCSV = 9,		// ���طַ�csv������<br/>"; 
echo "	CROSS = 10,			// ���������<br/>"; 
echo "	CROSSDB = 11,		// ������ݿ������<br/>"; 
echo "};<br/>"; 
?>
		NODE_TYPE:<input name="type" type="text"/><br/>
		<input type="submit" value="�鿴"/><br/>
	</form>
</body>
</html>