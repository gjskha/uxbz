<? 
include('ShorterUrl.php');
$session = new ShorterUrl;

//print_r($session);

$res = $session->getShorterUrl("dskdjskjdskjds");

echo "res is $res";
$res = $session->getLongerUrl("youwontfindme");

echo "res is $res";

// $session->DumpRecords();

$longUrl = $session->getLongerUrl("ggy6");

print "longUrl is $longUrl\n";

$session->setUserLocation("1.1.1.1","ggy6");
?>
