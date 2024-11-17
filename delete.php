<?php

include("connection.php");

session_start();

$id = $_GET['id'];

$userprofile = $_SESSION['user_name'];
if ($userprofile == true)
{
  # code...
}
else
{
  header('location:login.php');
}


$query = "DELETE FROM REGFORM WHERE id = '$id'";


$data = mysqli_query($conn,$query);

if($data)
{
    echo "<script>alert('Record Deleted')</script>";

 ?>

       <meta http-equiv="refresh" content="0; url =http://localhost/reg/display.php"/>
<?php

}
else
{
    echo "<script>alert('Failed To Deleted')</script>";
}
?>