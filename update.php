<?php
	include("connection.php");
	error_reporting(0);
	$id2=$_GET['id2'];
	$name2=$_GET['name2'];
	$email2=$_GET['email2'];
	$credits2=$_GET['credits2'];

	$id=$_GET['id'];
	$name=$_GET['name'];
	$email=$_GET['email'];
	$credits=$_GET['credits'];
?>

<form action="" method="GET">
  		<p>Enter the amount of credits:</p></br>
  		<input type="text" name="credits3"></br>
  		<p>Sender credits:</p>
  		<input type="text" name="credits" value="<?php echo $credits; ?>" readonly></br>
  		<p>Sender id:</p>
  		<input type="text" name="id" value="<?php echo $id; ?>" readonly></br>
  		<p>Recipient credits:</p>
  		<input type="text" name="credits2" value="<?php echo $credits2; ?>" readonly></br>
  		<p>Recipient id:</p>
  		<input type="text" name="id2" value="<?php echo $id2; ?>" readonly></br>


  		<input type="submit" name="submit" value="submit">
</form>

<a href="view1.php">View senders</a>


<?php

	if($_GET['submit'])
	{	
		$crd_sender=$_GET['credits'];
		$crd_rec=$_GET['credits2'];
		$crd = $_GET['credits3'];
		if($crd!="" & $crd>0)
		{
			if($crd<$crd_sender)
			{
				$credits4=$crd_sender-$crd;
				$credits5=$crd_rec+$crd;
				$query2= "UPDATE users SET CREDITS='$credits4' WHERE ID='$id' ";
				$data2=mysqli_query($conn,$query2);
				$query3= "UPDATE users SET CREDITS ='$credits5' WHERE ID='$id2' ";
				$data3=mysqli_query($conn,$query3);

				$msg='Transaction successfull';
	    		echo "$msg";
			}

			if($crd>$credits)
			{
				$msg2="Sender has insufficient credits";
	    		echo "$msg2";
			}
		}
		else
		{
			$msg="Enter correct credits";
	    echo "<script type='text/javascript'>alert('$msg')</script>";
		}
	}
	else
	{
		echo "Click on Submit for transaction.";
	}
?>

<style>
	form{
		padding: 10px;
	}
	p{
		font-family: sans-serif;
	}
	input{
		padding: 10px;
	}

	a{
		font-family: sans-serif;
		border: 2px solid black;
		text-decoration: none;
		background-color: red;
		color: white;
		padding: 5px;
		border-radius: 10px;
	}
</style>