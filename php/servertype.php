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
echo '<input name="servertype[]" type="checkbox" value="1">DB-���ݿ������</option><br/>';
echo '<input name="servertype[]" type="checkbox" value="2">ACTOR-actor������</option><br/>';
echo '<input name="servertype[]" type="checkbox" value="3">GAME-�߼�������</option><br/>';
echo '<input name="servertype[]" type="checkbox" value="4">GATEWAY-���ط�����</option><br/>';
echo '<input name="servertype[]" type="checkbox" value="5">LOGIN-��¼������</option><br/>';
//echo '<input name="servertype[]" type="checkbox" value="6">ROBOT-���Ի����˷�����</option><br/>';
echo '<input name="servertype[]" type="checkbox" value="7">WORLD-���������</option><br/>';
//echo '<input name="servertype[]" type="checkbox" value="8">LOG-��־������</option><br/>';
//echo '<input name="servertype[]" type="checkbox" value="9">RELOADCSV-���طַ�csv������</option><br/>';
//echo '<input name="servertype[]" type="checkbox" value="10">CROSS-���������</option><br/>';
//echo '<input name="servertype[]" type="checkbox" value="11">CROSSDB-������ݿ������</option><br/>';
?>