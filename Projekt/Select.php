<meta charset="UTF-8">
<?php
include 'config.php';
echo"
<table align= 'center' width='750'border='3'
style='font-family:Georgia, Garamond, Serif;color:green;font-style:comic sans ;'>
<tr>
          <td>   id             </td>
          <td>   name       </td>
          <td>   kommentar       </td>
         
		
</tr>
";
$selectdbbenutzer = mysql_query 
("SELECT id, name,kommentar
FROM gellerien ");

while ($galleriename= mysql_fetch_assoc($selectdbbenutzer)) {
echo"

<tr>
          <td>  ".$galleriename['id']."  </td>
          <td>  <a href='profile.php?id=".$benutzer['id']."'> ".$benutzer['name']."</a></td>
          <td>  ".$galleriename['kommentar']."  </td>
   
</tr> 
";
}
echo"
</table>
";
mysql_free_result($selectdbbenutzer);
mysql_close($dbconnect);
?>