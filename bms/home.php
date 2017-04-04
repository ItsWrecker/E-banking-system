<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banking";
if(isset($_SESSION['id'])){
	
	header('home.php');
	$id=$_SESSION["id"];
}else
	header('Location: index.html');


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Banking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
  #avl{float:right;}
  #acn{float:center; margin-left:30%; margin-right:20%;}
  
  </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="logo.png" height="30px" width="20%"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<!----body part-->
<div class="container">
	<div class="row">

		<div class="panel panel-default">
			<div class="panel-heading">
			
			<ul class="list-inline">
			
			<?php
				

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
				$sql="SELECT * FROM users WHERE id='$id'";

				$result = $conn->query($sql);
				if (@mysqli_num_rows($result) > 0) {
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
					$account_number=$row['account_number'];
					$avl_blc=$row['avl_blc'];
					$name=$row['name'];
					$mobile=$row['mobile'];
					$email=$row['email'];
					$aadhar=$row['aadhar'];
					$date=$row['date'];
					$address=$row['address'];
						echo "<li>"."Welcome :" ." ".$row["name"]."</li>";
						echo "<li id='acn'>"."Account Number :" .$row["account_number"]."</li>";
						echo "<li id='avl'>" ."Available Balance :"."".$row["avl_blc"]."</li>";
						}
				} else {
					echo "0 results";
				}

				mysqli_close($conn);
												
			?>
			
			
			</ul>
			
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#my_account" title="User Login">My Account</a></li>
					<li><a data-toggle="tab" href="#pay_trans" title="Create Account">Payments/Transfers</a></li>
					<li><a data-toggle="tab" href="#enq" title="admin login">Enquiries</a></li>
					<li><a data-toggle="tab" href="#profile" title="Create Account">Profile</a></li>
					
					
					
				</ul>
				
				
				<div class="tab-content">
<!-- content for home -->
					<div id="my_account" class="tab-pane fade in active">
					<hr>
					<div class="table-responsive">
					<table class="table">
					<thead>
						<tr>
							<th>Account No/ Nick Name</th>
							<th>Branch</th>
							<th>Available Balance</th>
							<th>Transactions</th>
						</tr>
						
						
					<tbody>
						<tr>
							<td><?php echo $account_number; ?></td>
							<td>KIIT</td>
							<td><?php echo $avl_blc;?></td>
							<td>
							<button data-toggle="collapse" data-target="#demo">All transactions</button>
							
							<div id="demo" class="collapse">
							<div class="table-responsive">
							<table border="">
								<tr>
									<th>date<th>
									<th>Transactions id<th>
									<th>Amount<th>
									<th>cr/db<th>
								</tr>
								<?php
								
									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										die("Connection failed: " . $conn->connect_error);
									} 

									$sql="SELECT * FROM transaction WHERE user_id=$id";

									$result = $conn->query($sql);
									if (mysqli_num_rows($result) > 0) {
										// output data of each row
										while($row = mysqli_fetch_assoc($result)) {
											echo "<tr>";
											echo "<td>".$row["date"]."</td>";
											echo "<td></td>";
											echo "<td>".$row["trans_id"]."</td>";
											echo "<td></td>";
											echo "<td>".$row["amt"]."</td>";
											echo "<td></td>";
											echo "<td> cr</td>";
											echo "</tr>";
										}
									} else {
										echo "0 results";
									}

									mysqli_close($conn);
																	
								?>
														
							</table>
							
							
							</div>
							
							
							
							</div>
							</td>
						</tr>
					</tbody>
					</thead>
					</table>
					</div>
					
					
					
					
					
						
					</div>
					
<!-- content for pay_trans tab-->
					<div id="pay_trans" class="tab-pane fade">
					
					
					
					
					<div class="table-responsive">
					<table class="table  ">
					
					  <tr>
						
						<th colspan="2">Fund Transfers</th>
					  </tr>
					  <tr>
						<td colspan="2"><b>Within KIIT</b></td>
						<td colspan="4"><b>Outside KIIT</b></td>
						
					  </tr>
					  
					  <tr>
					  <td><button data-toggle="collapse" data-target="#own_account">Own Account</button></td>
					  <td><button data-toggle="collapse" data-target="#account_of_others">Accounts of Others</button></td>
					  <td><button data-toggle="collapse" data-target="#inter-bank_beneficiary">Inter-Bank Beneficiary</button></td>
					  <td><button data-toggle="collapse" data-target="#visa">Credit Card (VISA) Beneficiary</button></td>
					  <td><button data-toggle="collapse" data-target="#ifs">International Funds Transfer</button></td>
					  <td><button data-toggle="collapse" data-target="#imps">IMPS Funds Transfer</button></td> 
					  </tr>
					</table>
					</table>
					</div>
					</div>
					
					
					<div id="own_account" class="collapse">
					<hr>
					
					<!--- ----->
					<h3>Own Account</h3>
					<hr>
						<form method="post" action="own_account.php">
						  <div class="form-group">
							<label for="Account Number">Account Number:</label>
							<input type="text" class="form-control" name="account_number">
						  </div>
						  <div class="form-group">
							<label for="Beneficiary">Beneficiary Name:</label>
							<input type="text" class="form-control" name="beneficiary">
						  </div>
						  <div class="form-group">
							<label for="Amount">Amount:</label>
							<input type="text" class="form-control" name="amount">
						  </div><div class="form-group">
							<label for="description">Descriptions:</label>
							<input type="text" class="form-control" name="description">
						  </div>
						  
						  <button type="submit" class="btn btn-default" name="own_account">Transfer Now</button>
						</form>
						<!-- function for own_account-->
						
						
						
					</div>
									
								
							
					<div id="account_of_others" class="collapse">
						<form method="post" action="account_of_others.php">
						  <div class="form-group">
							<label for="Account Number">Account Number:</label>
							<input type="text" class="form-control" name="account_number">
						  </div>
						  <div class="form-group">
							<label for="Beneficiary">Beneficiary Name:</label>
							<input type="text" class="form-control" name="beneficiary">
						  </div>
						  <div class="form-group">
							<label for="Amount">Amount:</label>
							<input type="text" class="form-control" name="amount">
						  </div><div class="form-group">
							<label for="description">Descriptions:</label>
							<input type="text" class="form-control" name="description">
						  </div>
						  
						  <button type="submit" class="btn btn-default" name="account_of_others">Transfer Now</button>
						</form>
						
						
						
						
						
						
					</div>
					
					
					<div id="inter-bank_beneficiary" class="collapse">
						<form method="post" action="inter_bank.php">
						  <div class="form-group">
							<label for="Account Number">Account Number:</label>
							<input type="text" class="form-control" name="account_number">
						  </div>
						  <div class="form-group">
							<label for="IFSC">IFSC Code:</label>
							<input type="text" class="form-control" name="ifsc_code">
						  </div>
						  <div class="form-group">
							<label for="Beneficiary">Beneficiary Name:</label>
							<input type="text" class="form-control" name="name">
						  </div>
						  <div class="form-group">
							<label for="Amount">Amount:</label>
							<input type="text" class="form-control" name="amount">
						  </div><div class="form-group">
							<label for="description">Descriptions:</label>
							<input type="text" class="form-control">
						  </div>
						  
						  <button type="submit" class="btn btn-default" name="inter_bank" >Transfer Now</button>
						</form>
						
						
						
						
					</div>
					
					
					
					
					
					<div id="visa" class="collapse">
						<form method="post" action="visa.php">
						  <div class="form-group">
							<label for="Credit Card Number">Credit Card Number:</label>
							<input type="text" class="form-control" name="card_number">
						  </div>
						  <div class="form-group">
							<label for="Beneficiary">Beneficiary Name:</label>
							<input type="text" class="form-control" name="name">
						  </div>
						  <div class="form-group">
							<label for="Amount">Amount:</label>
							<input type="text" class="form-control" name="amount">
						  </div><div class="form-group">
							<label for="description">Descriptions:</label>
							<input type="text" class="form-control">
						  </div>
						  
						  <button type="submit" class="btn btn-default" name="visa">Transfer Now</button>
						</form>
						
					</div>
					
					
					
					
					
					
					<div id="ifs" class="collapse">
						<form>
						  <div class="form-group">
							<label for="Account Number">Account Number:</label>
							<input type="text" class="form-control">
						  </div>
						  <div class="form-group">
							<label for="country code">country code:</label>
							<input type="text" class="form-control">
						  </div><div class="form-group">
							<label for="IFSC">IFSC Code:</label>
							<input type="text" class="form-control">
						  </div>
						  <div class="form-group">
							<label for="Beneficiary">Beneficiary Name:</label>
							<input type="text" class="form-control">
						  </div>
						  <div class="form-group">
							<label for="Amount">Amount:</label>
							<input type="text" class="form-control">
						  </div><div class="form-group">
							<label for="description">Descriptions:</label>
							<input type="text" class="form-control">
						  </div>
						  
						  <button type="submit" class="btn btn-default" name="ifs">Transfer Now</button>
						</form>
						
						
						
						
					</div>
					
					
					
					
					
					<div id="imps" class="collapse">
						<form>
						  <div class="form-group">
							<label for="Account Number">Account Number:</label>
							<input type="text" class="form-control" name="account_number"> 
						  </div>
						  <div class="form-group">
							<label for="Beneficiary">Beneficiary Name:</label>
							<input type="text" class="form-control" name="name">
						  </div><div class="form-group">
							<label for="Beneficiary">IFSC:</label>
							<input type="text" class="form-control" name="ifsc_code">
						  </div>
						  <div class="form-group">
							<label for="Amount">Amount:</label>
							<input type="text" class="form-control" 	name="amount">
						  </div><div class="form-group">
							<label for="description">Descriptions:</label>
							<input type="text" class="form-control">
						  </div>
						  
						  <button type="submit" class="btn btn-default"  name="imps">Transfer Now</button>
			
						</form>
						
						
					</div>
					
					
					
<!-- content for enqueries tab -->

					<div id="enq" class="tab-pane fade">
						<hr>
						<div class="col-sm-6">
						<form method="post" action="#">
						<div class="form-group">
							<label for="name">Name :</label>
							<input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
						</div>
						<div class="form-group">
							<label for="mobile">Mobile Number:</label>
							<input type="text" class="form-control"  name="mobile" value="<?php echo $mobile;?>"> 
						</div>
						<div class="form-group">
							<label for="mobile">Email:</label>
							<input type="text" class="form-control"  name="email" value="<?php echo $email;?>"> 
						</div>
						<div class="form-group">
						<label for="message">Message:</label><br>
						<textarea rows="4" cols="30" name="message">
						
						
						</textarea >
						</div>
						
						<button type="submit" class="btn btn-primary"  name="send">Send</button>
						</form>
						</div>
						
						
					</div>
					
<!-- content for Profile tab -->

					<div id="profile" class="tab-pane fade">
					<hr>
						<form method="POST" action="update.php">
						
						<div class="table-responsive">
						<table class="table">
						<thead>
						<tr><th><h3>Personal Details</h3></th></tr>
						</thead>
						<tbody>
						<tr><td><input type="text" name="account_number" value="<?php echo $account_number;?>" disabled></td></tr>
						<tr>
							<td>
							<div class="form-group">
							<label>Name:</label>
							<input type="text" name="account_number" value="<?php echo $name;?>" disabled>
							</div>
							</td>
							<td>
							<label>Email:</label>
							<input type="text" name="account_number" value="<?php echo $email;?>" disabled>
							</td>
							<td>
							<label>Mobile:</label>
							<input type="text" name="account_number" value="<?php echo $mobile?>" disabled>
							</td>
							
						
						</tr>
						<tr>
							<td>
							<label>Address:</label><br>
							<textarea rows="4" cols="30" name="address">
. 								<?php echo "$address";?>
							</textarea>
							</td>
							<td>
							<label>Aadhar Number:</label>
							<input type="text" name="aadhar" value="<?php  echo "$aadhar";?>">
							</td>
							<td>
							<label>Created Date:</label>
							<input type="text" name="date" value="<?php  echo $date;?>" disabled>
							</td>
							
						</tr>
						<tr ><td colspan="3" align="center"><button type="submit" class="btn btn-primary"  name="send">Update</button></td></tr>
						
						
						</tbody>
						
						
						
						
						</table>
						
						</div>
						
						
						</form>
						
						
					</div>

<!-- content for E-Services tab-->
					
				</div>
		
			
			</div>
		</div>
	</div>
  
</div>
<hr>

<footer class="container-fluid text-center">
  
  <a href="#"><p data-toggle="modal" data-target="#myModal">Terms and Condition</p></a>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Terms of Service (Terms & Conditions) </h4>
      </div>
      <div class="modal-body" align="left">
        <p>These Terms and conditions, as amended from time to time by the Bank shall govern the use of Bank's Internet Banking Service by a person.</p><br>
		<ol>
		<li>
		<h4>DEFINITIONS</h4><br>
		<p>In these Terms and Conditions, unless the context indicates otherwise, the following words and phrases shall have the meanings indicated against them:
Account refers to the User's Savings Bank Account and/or Current Account and/or Fixed Deposit Account or any other type of account so designated by the Bank to be eligible account(s) for the operations through the use of internet banking including any Demat account opened.
Bank refers to the BoKIIT, as per this project.
Customer refers to Customer named in the Application Form.
Confidential Information refers to the information obtained by the customer from/or through the Bank for availing various services through BoKIIT
Internet Banking Services means the services provided by the Bank to the Users through the Site to access to account information, products and other services (including Transaction of financial and non-financial in nature) as may be provided by the Bank from time to time in accordance with this terms and conditions.

</p>		
		</li>
		<li>
		<h4>APPLICABILITY OF TERMS AND CONDITIONS</h4>
		<p>These Terms and conditions (or 'Term') mentioned herein form the contract between the User and the Bank for using the Internet Banking Service. By applying for Internet Banking Services and accessing the service the User acknowledges and accepts these Terms and conditions. Any conditions relating to the accounts of customer other than these Terms will continue to apply except that in the event of any conflict between these Terms and the account conditions, these Terms will continue to prevail.

</p>
		</li>
		<li><h4>USER-ID AND PASSWORD:</h4><br>
			<ul>
				<li>
				<h5>The USER shall:</h5>
				<p>
				Keep the User-id and Password totally confidential and not reveal them to any other person including any person representing or claimed to be representing the Bank;
				</p>
				</li>
				<li>
				<p>Create a password of at least 8 characters long and shall consist of a mix of alphabets, numbers and special characters which must not relate to any readily accessible personal data such as the User's name, address, date of birth, telephone number, vehicle number, driving license etc. or easily guessable combination of letters and / or numbers;</p>
				
				</li>
				<li>
				<p>Commit the User-id and Password to memory and not record them in a written or electronic form.</p>
				</li>
				<li>
				<p>Not let any unauthorized person have access to his computer or leave the computer unattended while using Internet Banking Services.</p>
				</li>
				<li>
				<p>Not disclose/reveal his/her personal or confidential information to anyone over email/SMS/phone call even if its purportedly from State Bank of India. SBI or any of it's representatives will never send emails/SMS or call over phone seeking the personal information like username, passwords, One Time SMS passwords etc. of any user. </p>
				</li>
				<li>
				<h5>Resetting of Password<h5>
				<p>If the User has forgotten login password, he/she can reset login password online using the link 'Forgot Login Password' link available on login page of BoKIIT. The selection of a new password shall not be construed as the commencement of a new contract.

</p>
				</li>
			</ul>
		
		</li>
		
		</ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  
  
</footer>

</body>
</html>
