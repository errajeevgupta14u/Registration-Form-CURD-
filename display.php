<?php 
 session_start();
 echo"Welcome  ".$_SESSION['user_name'];

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Display</title>
<style>
	body
	{
	 background-image: url("a.jpeg");
		background-size: 100% 800px;
        padding: 0;
        margin: 0;
       
	}
	table
	{
		font-family: sans-serif;
		font-size: 15px;
		background-color:white;

	}
	th
	{
		font-family: gadugi;	
		background-color: orange;
	}
	td
	{
		background-color: transparent;
		color: black;
		text-align: center;
	}
	#a{
		text-align: left;
		width: 10%;
	}
  .update
  {
    background-color: blue;
    color: white;
    border: 0;
    outline: none;
    border-radius: 5px; 
    height: 50px;
    width: 118px;
    font-family: sans-serif;
    font-weight: bold;
    cursor: pointer;
    margin:3px;
  }
  .delete
  {
   background-color: red;
    color: white;
    border: 0;
    outline: none;
    border-radius: 5px; 
    height: 50px;
    width: 118px;
    font-style: bold;
    font-family: sans-serif;
    font-weight: bold;
    cursor: pointer;
    margin: 3px;
    align-items: right; 
  }
  .logout
  {
    border: none;
    width: 100px;
    height: 25px;
    font-size: 18px;
    margin-left: 1400px;
    margin-top: 20px;
    font-style: bold;
    background-color: rgb(0, 45,  78, 999);
    color: white;
    border-radius: 50px 0 50px  0;
    cursor: pointer;

  }
  .logout:hover
  {
    background-color: rgb(359, 45,  78, 999);
  }
</style>

</head>
<body>

<a href="login.php"><input type="submit" name="" value="LogOut" class="logout" onmouseover="msg()"></a>

<script>
  
  function msg()
  {
    alert("Aru you sure You want to LogOut ?");
  }
</script>
</body>
</html>

<?php

include("connection.php");
error_reporting(0);

$userprofile = $_SESSION['user_name'];
if ($userprofile == true)
{
  # code...
}
else
{
  header('location:login.php');
}

$query = "SELECT * FROM regform";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);

//echo "Total Numbers of records : " . $total ."";

if ($total != 0)
{
    
 ?>

 	<h2 align="center"><mark>Displaying All Records</mark></h2>



   
   <table border=10" align="center" cellpadding="3" width="98%">
   	<tr bgcolor="red">
   		<th width="4%">I'D</th>
      <th width="11%">Image</th>
   		<th width="8%">First Name </th>
   		<th width="8%">Last Name</th>
   		<th width="6%">Gender</th>
   		<th width="11%">Email</th>
      <th width="8%">Caste</th>
      <th width="14%">Language</th>
   		<th width="8%">Phone Numaber</th>
   		<th width="13%">Address</th>
   		<th width="9%">Operation</th>

   	</tr>
   


 <?php

    while ($result = mysqli_fetch_assoc($data))
    {
        
    	echo "<tr>
    			   <td>$result[id]</td>

             <td><img src = '$result[std_img]' height='100px' width='160px'></td>
   		       
              <td>$result[fname]</td>
   		        <td>$result[lname] </td>
   		        <td>$result[gender] </td>
   		        <td>$result[email]</td>
              <td>$result[caste]</td>
              <td>$result[language]</td>
   		        <td>$result[phone]</td>
   		        <td>$result[address]</td>

				<td id='a'><a href='update.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>



        <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete'  onclick ='return Checkdelete()'></a></td>


   		        
   			</tr>
   		  	";

    }
   
} 
else
{
    echo "No records found";
}
?>


</table>

<script>
  
  function Checkdelete()
  {
    return confirm("Are you sure your want to delete this record ?")
  }
</script>

