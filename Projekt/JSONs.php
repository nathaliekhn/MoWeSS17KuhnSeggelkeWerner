<?PHP
include "header.php";
include "Jsonfunction.php";
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
            <li ><a href="index.php">Home</a></li>                   
			<li class="active"><a href="JSONs.php">JSONs</a></li>
			  <li><a href="admin.php">Login</a></li>
			  <li><a href="Registrieren.php">Registrieren</a></li>		
			  <li ><a href="suche.php">Suchen </a></li>
			  <li ><a href="">NaAaJa</a></li>
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

 
    <!-- Bootstrap core JavaScript
    ================================================== -->
	
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

  </body>
</html>
