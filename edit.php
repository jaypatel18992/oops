<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1 align="center">Add-Event Form</h1>
	
	<?php foreach ($edit_data as $res) {?>

		<form method="POST" action="<?php echo base_url()?>Admin/update/<?php echo $res->e_id;?>">

			<table align="center">
				<tr>
					<td>Event Name:</td>
					<td><input type="text" name="name" value="<?php echo $res->event_name;?>"></td>
				</tr>
				<tr>
					<td>Event Location:</td>
					<td><input type="text" name="location" value="<?php echo $res->event_location;?>"></td>
				</tr>
				<tr>
					<td>Event Date:</td>
					<td><input type="date" name="date" value="<?php echo $res->event_date;?>"></td>
				</tr>
				<tr>
					<td>Contact:</td>
					<td><input type="number" name="contact" maxlength="10" value="<?php echo $res->contact;?>"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Update"></td>
				</tr>
			</table>
		</form>
	<?php } ?>
	
</body>
</html>