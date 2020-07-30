<? php
$dbh = new PDO('mysql:host=localhost;dbname=rentalmobil', 'root', 'root');
	
$db = $dbh->prepare('SELECT * FROM mobil');
$db=>execute();
$mobil = $db->fetchALl(PDO::FETCH_ASSOC);

$data = json_encode($mobil);
echo $data;



?>