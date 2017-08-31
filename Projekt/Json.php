<?php
include "config.php";
include "Jsonfunction.php";
$name = "";
// JSON Format aus
if(!empty($_GET["id"]))
{
 
  $json=loadSingelGallery($_GET["id"]);
  echo $json;
}
//Einzelne Gallerie in JSON Format ausgeben
function loadSingelGallery($id)
{
     $jsonresult="[";
	 
	 
     $sql="select * from gallerien where id=" .$id;
 
     $result=mysqli_query($_SESSION["connection"], $sql);
     $num= @mysqli_num_rows($result);
      if($num>0)
       {
       while ($data = mysqli_fetch_array($result))
	   {
	      
	        $id = $data["id"];
	        $name= $data["name"];
			$kommentar= $data["kommentar"];
       }
     }
	 $i=0;
	$path="C:\\xampp\htdocs\Projekt\Alben\\" .$name;
	$path2="Alben\\".$name;
	//Die gesamte Verzeichnisinhalt auslesen
	 if ($handle=opendir($path)) 
    { 
      while (false!==($file=readdir($handle))) 
      { 
	    
        if ($file<>"." AND $file<>"..") 
        { 
		 //Datei
          if (is_file($path.'/'.$file)) 
          { 
            
			
			if($i==0){
		    $jsonresult .="{ 'Bildname':'http://localhost/MoWeSS17KuhnSeggelkeWerner/".$path2."/".$file ."'}";
		    }else{
			$jsonresult .=",{ 'Bildname':'http://localhost/MoWeSS17KuhnSeggelkeWerner/".$path2."/".$file ."'}";
			}
			 $i++;
          } 
          
        } 
      }
	 }
 
    $jsonresult .="]";
	return $jsonresult;
}
 
//alle Gallerien im JSON Format ausgeben
function loadGallery()
{
$html='<div class="row cats">';
     $sql="select * from gallerien";
 
     $result=mysqli_query($_SESSION["connection"], $sql);
     $num= @mysqli_num_rows($result);
      if($num>0)
       {
       while ($data = mysqli_fetch_array($result))
	   {
	        $id = $data["id"];
	        $name= $data["name"];
			$kommentar= $data["kommentar"];
						
			$html.='<div class="item"><a href="index.php?id=' .$id .'"><img src="images/gallery-icon.png" />
			
			<p class="name">' .$name .'</p>
			<p class="description">' .$kommentar .'</p>
			</a>
			</div>';
			
       }
     }
  
  $html .='</div">';  	 
return $html;

}

?>