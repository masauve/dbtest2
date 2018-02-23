<?php
$dbhost = getenv("uri");
$dbuser = getenv("username");
$dbname = getenv("database_name");
$dbpwd = getenv("password");

$connection = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$query = "SELECT * from users" or die("Error in the consult.." . mysqli_error($connection));
?>

<table border="5" cellspacing="1" cellpadding="2">
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
