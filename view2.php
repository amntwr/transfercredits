<?php
	include("connection.php");
	$query = "SELECT * FROM users";
	$data = mysqli_query($conn,$query);
	$total = mysqli_num_rows($data);

	$id=$_GET['id'];
	$name=$_GET['name'];
	$email=$_GET['email'];
	$credits=$_GET['credits'];

?>
	<table>
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>EMAIL</th>
			<th>CREDITS</th>
		</tr>

<?php
	while($result=mysqli_fetch_assoc($data))
	{
		echo "<tr>
			<td>".$result['ID']."</td>
			<td>".$result['NAME']."</td>
			<td>".$result['EMAIL']."</td>
			<td>".$result['CREDITS']."</td>
			<td><a href='update.php?id2=$result[ID]&name2=$result[NAME]&email2=$result[EMAIL]&credits2=$result[CREDITS]&id=$id&name=$name&email=$email&credits=$credits'> SELECT RECIPIENT </a></td>
			</tr>";
	}
?>
</table>

<a href="view1.php">View senders</a>

<style>
	td{
		padding: 20px;
	}
	a{
		border: 2px solid black;
		text-decoration: none;
		background-color: red;
		color: white;
		padding: 5px;
		border-radius: 10px;
	}
</style>