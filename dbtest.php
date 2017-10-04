<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("MYSQL_USER");
$dbname = getenv("MYSQL_DATABASE");
$dbpwd = getenv("MYSQL_PASSWORD");

$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$query = "SELECT * from users" or die("Error in the consult.." . mysqli_error($connection));
?>

<table border="100" cellspacing="100" cellpadding="2">
<tr>
<td>
<font face="Arial, Helvetica, sans-serif">ID</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">User Name</font>
</td>
</tr>

<?php
$rs = $connection->query($query);
while ($row = mysqli_fetch_assoc($rs)) {

?>

<tr>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row['user_id']; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $row['username']; ?></font>
</td>
</tr>


<?php
}
mysqli_close($connection);

?>
