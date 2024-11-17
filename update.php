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

$query = "SELECT * FROM regform where id= '$id'";
$data = mysqli_query($conn, $query);

$result = mysqli_fetch_assoc($data);

$language = $result['language'];
$language1 = explode(",",$language)

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scaler=1">
    <title>PHP CRUD Opration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="connection.php">
</head>
<body>

    <div class="container">
        <form action="#" method="POST">
        <div class="title">
                Update Student details           
        </div>

            <div class="form">

            <div class="input_field"  >
                <label>First Name</label>
                <input type="text" value="<?php echo $result['fname'];  ?>" class="input" name="fname" required> 
            </div>
        
            <div class="input_field">
                <label>Last Name</label>
                <input type="text" value="<?php echo $result['lname'];  ?>" class="input" name="lname" required> 
            </div>
         


        <div class="input_field">
            <label>Password</label>
            <input type="text" class="input" value="<?php echo $result['password'];  ?>" name="password" required>  
        </div>


            <div class="input_field">
                <label>Confirm Password</label>
                <input type="text" value="<?php echo $result['cpassword'];  ?>" class="input" name="conpassword" required>   
            </div>



            <div class="input_field">
                <label>Gender</label>
                
            <div class="custom_select">

                <select name="gender" required>
                    <option value="">Select</option>


                    <option value="Male"
                    <?php
                        if($result['gender'] == 'Male' )
                        {
                            echo "selected";
                        }
                     ?>
                    >

                    Male</option>

                    <option value="Female"

                        <?php
                        if($result['gender'] == 'Female' )
                        {
                            echo "selected";
                        }
                     ?>
                    >Female</option>
                    <option value="Other"

                        <?php
                        if($result['gender'] == 'Other' )
                        {
                            echo "selected";
                        }
                     ?>
                    >Other</option>
                </select>

            </div>  
            </div>


            <div class="input_field">
                <label>Email Address</label>
                <input type="text" value="<?php echo $result['email'];  ?>" class="input" name="email" required> 
            </div>
        

             <div class="input_field">
                <label style="margin-right: 100px;">  Caste</label>

                <input  type="radio" name="c1" value="General" required

                <?php

                    if ($result['caste'] == "General")
                    {
                       echo "checked";
                    }

                ?>

                ><label style="margin: 2px;">  General  </label>
                <input  type="radio" name="c1" value="OBC" required

                <?php

                    if ($result['caste'] == "OBC")
                    {
                       echo "checked";
                    }

                ?>

                ><label style="margin: 2px;">  OBC      </label>
                <input  type="radio" name="c1" value="SC" required

                <?php

                    if ($result['caste'] == "SC")
                    {
                       echo "checked";
                    }

                ?>
                ><label style="margin: 2px;">  SC       </label>
                <input  type="radio" name="c1" value="ST" required

                <?php

                    if ($result['caste'] == "ST")
                    {
                       echo "checked";
                    }

                ?>

                ><label style="margin: 2px;">ST </label> 
            </div>



            <div class="input_field">
                <label style="margin-right: 100px;"> Language </label>

                <input  type="checkbox" name="language[]" value="Hindi"

                <?php

                    if (in_array('Hindi', $language1))
                    {
                       echo "checked";
                    }

                ?>
                 ><label style="margin: 2px;"> Hindi  </label>
                <input  type="checkbox" name="language[]" value="English" 
                <?php

                    if (in_array('English', $language1))
                    {
                       echo "checked";
                    }

                ?>

                ><label style="margin: 2px;">English</label>
                <input  type="checkbox" name="language[]" value="Bhojpuri" 
                 <?php

                    if (in_array('Bhojpuri', $language1))
                    {
                       echo "checked";
                    }

                ?>

                ><label style="margin: 2px;">Bhojpuri</label>
                <input  type="checkbox" name="language[]" value="Maithli" 

                <?php

                    if (in_array('Maithli', $language1))
                    {
                       echo "checked";
                    }

                ?>
                ><label style="margin: 2px;">Mathli</label> 
            </div>





            <div class="input_field">
                <label>Phone Number</label>
                <input type="Number" value="<?php echo $result['phone'];  ?>" class="input" name="phone" required>   
            </div>
        </div>

        <div class="form">
            <div class="input_field">
                <label>Full Address</label>
                <textarea class="textarea"  name="address"><?php echo $result['address'];  ?></textarea>   
            </div>




            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
                <p>Agree to tearms and conditions</p>   
            </div>

            <div class="input_field">
                <input type="submit" value="Update Details" class="btn" name="update" required>
            </div>


        </div>
        </form>
    </div>

</body>
</html>

<?php
    
    if ($_POST['update'])
    {
        $fname    = $_POST['fname'];
        $lname    = $_POST['lname'];
        $pwd      = $_POST['password'];
        $cpwd     = $_POST['conpassword'];
        $gender   = $_POST['gender'];
        $email    = $_POST['email'];
        $caste    = $_POST['c1'];
       // $language1    = $_POST['language'];
        
        $language1 = implode(",", $_POST['language']); 
        $phone    = $_POST['phone'];
        $address  = $_POST['address'];

          

           $query = "UPDATE regform set fname='$fname',lname='$lname',password='$pwd',cpassword='$cpwd',gender='$gender',email='$email',caste='$caste',language='$language1',phone='$phone',address='$address' WHERE id='$id'";





          $data = mysqli_query($conn,$query);
  
          if ($data)
          {
            echo "<script>alert('Record Updated')</script>";
            ?>

            <meta http-equiv="refresh" content="0; url =http://localhost/reg/display.php"/>

            <?php
          }
          else



           { 
             echo "<script>alert('Failed to Updated')</script>";
           } 
         }
?>