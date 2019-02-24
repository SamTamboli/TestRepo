<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div id="container">
		<h1>Employee List</h1>
		
		<?php
		if(isset($uname)){
		?>
		<p style="float: right;"><?php echo $uname; ?></p>	
		<?php	
		}
		?>
		
			
			<table class="table table-bordered">
				<thead>
					  <tr>
						<th>Employee Name</th>
						<th>Email Id</th>
						<th>Mobile Number</th>
						<th></th>
						<th></th>
					  </tr>
				</thead>
				<tbody>
					<?php
					if(isset($employeelist))
					{
						for($i=0;$i<count($employeelist);$i++)
						{
					?>		
							<tr>
								<td><?php echo $employeelist[$i]['emp_name']; ?></td>
								<td><?php echo $employeelist[$i]['emp_email']; ?></td>
								<td><?php echo $employeelist[$i]['emp_mobile']; ?></td>
								<td>Update</td>
								<td>Delete</td>
							</tr>
					<?php		
						}
					}	
					?>
				
					  
				</tbody>
			</table>
	
	</div>

</body>
</html>