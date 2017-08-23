<html>
<head >
<title> Registrieren </title>
<meta charset ="UTF-8" />
<link rel="stylesheet" href="style.css"  type="text/css"/>
</head>
<body>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Gallerien</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!--  template -->
    <link href="starter-template.css" rel="stylesheet">
       <link href="style.css" rel="stylesheet">
    
 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Gallerien</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>      
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li> 
              <li><a href="JSONs.php">JSONs</a></li>
			  <li><a href="admin.php">Login</a></li>
			  <li class="active"><a href="Registrieren.php">Registrieren</a></li>	
			  <li ><a href="suche.php">Suchen </a></li>
			  <li ><a href="">NaAaJa</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
   
    <div class="containere">
	
	

<?php
include "config.php";

#===========POST
if(isset ($_POST['log'])) {
$username = $_POST['username'];
$password = md5 ( $_POST['password']);
$email    = $_POST['email'];
$name     = $_POST['name'];
$vorname  = $_POST['vname'];
}
#===========POST

    if(isset($_POST['log'])){
	if(empty($username) or empty ($password) or empty ($email) ){		
		echo' <font color="#3399ff"> <h3> Fühllen Sie Bitte alles aus</h3> </font> ';
}
	else{
		$insertuser = mysqli_query 
		($_SESSION["connection"],
		"INSERT INTO users (username,password,email,name,vorname) 
		values ('$username','$password','$email','$name','$vorname')");
		if (isset($insertuser)) {
			
			echo' <font color="#3399ff"> <h3>Ihre Daten sind erfolgreich eingefügt</h3> </font> ';
		}	
	}
}
?>

<p class="texto">Registrieren</p>
<div class="Registro">
<div  id="login">
<form method="POST" name ="registrieren.php" >
<span class="fontawesome-envelope-alt"></span><input type="text"   placeholder="Name" name="name" >
<span class="fontawesome-lock"></span><input type="text" name="vname" id="" required placeholder="Vorname"> 
<span class="fontawesome-envelope-alt"></span><input type="text" required placeholder="Email" name="email" >
<span class="fontawesome-user"></span><input type="text" required placeholder="Benutzer Name" name="username" > 
<span class="fontawesome-envelope-alt"></span><input name="password" type="password"  required placeholder="Password">
			<input type="submit" value="Speichern" name="log">
</div>
</body>
</html>