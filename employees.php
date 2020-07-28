<html>
 <head>
 <title>List of Employees</title>
 </head>
 <body>
 <center>
 <h1>List of Employees</h1>
 <!--create table structure using HTML first-->
 <table border="1">
 <tr>
 <th>Emp ID</th>
<th>Emp Name</th>
<th>Gender</th>
<th>City</th>
 </tr>

 <?php
 $serverName = "simplewebxx.database.windows.net";
 $connectionOptions = array(
 "Database" => "simpleweb",
 "Uid" => "simpleweb",
"PWD" => "Simple@web");

//Establishes the connection
 $conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn)
{
 die("Error connection: ".sqlsrv_errors());
 }

 $tsql= "SELECT * FROM [dbo].[emp]";
 $getResults= sqlsrv_query($conn, $tsql);

if ($getResults == FALSE)
{
 die(sqlsrv_errors());
}

 while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC))
{
 echo "<tr>";
 echo "<td>". $row['id'] . "</td>";
 echo "<td>". $row['name'] ."</td>";
 echo "<td>". $row['gender'] . "</td>";
 echo "<td>". $row['city'] . "</td>";
 echo "</tr>";
 }
 sqlsrv_free_stmt($getResults);
?>
 </table>
 </center>
 </body>
</html>
