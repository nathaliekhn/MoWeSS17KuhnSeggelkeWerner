<?PHP
$path = "";
$path2 = "";
function loadSingelGallery($id)
{
$name="";	
$html='<div class="row">';
$script='<script type="text/javascript"> var bilder=new Array();';
 
     $sql="select * from gallerien where id = " .$id;
 
     $result=mysqli_query($_SESSION["connection"], $sql) or die("DB Connection ERROR!!!");
     $num= @mysqli_num_rows($result);
      if($num>0)
       {
		   while ($data = mysqli_fetch_array($result)){
	        $id= $data['id'];
	        $name=$data['name'];
			$kommentar= $data['kommentar'];
       }
     }
	$i=0;
	$i=0;
	$path = "C:\\xampp\htdocs\Projekt\Alben\\".$name;
	$path2 = "Alben/".$name;
	 if ($handle=opendir($path)) 
    { 
      while (false!==($file=readdir($handle))) 
      { 
        if ($file<>"." AND $file<>"..") 
        { 
          if (is_file($path.'\\'.$file)) 
          { 
			 $html.='<div class="image_item">
			 <a href="#">
			 <img src="'.$path2.'\\'.$file.'" class="small_image" title="'.$i.'"  onclick="showme('.$i.')"/>
 		    </a>
	
			</div>'; 
			
			 $script .='bilder['.$i.']="'.$path2.'/'.$file .'";  ';
			
			 $i++;
          } 
          
        } 
      }
	 }
	
  $script .='

  </script>
  
  <input type="hidden" name="max" id="max" value="'.$i .'" />
  
  ';
  $html .='</div">';
   //  $directory="C:\\xampp\htdocs\MoWeSS17KuhnSeggelkeWerner\Alben\\" .$name;
	 

return $html .$script;

}


function loadGallery()
{
$html='<div class="row cats">';

     $sql="select * from gallerien";
 
     $result=mysqli_query($_SESSION["connection"], $sql);
     $num= @mysqli_num_rows($result);
      if($num>0)
       {
        while ($data = mysqli_fetch_array($result)){
	 
	        $id= $data['id'];
	        $name= $data['name'];
			$kommentar= $data['kommentar'];
			
			$html.='<div class="item"><a href="index.php?id=' .$id .'"><img src="images/gallery.png" />
	
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