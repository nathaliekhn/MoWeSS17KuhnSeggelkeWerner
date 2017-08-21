<?PHP
include "header.php";
?>
  <body>
  <?PHP
	//if($_GET['status'] == 'logout'){
	//	SESSION_RESET();
	//}
		
  ?>

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
            <li class="active"><a href="index.php">Home</a></li>                   
			<li><a href="JSONs.php">JSONs</a></li>
			  <li><a href="admin.php">Login</a></li>
			  <li><a href="Registrieren.php">Registrieren</a></li>		
			  <li ><a href="suche.php">Suchen </a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href=""></a></li>
			  <li ><a href="index.php"><img id="rechts" src="images/logo.jpg"></a></li>
		  
			  <form action='' method='POST'>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>  

	 
    <div class="container">

      <div class="starter-template">

      <input type="hidden" name="position" id="position" value="0" />   
      <?PHP

	  if(empty($_GET["id"])){
			  $html=loadGallery();
			  echo $html;
			  
	  }else{
	    $html=loadSingelGallery($_GET["id"]);
			  echo $html;
	  }	  
	
	  ?>
	
      </div>
    </div>
     <div id="show">
        <div id="preview"><a href="#" onClick="preview()"><img src="images/l.png" alt="Preview" /></a></div>
        <div id="content"></div>
		 <div id="next"><a href="#" onClick="next()"><img src="images/r.png" alt="Next" /></a></div>
		 <div class="clearfix"></div>
       </div>	
    
<font color="#FF0000">

<center>
<h4> Moderne Web Anwendung SS17 </h4>
<h5>Nathalie Kuhn, Aaron Seggelke, Jan Werner </h5>
<h6>2017 © </h6>
<h6> <a href="Registrieren.php"> Hier zum Registrieren </a> </h6>
<a href="http://www.bilderhoster.net/galerie-hochladen.html">  </a>
<a href="http://www.bilderhoster.net" titel=" Bilder hochladen " target="_blank">
<img src="http://www.bilderhoster.net/banner/234x60.gif" alt=" Bilder Hochladen " border="0"></a>

<a href="https://www.google.de/search?client=opera&q=google&sourceid=opera&ie=UTF-8&oe=UTF-8#q=Bildergalerie" titel=" Google " target="_blank">
<img src="images/google.png" alt=" Bilder Hochladen " border="0"></a>

</center>
</font>
  
    
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function()
  {      
      
   $("#show").hide();
  
  }); 
  function showme(id)
  { 
      $("#show #content").html("<img src=\""+bilder[id]+"\" />");
	  $("#show").show();
	  $("#position").val(id);
	  
  }   
  
  function preview()
  {
      var id=$("#position").val();
	  var max=$("#max").val();	  
	  id--;
	  if(id<0) { id=max-1;}
      $("#show #content").html("<img src=\""+bilder[id]+"\" />");
	  $("#show").show();
	  $("#position").val(id);	  
  }
  function next(id)
  {
     var id=$("#position").val();
	  var max=$("#max").val();
	  id++
	  if(id==max) { id=0;} 
      $("#show #content").html("<img src=\""+bilder[id]+"\" />");
	  $("#show").show();
	  $("#position").val(id);	  
  }
	</script>

  </body> 
</html>

