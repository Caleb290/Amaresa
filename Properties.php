<?php

	include './Assets/Php/Connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AMARESA - Properties</title>
	<!-- CUSTOM CSS  -->
	<link rel="stylesheet" type="text/css" href="./Assets/Css/Admin.css">
	<!-- WEBSITE ICON -->
	<link rel="website icon" type="png" href="./Assets/Images/Icon.png">	
</head>
<body>

	<main>
	<!-- SIDEBAR -->
	<aside class="sidebar" id="sidebar"> 
		<figure>
			<img src="./Assets/Images/Amaresa-logo.png">
		</figure>

		<div class="dashboard">
			<h3 class="h2 dashboard-title">DASHBOARD</h3>

			<ul class="dashboard-list">

				<li>
					<a href="./Account.php" class="dashboard-list-item">
						<i class="fa-solid fa-id-card-clip"></i>
						<span>Account</span>
					</a>
				</li>				

				<li>
					<a href="./Pending.php" class="dashboard-list-item ">
						<i class="fa-solid fa-chalkboard-user"></i>
						<span>Pendings</span>
					</a>
				</li>				

				<li>
					<a href="./Users.php" class="dashboard-list-item">
						<i class="fa-solid fa-users"></i>
						<span>Users</span>
					</a>
				</li>		

				<li>
					<a href="./Management.php" class="dashboard-list-item">
						<i class="fa-solid fa-users"></i>
						<span>Management</span>
					</a>
				</li>	

				<li>
					<a href="Properties.php" class="dashboard-list-item active">
						<i class="fa-solid fa-bars-progress"></i>
						<span>Properties</span>
					</a>
				</li>				

				<li>
					<a href="Message.php" class="dashboard-list-item">
						<i class="fa-solid fa-envelope"></i>
						<span>Messages</span>
					</a>
				</li>
				<li>
					<a href="Archieve.html" class="dashboard-list-item">
						<i class="fa-solid fa-box-archive"></i>
						<span>Archieve</span>
					</a>
				</li>				
				<li>
					<a href="SoldProperties.php" class="dashboard-list-item">
						<i class="fa-solid fa-rectangle-list"></i>
						<span>Sales Log</span>
					</a>
				</li>
				<li>
					<a href="Logout.html" class="dashboard-list-item">
						<i class="fa-solid fa-right-from-bracket"></i>
						<span>Logout</span>
					</a>
				</li>

			</ul>
		</div>
	</aside>
	<!-- TOP SECTION -->
	<section class="displaylist" id="displaylist">
		<div class="container">

			<div class="container-item">

				<div class="container-title">
					<span>Users</span>
					<i class="fa-solid fa-users"></i>
				</div>
			<?php
				$sql = "SELECT COUNT(*) AS total_users FROM user";

				// Execute the query
				$result = $conn->query($sql);

				// Fetch the result
				$total_users = 0;
				if ($result->num_rows > 0) {
				    $row = $result->fetch_assoc();
				    $total_users = $row['total_users'];
				}

				echo "<span> ".$total_users." </span>";
						
			 ?>
			</div>			

			<div class="container-item">

				<div class="container-title">
					<span>Properties</span>
					<i class="fa-solid fa-house"></i>
				</div>
			<?php
				$sql = "SELECT COUNT(*) AS TProperties FROM Properties";

				// Execute the query
				$result = $conn->query($sql);

				// Fetch the result
				$total_users = 0;
				if ($result->num_rows > 0) {
				    $row = $result->fetch_assoc();
				    $TProperties = $row['TProperties'];
				}

				echo "<span> ".$TProperties." </span>";		
			 ?>
			</div>			

			<div class="container-item">

				<div class="container-title">
					<span>Pendings</span>
					<i class="fa-solid fa-chalkboard-user"></i>
				</div>
			<?php
				$sql = "SELECT COUNT(*) AS TPendings FROM Pending";

				// Execute the query
				$result = $conn->query($sql);

				// Fetch the result
				$TPendings = 0;
				if ($result->num_rows > 0) {
				    $row = $result->fetch_assoc();
				    $TPendings = $row['TPendings'];
				}
				echo "<span> ".$TPendings." </span>";		
			 ?>

			</div>

			<div class="container-item">

				<div class="container-title">
					<span>Archieve</span>
					<i class="fa-solid fa-box-archive"></i>
				</div>
			<?php
				$sql = "SELECT COUNT(*) AS TArchives FROM Archive";

				// Execute the query
				$result = $conn->query($sql);

				// Fetch the result
				$TArchives = 0;
				if ($result->num_rows > 0) {
				    $row = $result->fetch_assoc();
				    $TArchives = $row['TArchives'];
				}
				echo "<span> ".$TArchives." </span>";		
			 ?>
			</div>

		</div>
	</section>
	<!-- MAIN SECTION -->
		<section class="Table-section" id="Table-Section">
			<div class="container">

				<table class="table" id="table">
					<tr>	
						<th>Property ID</th>
						<th>Property</th>
						<th>Price</th>
						<th>Description</th>
						<th>Bedrooms</th>
						<th>Bathrooms</th>
						<th>Square Meters</th>
						<th>Date Release</th>
						<th>Status</th>

						<th class="action-center">Actions</th>
					</tr>	
				
					<?php

						$sql = "SELECT * FROM properties";
						$rs = mysqli_query($conn, $sql);

						if($rs){
							while ($row = mysqli_fetch_assoc($rs)) {
								// code...
								$PropertyID = $row['PropertyID'];
								$Property = $row['Property'];
								$Price = $row['Price'];
								$Description = $row['Description'];
								$Bedrooms = $row['Bedrooms'];
								$Bathrooms = $row['Bathrooms'];
								$Area_sqft = $row['Area_sqft'];
								$Date = $row['Date'];
								$Status = $row['Status'];	
	
							

								echo "

								<tr>
									<td>".$PropertyID."</td>
									<td>".$Property."</td>
									<td>".$Price."</td>
									<td>".$Description."</td>
									<td>".$Bedrooms."</td>
									<td>".$Bathrooms."</td>	
									<td>".$Area_sqft."</td>	
									<td>".$Area_sqft."</td>	
									<td>".$Status."</td>

								

							<td class='td-action'>
								<a href='#'><i class='fa-solid fa-eye'></i></a>
								<a href='#'> <i class='fa-solid fa-check'></i></a>
								<a href='#'><i class='fa-solid fa-pen-to-square'></i></a>
								<a href='#'><i class='fa-solid fa-box-archive'></i></a> 
							</td>
						

								</tr>

								";
							}
						}
					?>


				</table>
			</div>	
		</section>
			<div class="float-diagram">
				<button><i class="fa-solid fa-plus"></i> add</button>
			</div>		
	</main>
	<!-- DIAGRAMS HERE -->
	<section class="Dialog-Section"> 

		<div class="float-diagram">
			<button onclick="OpenDialog()"><i class="fa-solid fa-plus"></i> add</button>
		</div>

		<dialog id="Adding-users-modal" class="dialog">
			<button onclick="CloseDialog()" class="closebtn" alt=""><i class="fa-solid fa-x"></i></button>	
			<div class="container">
				<form  method="POST" class="form adding">
					<div class="form-items">
						<input type="text" name="Firstname" placeholder="Property name" required>
						<input type="text" name="Firstname" placeholder="Price" required> 												
					</div>					

					<div class="form-items">
						<input type="text" name="Firstname" placeholder="Bedroom/s" required> 						
						<input type="text" name="Firstname" placeholder="Bathrooms/s" required> 												
					</div>
					<input type="text" name="Address" placeholder="Address" required>
					<!-- FORM FOR IMAGES -->
					<div class="form-items images">

						<div class="images-container">
						    <label for="file-upload-exterior" class="custom-file-upload">Upload Exterior</label>
						    <span id="show-text-exterior" class="show-text">Image here</span>
						    <input id="file-upload-exterior" type="file">
						</div>				

						<div class="images-container">
						    <label for="file-upload-bedroom" class="custom-file-upload">Upload Bedroom</label>
						    <span id="show-text-bedroom" class="show-text">Image here</span>
						    <input id="file-upload-bedroom" type="file">	
						</div>					
					</div>					

					<div class="form-items images">

						<div class="images-container">
						    <label for="file-upload-bathtoom" class="custom-file-upload">Upload Bathroom</label>
						    <span id="show-text-bathtoom" class="show-text">Image here</span>
						    <input id="file-upload-bathtoom" type="file">
						</div>				

						<div class="images-container">
						    <label for="file-upload-Livingroom" class="custom-file-upload">Upload Livingroom</label>
						    <span id="show-text-Livingroom" class="show-text">Image here</span>
						    <input id="file-upload-Livingroom" type="file">
						</div>					
					</div>


					<div class="form-items images">
						<div class="images-container">
						    <label for="file-upload-Diningroom" class="custom-file-upload">Upload Diningroom</label>
						    <span id="show-text-Diningroom" class="show-text">Image here</span>
						    <input id="file-upload-Diningroom" type="file">
						</div>	
					
					</div>
					
					<button type="submit" name="Submit" value="Property" class="Submit"><i class="fa-solid fa-house-circle-check"></i> Add Property </button>  
				</form>

			</div>
		</dialog>		
	</section>


	<!-- Custom JS & JQUERY -->
	<script src="./Assets/Js/UpdateAdmin.js"></script>
	<!-- Fontawesome Link -->
	<script src="https://kit.fontawesome.com/83786b8894.js" crossorigin="anonymous"></script>	
</body>
</html>