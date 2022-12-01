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
<hr>
	<table>
		<div class="container">
		
			<tr>
					<p>Equipment Issue/s: <i>(Check all that apply)</i></p>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Application crash or OS blue screen</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Application crash or OS blue screen</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Damaged motherboard</label>
				</td>		
			</tr>	 
			<tr>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Application won't operate</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>No display</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Damaged Hard drive</label>
				</td>	
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Unserviceable</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Printer bunking</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Damaged memory</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Equipment won't boot or power up</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Equipment shuts down or reboots</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Display issue</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Can't access the internet</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Virus or malware</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Equipment is slow</label>
				</td>
			</tr>
			<tr>
					<td>
					<input type="checkbox" name="issues[]">
					<label>Won't print</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>No internet connection</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Handset no dial tone</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Application won't open</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Installation(OS, Apps, Internet)</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]">
					<label>Inspection</label>
				</td>
			</tr>
			<tr>
				<td>
					<label>Others:</label>
					<input type="text" name="issues[]">
				</td>

				</tr>
			<tr>
				<td>
				<p>Required Service: <i>(Check all that apply)</i></p>
				</td>
			</tr>
			<tr>
				<td>
					<label>Diagnostic</label>
					<input type="text" name="service[]">
				</td>
				<td>
					<label>Computer repair</label>
					<input type="text" name="service[]">
				</td>
				<td>
					<label>Printer setup</label>
					<input type="text" name="service[]">
				</td>
			</tr>
			<tr>
				<td>
					<label>Computer Format</label>
					<input type="text" name="service[]">
				</td>
				<td>
					<label>Change hardware</label>
					<input type="text" name="service[]">
				</td>
				<td>
					<label>Printer reset</label>
					<input type="text" name="service[]">
				</td>
			</tr>
			<tr>
			<td>
					<label>Data recovery</label>
					<input type="text" name="service[]">
				</td>
				<td>
					<label>Computer upgrade</label>
					<input type="text" name="service[]">
				</td>
				<td>
					<label>Router setup</label>
					<input type="text" name="service[]">
				</td>
			</tr>
			<tr>
				<td>
					<label>Virus/ Malware removal</label>
					<input type="text" name="service[]">
				</td>
				<td>
					<label>Printer repair</label>
					<input type="text" name="service[]">
				</td>
				<td>
					<label>Router reset</label>
					<input type="text" name="service[]">
				</td>
			</tr>
			</form>
		</div>
	</table>

</body>
</html>