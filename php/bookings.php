<?php


session_start();
if(!isset($_SESSION['name'])){

	header('location:managerlogin.php');
}


$server = "localhost";
$user = "root";
$password = ""; 

$db = "registration";


$conn = mysqli_connect($server, $user, $password, $db);

if($conn){
	
}else {

	?>
	<script>
			alert("No Connection!");
	</script>
	<?php
}


$q = "select * from registerinfo"; 
$query = mysqli_query($conn, $q);







?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- <link rel="stylesheet" type="text/css" href="loggedinstyle.css"> 
	 --> <link rel="preconnect" href="https://fonts.gstatic.com"> 
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
   

<style>
	

*{
	margin: 0; 
	padding: 0; 
	box-sizing: border-box;
	font-family: 'Roboto', sans-serif;
	color: white !important; 
	text-decoration: none;
}
 a{
 	color: white;
 	text-decoration: none;
 }


header{

	width: 100%; 
	height: 100vh; 
	background-color: #white; 
	background-image: linear-gradient(19deg, white 0%, black 95%);
	position: relative; 
	text-decoration: none;
}


header:before{

		content: ""; 
		width: 650px; 
		height: 550px; 
		position: absolute;
		left: 0; 
		bottom: 0;
		text-decoration: none;
		/*background-image: url(pictures/penthouse3.jpg);
		background-size: 100% 100%*/


}

nav{
	width: 100%; 
	height: 15vh; 
	display: flex;
	justify-content: space-around;
	align-items: center;
	position: absolute;
	text-decoration: none;
}

.logo a{
	 
	font-size: 1.6rem; 
	text-transform: uppercase; 
	font-weight: bold;
	text-decoration: none;
}

.menu ul li{
	color: white; 
	text-decoration: none; 
	list-style: none; 
	display: inline-block;
	padding: 0 15px; 
	text-decoration: none;

}

.menu ul li a{
	
	text-transform: capitalize;
	text-decoration: none;
} 

 ul li:hover{

	border-top: 2px solid #5dade2;
	border-bottom : 2px solid #5dade2;
	text-decoration: none; 

}



.contact_btn a{

	color: white !important;
	text-decoration-color: white !important;
	text-decoration: none; 
	background-color: black 95%;
	padding: 12px 25px; 
	font-size: 15px; 
	font-weight: 500; 
	border: 1px solid transparent;
	color: white;
	text-transform: uppercase;
}

.contact_btn a:hover{

}


/*center-content*/

.center_content{

	position: absolute;
	top: 50%; 
	left: 50%;
	transform: translate(-50%, -50%);
text-align: center;	
}

.center_content h1{

	color: #fff; 
	font-size: 70px; 
	text-transform: capitalize; 
	font-weight: 700; 
	margin-bottom: 10px; 
	z-index: 1; 

}


.center_content h2{

	font-size: 25px; 
	color: #fff;
	font-weight: 400;
	text-transform: capitalize;
	z-index: 1; 

}

.center_content h2:before{

	content: ""; 
	width: 80px; 
	height: auto;
	border: 2px solid white;
	position: absolute;
	left: 40px; 
	bottom: 0; 
	margin-bottom: 15px; 

}












</style>

</head>
<body>

	<header>
			<nav class = "navbar">
				<div class = "logo">
					<a href="#"><?php echo $_SESSION['name']; ?></a>
				</div>
				<div class = "menu">
					<ul>
						<li><a href="manager_loggedin.php">Home</a></li>
						<li><a href="properties.php">Property List</a></li>
						<li><a href="bookings.php">Bookings</a></li>
						<li><a href="users.php">Registered Users</a></li>
					</ul>
				</div>

				<div class = "contact_btn">
					<a href="managerlogout.php">LOGOUT </a>
				</div>
			</nav>

		<div class = "center_content">
		</div>



		<div class = "container">
		
			<div class = "col-lg-12">
				<br><br>
				<h1 class = "text-center"><strong>User Info</strong></h1>

				<table class = "table table-striped table-hover">

				<tr class = "bg-dark text-white">

					<td> <strong>User ID</strong> </td>
					<td> <strong>Email ID</strong> </td>
					<td> <strong>Name</strong> </td>
					<td> <strong>Phone Number</strong> </td>
					<td> <strong>Address</strong> </td>
					<td> <strong>Date of Birth</strong></td>
					<td> <strong>Update User Info</strong></td>
					<td> <strong>Delete User</strong></td>  	

				</tr>

				<?php 

					$server = "localhost";
					$user = "root";
					$password = ""; 

					$db = "registration";


					$conn = mysqli_connect($server, $user, $password, $db);
					$q = "select * from registerinfo";
					$query = mysqli_query($conn, $q);


					while($res = mysqli_fetch_array($query)){
					$_SESSION['id'] = $res['id'];

				?>


				  <tr>
					<td> <?php  echo $res['id'] ?> </td>
					<td> <?php  echo $res['email'] ?> </td>
					<td> <?php  echo $res['name'] ?>  </td>
					<td> <?php  echo $res['phone'] ?>  </td>
					<td> <?php  echo $res['address'] ?>  </td>
					<td> <?php  echo $res['dob'] ?>  </td>
					<td><button class="btn-success btn"><a href="update.php?id=<?php echo $res['id']; ?>" >Update</a></button></td>
					<td><button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['id']; ?>" >Delete</a></button></td> 
					 
					 
				</tr> 

				<?php
			}
				?>

				</table>
			


			</div>

		</div>

	</header>








</body>
</html>