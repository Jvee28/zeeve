<?php

	include_once("config.php");

	if(isset($_POST['update']))
	{
		$id = mysqli_real_escape_string($mysqli, $_POST['id']);
		$iso = mysqli_real_escape_string($mysqli, $_POST['iso']);
		$name = mysqli_real_escape_string($mysqli, $_POST['name']);
		$nicename = mysqli_real_escape_string($mysqli, $_POST['nicename']);
		$iso3 = mysqli_real_escape_string($mysqli, $_POST['iso3']);
		$numcode = mysqli_real_escape_string($mysqli, $_POST['numcode']);
		$phonecode = mysqli_real_escape_string($mysqli, $_POST['phonecode']);

		if( empty($iso) || empty($name) || empty($nicename) ||empty($iso3) || empty($numcode) || empty($phonecode)){

		if(empty($iso)){
				echo "<font color='red'> Iso field is empty. </font><br/>";
		}
		if(empty($name)){
				echo "<font color='red'> Name field is empty. </font><br/>";
		}
		if(empty($nicename)){
				echo "<font color='red'> Nicename field is empty. </font><br/>";
		}
		if(empty($iso3)){
				echo "<font color='red'> Iso3 field is empty. </font><br/>";
		}
		if(empty($numcode)){
				echo "<font color='red'> Numcode field is empty. </font><br/>";
		}
		if(empty($phonecode)){
				echo "<font color='red'> Phonecode field is empty. </font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";

	} else {

		$result = mysqli_query($mysqli, "UPDATE country set iso='$iso', name='$name', nicename='$nicename', iso3='$iso3', numcode='$numcode', phonecode='$phonecode' WHERE id=$id");
		header("Location: index.php");
	}
}

?>

<?php

	$id = $_GET['id'];

	$result = mysqli_query($mysqli, "SELECT * FROM country WHERE id = $id");

	while($res = mysqli_fetch_array($result))
	{
		$iso = $res['iso'];
		$name = $res['name'];
		$nicename = $res['nicename'];
		$iso3 = $res['iso3'];
		$numcode = $res['numcode'];
		$phonecode = $res['phonecode'];

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data</title>
</head>
<body bgcolor="blue-green">
	<h1 class="font-weight-bold" text align="center">ADD NEW DATA</h1>
 	<div class="container">
	<form name="form1" method="post" action="edit.php">

			<tr>
				<td>Iso</td>
				<td><input type="text" name="iso" value="<?php echo $iso;?>"></td><br><br>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td><br><br>
			</tr>
			<tr>
				<td>Nicename</td>
				<td><input type="text" name="nicename" value="<?php echo $nicename;?>"></td><br><br>
			</tr>
			<tr>
				<td>Iso3</td>
				<td><input type="text" name="iso3" value="<?php echo $iso3;?>"></td><br><br>
			</tr>
			<tr>
				<td>Numcode</td>
				<td><input type="text" name="numcode" value="<?php echo $numcode;?>"></td><br><br>
			</tr>
			<tr>
				<td>Phonecode</td>
				<td><input type="text" name="phonecode" value="<?php echo $phonecode;?>"></td><br><br>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
				</td>

				<td><input type="submit" name="update" value="Update"></td><br><br>
			</tr>
	</form>
</div>
</body>
</html>