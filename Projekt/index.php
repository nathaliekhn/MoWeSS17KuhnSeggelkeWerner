<?PHP
include "header.php";
?>
  <body>
  <?PHP
      if(isset($_GET['status'])){
          if($_GET['status'] == 'logout'){
        session_destroy();
 
echo "Logout erfolgreich";
	}
      }
	
		
  ?>
<!--Responsive Design-->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
		<a class="navbar-brand" href="#">Home</a>
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
		  
			  <form action='' method='POST'>
          </ul>
              
        </div><!--/.nav-collapse -->
      </div>
    </div>  
<!--Ende Responsive-->

	 
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
    


<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
<center>
<font color="#999999">
<h6> Moderne Web Anwendung SS17 | Nathalie Kuhn, Aaron Seggelke, Jan Werner © 2017 | <a href="Registrieren.php">Hier zum Registrieren</a></h6>
</font>
</nav>

</center>

  
    
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="bootstrap.min.js"></script>
	
	<script>
        
// Bilder anzeigen (durch diese navigieren)
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

