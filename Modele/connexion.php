<?PHP
header( 'content-type: text/html; charset=utf-8');
session_start();
$connexion = 'mysql:host=localhost;dbname=pulsar';
$user = "root";
$mdp = "A2Z3E4R5T6Y7";
try {
    $db = new PDO($connexion, $user, $mdp);
	$flag_connect = 'Connexion effectuée';

	}
catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
	$flag_connect = '***** Connexion non effectuée';
    die();
}
//echo $flag_connect;
?>
