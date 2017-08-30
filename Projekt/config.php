<?php
$dbserver="localhost";
$dbuser="root";
$dbpwd="";
$dbname="Bilder_Gallerie";
$GallerieRoot="/Gallerie";
$output="";
// bei dem SQL  DB_CONNECT anmelden
$_SESSION["connection"] = mysqli_connect($dbserver,$dbuser,$dbpwd, $dbname);

if(!empty($_POST['submit']))
{
 doLogin($_POST['username'],md5($_POST['password']));
}
if(!empty($_POST['GallerieCmd']))
{

$galleriename=$_POST['galleriename'];
$comment=$_POST['comment'];
$sql="INSERT INTO gallerien SET user_id='".$_SESSION["user_id"]."', name='".$galleriename."',kommentar='" .$comment ."'";
mysqli_query($_SESSION["connection"], $sql); 

$directory="C:\\xampp\htdocs\\Projekt\\Alben\\" .$galleriename;

if(!is_dir($directory)){
   mkdir($directory);

}
} 
function doLogin($username,$userpwd)
{
   $sql="select * from users where username='" .$username ."' and password='".$userpwd."'";
   
   $result=mysqli_query($_SESSION["connection"],$sql);
   //Anzahl der Ergenissen zurückgeben
   $num= @mysqli_num_rows($result);
   if($num==1)
   {
	   while ($data = mysqli_fetch_array($result)){
		   //$user_id= mysql_result($result, 0, "user_id");
		   $_SESSION["user_id"]=$data['user_id'];
		   $_SESSION["username"]=$username;   
	   }
		
      
	  return true;
   }
   echo '<center><font color="red"> <h4>Benutzername oder Passwort falsch!</h4></font></center>';
   return false;
}
  function LoadPicturesFromDir($path,$ver) 
  { 
    $html="<div>";
  
    if ($handle=opendir($path)) 
    { 
	
      while (false!==($file=readdir($handle))) 
      { 	
        if ($file<>"." AND $file<>"..") 
        { 
          if (is_file($path.'/'.$file)) 
          { 
          
			$html .='<img src="Gallerien'.$ver.'/'.$file .'" width=""100" height="150" alt="" />';								
          }           
        } 
      } 
    } 
	
	$html .="</div>";	
	return $html;
  } 


?>
      