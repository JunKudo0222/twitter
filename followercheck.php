<?php
$dbuser="azurefennec478";
$dbname="azurefennec478_new";
$dbhost="mysql634.db.sakura.ne.jp";
$dbpassword="Iojk3231";
$dsn = "mysql:dbname=".$dbname.";host=".$dbhost.";charset=utf8";
try {
	$db = new PDO($dsn, $dbuser, $dbpassword);
} catch (PDOException $e) {
	exit;
}
$stmt = $db->prepare("SELECT screen_name,id FROM accounts WHERE registry_datetime IS NUll");
		$res = $stmt->execute();
		if( $res ) {
			$ids = $stmt->fetch(PDO::FETCH_ASSOC);
		}
        $url=$ids['screen_name']."/followers";
header('Location: https://twitter.com/'.$url);
exit;
