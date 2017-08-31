<?PHP

session_start();
include "config.php";
if(empty($_SESSION["user_id"]))     //User eingeloggt
{
?>
<!DOCTYPE html>
<html lang="en">
  <head >
    <meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <title>Gallerien Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">      <!--Beginn Responsive Design (Bootstrap)-->
      <div class="container">
        <div class="navbar-header">
		<a class="navbar-brand" href="#">Login</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="admin.php.php"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="index.php">Home</a></li>
			<li class="active"><a href="#">Login</a></li>
			<li ><a href="registrieren.php">Registrieren</a></li>   
			 	
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>                                                                 <!--Ende Responsive-->
    <div class="container">
<?PHP
echo $output;
?>
        
<!-- Anmedeformular-->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
<div  id="login">
<form method="POST" action="admin.php">
    <span class="fontawesome-user"></span>
          <input type="text" id="username" placeholder="Benutzername" name = "username" value="" required >
       

          <input type="password" id ="password" placeholder="Password" name = "password" value="" required >
        
        <input type="submit" value="Anmelden" id="submit" name ="submit">

</form>

<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
<center>
<font color="#999999">
<h6> Moderne Web Anwendung SS17 | Nathalie Kuhn, Aaron Seggelke, Jan Werner © 2017 | <a href="Registrieren.php">Hier zum Registrieren</a></h6>
</font>
</center>
</div>

 <!-- Bootstrap core JavaScript
   

 ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="bootstrap.min.js"></script>
  </body>
</html>


<?PHP
exit;       //Beendet Systemablauf 

}

?>
<!-- Ausgeführt wenn man angemeldet ist -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <title>Gallerien Admin</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet" />
  </head>
 <body>
<!-- Responsive-->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
		<a class="navbar-brand" href="#">Mein Account</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Benutzer</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
		  <li class=""><a href="index.php">Home</a></li>
            <li class="active"><a href="#">Mein Account</a></li>
			<li class=""><a href="index.php?status=logout"> Ausloggen</a></li>
          </ul>
        </div>
      </div>
    </div>
<!-- Ende Responsive-->	
    <div class="container">	
        
        
	<?PHP
 $gid=0;

        //Bilderupload in lokales Dateisystem
        
if(!empty($_POST["gallerie"]))
{

 $gid=$_POST["gid"];
  
 $destination="C:\\xampp\htdocs\\Projekt\\Alben\\" .$_POST["gallerie"]."\\" ;
 
 
 if ($_FILES["thefile"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["thefile"]["error"] . "<br>";
    }
  else
    {
   
    if (file_exists("upload/" . $_FILES["thefile"]["name"]))
      {
      echo $_FILES["thefile"]["name"] . " already exists. ";
      }
    else
      {
	  
      move_uploaded_file($_FILES["thefile"]["tmp_name"],$destination . $_FILES["thefile"]["name"]);
     
      }
    }
}

?>
        <!--Formular zur Erstellung eines neuen Albums-->
<div class="panel panel-primary">
<div class="panel panel-primary">
<div class="container">
 <form method="POST" action="admin.php">     
      <table>	  
      </tr>
      <td valign="top">
      <input type="text" name="galleriename" id="galleriename" placeholder=" GallerieName" value="" required />
      </td>
	  <tr>
	 
	  </tr>
      <td valign="bottom">
      <textarea name="comment" placeholder=" Schreiben Sie eine kurze Beschreibung" rows="5" cols="50"></textarea>
      </td>
	  <tr>
      <td valign="top">
      <input type="submit" name="GallerieCmd"  id="GallerieCmd" value="Erstellung neuer Gallerie" />
      </td>
	  </tr>
      </tr>
      </table>   
          
      </form>
</div>
	  
	  </div>
<?PHP
   
  if(empty($_GET['gid']) && $gid==0)
  {
?>
      <div class="starter-template">
        <h1>Die Gallerien Liste</h1>
       
       <div class="btn-group btn-group-justified">
  <?PHP
      //Alle Gallerien werden angezeigt
     $sql="select * from gallerien";
     $result=mysqli_query($_SESSION["connection"],$sql);
     $num= @mysqli_num_rows($result);
      if($num>0)
       {
       while ($data = mysqli_fetch_array($result)){
	        $id = $data["id"];
	        $name= $data["name"];
			$kommentar= $data["kommentar"];
		 
			?>
              <div class="btn-group">
  
    
    <a href="?gid=<?PHP echo $id; ?>" class="btn btn-default"><?PHP echo $name; ?></a>
  </div>
 <?PHP					
	   }
  
      }

  ?>
</div>
       
  <?PHP
  
  }else{
  //Gallerie mit Id wird ausgewählt und angezeigt
   if($gid==0){
     $gid=$_GET['gid'];
   }  
  $name="";
     $sql="select * from gallerien where id=".$gid;
 
     $result=mysqli_query($_SESSION["connection"], $sql);
     $num= @mysqli_num_rows($result);
      if($num>0)
       {
       while ($data = mysqli_fetch_array($result)){
	 
	        $id= $data['id'];
	        $name= $data['name'];
			$kommentar= $data['kommentar'];
       }
     } 
     $directory="C:\\xampp\htdocs\\Projekt\\Alben\\" .$name;	 

     $html=LoadPicturesFromDir($directory,$name); 
  
  
     echo '<div class="panel panel-primary">
        <h1>' .$name .'</h1>
		
		' . $html .'
		
		</div>
		';
  ?>
  <div class="container">
  <div class="panel panel-primary">
 
     <form enctype="multipart/form-data" action="admin.php" method="post">
<input type="hidden" name="max_file_size" value="10000000">
<input type="hidden" name="gallerie" value="<?PHP echo $name; ?>" />
<input type="hidden" name="gid" value="<?PHP echo $id; ?>" />
<h4> Hier können Sie Ihre Datei auswählen und danach direkt hochladen <h4>
 <input name="thefile" type="file">
<input type="submit" value="Datei hochladen">
</form>   
  
  </div>
  
  </div>
  <?PHP
    
  } 
  ?>                               
      </div>

    </div>
<!--Footer-->
<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
<center>
<font color="#999999">
<h6> Moderne Web Anwendung SS17 | Nathalie Kuhn, Aaron Seggelke, Jan Werner © 2017 | <a href="Registrieren.php">Hier zum Registrieren</a></h6>
</font>
</center>
</div>
	
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="bootstrap.min.js"></script>
  </body>
</html>
