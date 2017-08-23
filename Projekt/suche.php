<html>

<head>

<link rel="stylesheet" href="style.css"  type="text/css"/>
				
</head>

<body bgcolor ='black' >
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
            <li><a href="index.php">Home</a></li>                                   <li><a href="JSONs.php">JSONs</a></li>
            <li><a href="admin.php">Login</a></li>
            <li><a href="Registrieren.php">Registrieren</a></li>		
            <li class="active"><a href="suche.php">Suchen </a></li>
            <li ><a href="">NaAaJa</a></li>
          
              
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    

<form action='' method='POST'>
 

<div class="centered">

		<form id="tfnewsearch" method="get" action="http://www.google.com">
		        <input type="text" class="tftextinput" name='query' size="21" maxlength="120" placeholder='Ihre Suchwort'>
				<input type="submit" value="Recherchieren" class="tfbutton" name='search'>
				
			  
		</form>
	<div class="tfclear"></div>
	</div>
    

	</form>


<hr><br>

<?php
include "config.php";
include "functions.php";

                        if(isset($_POST['search']))
                        {
                                $term = $_POST['query'];
                                $mysql = mysql_connect("localhost","root","");
                                mysql_select_db("gallerie");
                                $qu = mysql_query("SELECT * FROM gallerien WHERE name LIKE '%{$term}%' OR kommentar LIKE '%{$term}%'  "); 
								echo "
								<table  font-family:Georgia border ='5' style='width:20%' color='red' bgcolor='#00FF00' font-style:comic sans>
								<tr>
    <td>GallerieName </td>
    <td>Beschreibung</td> 
  </tr>
  ";                              
                                while($row = mysql_fetch_array($qu))
                                           {
                                                echo "<tr><td>";  
                                                echo $row['name'];
                                                echo "</td>";
                                                echo "<td>";
                                                echo $row['kommentar'];
                                                echo "</td>";                                           
                                                echo "</tr></td>";
                                }
                        }


                ?>
				



	</body>
</html>

	