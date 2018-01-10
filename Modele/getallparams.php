<?PHP
foreach ($_POST as $id => $valeur){
	$cmd1='$'.$id.'="";'; //	echo $cmd1.'<br/>';
	eval($cmd1);
	$cmd2 = 'if (isset($_POST["'.$id.'"])) {$'.$id.'=$_POST["'.$id.'"]; unset($_POST["'.$id.'"]); } '; //	echo $cmd2.'<br/>';
	eval($cmd2);	
}
?>