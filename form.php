<?php?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Service Request Form</title>
</head>
<body>

	<table border="1" width="300">
		<div class= "row-form">
		<tr>
			<form action="" method="post">
			<td>
				<label>Requesting Dept/Office:</label>
				<input type="text" name="deptname">
			</td>
			<td>
				<label>Dept/Office Account ID:</label>
				<input type="text" name="deptid">
			</td>
			<td>
				<label>Dept/Office Account ID:</label>
				<input type="text" name="deptid">
			</td>
			<td>
				<label>Contact/Local #:</label>
				<input type="text" name="contact">
			</td>
			<td>
				<label>Date:</label>
				<input type="date" name="date">
			</td>
			
		</tr>
	</div>
			<div>
				<tr>
					<td>
						<label>Name of Dept/Office Head:</label>
						<input type="text" name="deptheadname">
					</td>
					<td>
						<label>Signature of Requesting Dept/Office Head:</label>
						<input type="file" name="signature">
					</td>
				</tr>
			</div>
			<div>
				<tr>
					<td>
						<label>Name of End User:</label>
						<input type="text" name="eusername">
					</td>
					<td>
						<label>Position:</label>
						<input type="text" name="position">
					</td>
				</tr>
				<tr>	
					<td>
						<label>Equipment Type/Description:</label>
						<input type="text" name="equiptype">
					</td>
					<td>
						<label>Equipment Serial Number:</label>
						<input type="text" name="equiptype">
					</td>
				</tr>
			</div>	
	</table>

	<table border="1" width="300">
		<div>
		<p><i></i>Equipment Issue/s: (Check all that apply)</i></p>
	</div>
		<input type="checkbox" name="">
		<label>Application crash or OS blue screen</label>

	</table>

</form>
</body>
</html>
