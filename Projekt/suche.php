<html>
<head>

<link rel="stylesheet" href="style.css"  type="text/css"/>
				
</head>
<body bgcolor ='black' >
<body background ="images/Hintergrund.jpg"  >
<form action='' method='POST'>



<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

		<form id="tfnewsearch" method="get" action="http://www.google.com">
		        <input type="text" class="tftextinput" name='query' size="21" maxlength="120" placeholder='Ihre Suchwört'>
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

	