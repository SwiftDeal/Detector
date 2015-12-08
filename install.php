<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

if(isset($_POST['install_detector'])){

	if(empty($_POST['db_host'])){
		$db_host = "localhost";
	}else{
		$db_host = $_POST['db_host'];
	} 
	$db_name = $_POST['db_name'];
	$db_user = $_POST['db_user'];
	$db_pass = $_POST['db_pass'];
	
	$db_ini =getcwd()."/application/configuration/database.ini";

	$file = fopen($db_ini , "w+");
	if($file){
		$configs = "database.default.type     ="."mysql \n";
		$configs.= "database.default.host     =".$db_host."\n";
		$configs.= "database.default.username =".$db_user."\n";
		$configs.= "database.default.password =".$db_pass."\n";
		$configs.= "database.default.port     ="."3306\n";
		$configs.= "database.default.schema   =".$db_name."\n";

		if(fwrite($file, $configs))
		{
			echo "SwiftDetector Successfully installed";
			header("Location : install");
		}
		else{
			echo "some error occured.. Contact Developer .. meraj@cloudstuffs.com";
		}
		fclose($file);
	}
	else{
		echo "<br/>File permission denied.. Login to CPanel to manage permission";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Install SwiftDetector</title>
</head>
<body>
<center>
<h1>SwiftDetector Install</h1>
<br/>
<form action="" method="post" align="right">
	Host Assres *: <input type="text" name="db_host" placeholder="ENter databse Host"> If localhost leave empty<br/>
	Database Name: <input type="text" name="db_name" placeholder="ENter Database Name"><br/>
	Database User: <input type="text" name="db_user" placeholder="ENter Database user"><br/>
	Database Password: <input type="password" name="db_pass" placeholder="Enter Password"><br/>
	<input type="submit" value="Install" name="install_detector">
</form>
</center>
</body>
</html>