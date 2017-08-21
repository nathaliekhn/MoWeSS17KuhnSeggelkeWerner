<?php
function loadJSONGallery()
{
$html='<div class="list-group">
  <a href="#" class="list-group-item active">
  JSON GALLERIEN
  </a>';

 
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
			
			$html.=' <a class="list-group-item" href="json.php?id=' .$id .'"  target="_blank">' .$name .'	</a>
			 ';

       }
     }
  
  $html .='</div">';

return $html;

}

  function deletefolder($path) 
  { 
    if ($handle=opendir($path)) 
    { 
      while (false!==($file=readdir($handle))) 
      { 
        if ($file<>"." AND $file<>"..") 
        { 
          if (is_file($path.'/'.$file)) 
          { 
            @unlink($path.'/'.$file); 
          } 
          if (is_dir($path.'/'.$file)) 
          { 
            deletefolder($path.'/'.$file); 
            @rmdir($path.'/'.$file); 
          } 
        } 
      } 
    } 
  } 
  ?>