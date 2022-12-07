<?php
require_once('formclass.php');
$class->userInsertData();

?>



<!DOCTYPE html>
<html>
<head>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Services Request Form</title>
</head>
<body>
<div>
	<p>Request for <span style="font-size: 20px;">IT SERVICEsS</p>
		<hr>
	<table>
		<div>
		<tr>
			<form action="" method="post">
			<td>
				<label>Requesting Dept/Office:</label>
				<input type="text" name="deptname" class="form-control">
			</td>
			<td>
				<label>Dept/Office Account ID:</label>
				<input type="text" name="deptid" class="form-control">
			</td> 
			<td>
				<label>Contact/Local #:</label>
				<input type="text" name="contact" class="form-control">
			</td>
			<td>
				<label>Date:</label>
				<input type="date" name="date_sub" hidden>
			</td>
			
		</tr>
	</div>
			<div>
				<tr>
					<td>
						<label>Name of Dept/Office Head:</label>
						<input type="text" name="deptheadfname" class="form-control" placeholder="Firstname" required>
						<input type="text" name="deptheadmidname" class="form-control" placeholder="Middlename/Optional">
						<input type="text" name="deptheadlname" class="form-control" placeholder="Lastname" required>
						<input type="text" name="deptheadsuffix" class="form-control" placeholder="Suffix/Optional">
					</td>
					<td>
						<label>Signature of Requesting Dept/Office Head:</label>
						<input type="text" name="dept_head_sign" placeholder="comply later" readonly class="form-control">
					</td>
				</tr>
			</div>
			<div>
				<tr>
					<td>
						<label>Name of End User:</label>
						<input type="text" name="euserfname" class="form-control" placeholder="Firstname" required>
						<input type="text" name="eusermidname" class="form-control" placeholder="Middlename" >
						<input type="text" name="euserlname" class="form-control" placeholder="Lastname" required>
						<input type="text" name="eusersuffix" class="form-control" placeholder="Suffix/Optional">
					</td>
					<td>
						<label>Position:</label>
						<input type="text" name="position" class="form-control" required>
					</td>
				</tr>
				<tr>	
					<td>
						<label>Equipment Type/Description:</label>
						<input type="text" name="equip_type" class="form-control" required>
					</td>
					<td>
						<label>Equipment Serial Number:</label>
						<input type="text" name="equip_number" class="form-control" required>
					</td>
				
			</div>	
	</table>
	
<hr>

	<table>
		<div class="container">
		
			<tr>
					<p>Equipment Issue/s: <i>(Check all that apply)</i></p>
				<td>
					<input type="checkbox" name="issues[]" value="Application crash or OS blue screen">
					<label>Application crash or OS blue screen</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Application crash or OS blue screen">
					<label>Application crash or OS blue screen</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Damaged motherboard">
					<label>Damaged motherboard</label>
				</td>		
			</tr>	 
			<tr>
				<td>
					<input type="checkbox" name="issues[]" value="Application won't operate">
					<label>Application won't operate</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="No display">
					<label>No display</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Damaged Hard drive">
					<label>Damaged Hard drive</label>
				</td>	
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]" value="Unservicesable">
					<label>Unservicesable</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Printer bunking">
					<label>Printer bunking</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Damaged memory">
					<label>Damaged memory</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]" value="Equipment won't boot or power up">
					<label>Equipment won't boot or power up</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Equipment shuts down or reboots">
					<label>Equipment shuts down or reboots</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Display issue">
					<label>Display issue</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]" value="Can't access the internet">
					<label>Can't access the internet</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Virus or malware">
					<label>Virus or malware</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Equipment is slow">
					<label>Equipment is slow</label>
				</td>
			</tr>
			<tr>
					<td>
					<input type="checkbox" name="issues[]" value="Won't print">
					<label>Won't print</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="No internet connection">
					<label>No internet connection</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Handset no dial tone">
					<label>Handset no dial tone</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="issues[]" value="Application won't open">
					<label>Application won't open</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Installation">
					<label>Installation(OS, Apps, Internet)</label>
				</td>
				<td>
					<input type="checkbox" name="issues[]" value="Inspection">
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
				<p>Required Services: <i>(Check all that apply)</i></p>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="services[]" value="Diagnostic">
					<label>Diagnostic</label>
				</td>
				<td>

					
					<input type="checkbox" name="services[]" value="Computer repair">
					<label>Computer repair</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Printer setup">
					<label>Printer setup</label>
					
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="services[]" value="Computer Format">
					<label>Computer Format</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Change hardware">
					<label>Change hardware</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Printer reset">
					<label>Printer reset</label>
					
				</td>
			</tr>
			<tr>
			<td>
					<label>Data recovery</label>
					<input type="checkbox" name="services[]" value="Data recovery">
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Computer upgrade">
					<label>Computer upgrade</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Router setup">
					<label>Router setup</label>
					
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="services[]" value="Virus/ Malware removal">
					<label>Virus/ Malware removal</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Printer repair">
					<label>Printer repair</label>
					
				</td>
				<td>
					<input type="checkbox" name="services[]" value="Router reset">
					<label>Router reset</label>
					
				</td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr>

					<td> 
						<input type="submit" name="submit">
		</form>
					</td>
			</tr>
				
			
			
		</div>
	</table>
</div>

</body>
</html>