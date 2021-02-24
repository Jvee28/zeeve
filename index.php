<?php

	include_once("config.php");

	$result = mysqli_query($mysqli, "SELECT * FROM country");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="viewport" content="width=device-width, initial-scale=1.0">
	<title>Activity 7</title>
</head>
<body bgcolor="cyan">
	<br>
	<h1 class="font-weight-bold" text align="center">ALL COUNTRIES</h1>
	<a type="button" href="add.html">Add New Data</a><br><br>


	<table class="table">
		<tr text align="center">
			<td width="30">Iso</td>
			<td width="30">Name</td>
			<td width="30">Nicename</td>
			<td width="30">Iso3</td>
			<td width="30">Numcode</td>
			<td width="30">Phonecode</td>
			<td width="30">Created</td>
			<td width="30">Update</td>

		</tr>

		<?php
			while ($res = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$res['iso']."</td>";
				echo "<td>".$res['name']."</td>";
				echo "<td>".$res['nicename']."</td>";
				echo "<td>".$res['iso3']."</td>";
				echo "<td>".$res['numcode']."</td>";
				echo "<td>".$res['phonecode']."</td>";
				echo "<td>".$res['created_at']."</td>";
				echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this record?')\">Delete</a></td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>