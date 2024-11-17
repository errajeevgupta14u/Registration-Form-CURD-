<?php 
include("connection.php");
 ?>

<?php
include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login-style.css">
	<title>Login</title>
</head>
<body>
	<form action="#" method="POST">
	<div class="center">
		<h1>Login</h1>

		<div class="form">
			<input type="text" class="textfiled" name="username" placeholder="Enter Username :- (your email i'd)">
			<input type="password" class="textfiled"  name="password" placeholder="Enter Password :-" >
			
			<div class="forgetpass"><a href="#" class="link" onclick="msg()">Forget password ?</a></div>

			<input type="submit"  value="Login"  name="login" class="btn">

			<div class="signup">New Member ?<a href="form.php" class="link">Signup Here</a></div>
		</div>
	</div>

	</form>
	<script>
		function msg()
		{
			alert("You want to forgrt Password ?");
		}
	</script>
</body>
</html>


<?php
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $psd = $_POST['password'];

    // Validate user input
    if (empty($user) || empty($psd)) {
        echo "Username and password are required.";
        exit;
    }

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM regform WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $user, $psd);
    $stmt->execute();
    $result = $stmt->get_result();
    $total = $result->num_rows;

    //echo "$total";

    if ($total == 1)
    {
       // echo "Login Successful....!";
    	
       $_SESSION['user_name'] = $user;
    	header('location:display.php');
    } 
    else 
    {
        echo "Login failed try again ....!";
    }

    $stmt->close();
}
?>
