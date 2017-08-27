<?PHP
include "header.php";
include "Jsonfunction.php";
?>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
		<a class="navbar-brand" href="#">JSONs</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Gallerien</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            
          
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.php">Home</a></li>                   
			<li class="active"><a href="JSONs.php">JSONs</a></li>
			  <li><a href="admin.php">Login</a></li>
			  <li><a href="Registrieren.php">Registrieren</a></li>		
			  <li ><a href="suche.php">Suchen </a></li>
          </ul>
        </div>
      </div>
    </div> 
    <div class="container">
      <div class="starter-template">
      <input type="hidden" name="position" id="position" value="0" />

      <?PHP
	  //Alles Wird auf JSONs Text Formate ausgegeben.
	  echo loadJSONGallery();
	  ?>
      </div>

    </div>

	<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
	<center>
	<font color="#999999">
	<h6> Moderne Web Anwendung SS17 | Nathalie Kuhn, Aaron Seggelke, Jan Werner © 2017 | <a href="Registrieren.php">Hier zum Registrieren</a></h6>
	</font>
	</center>
	</div>
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
	
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="bootstrap.min.js"></script>

  </body>
</html>
