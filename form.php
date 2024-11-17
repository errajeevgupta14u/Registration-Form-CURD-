<?php
 include("connection.php")
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

       <form action="#" method="POST" enctype="multipart/form-data">
        
        <div class="title">
            Registration Form           
        </div>

            <div class="form">

          
            <div class="input_field"  >
                <label>Upload Image</label>
                <input type="file" name="uploadfile" required style="width: 100%;"> 
            </div>

            <div class="input_field"  >
                <label>First Name</label>
                <input type="text" class="input" name="fname" required> 
            </div>
        
            <div class="input_field">
                <label>Last Name</label>
                <input type="text" class="input" name="lname" required> 
            </div>
         


        <div class="input_field">
            <label>Password</label>
            <input type="Password" class="input" name="password" required>  
        </div>


            <div class="input_field">
                <label>Confirm Password</label>
                <input type="Password" class="input" name="conpassword" required>   
            </div>



            <div class="input_field">
                <label>Gender</label>
                
            <div class="custom_select">
                <select name="gender" required>
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>  
            </div>



              <div class="input_field">
                <label>Email Address</label>
                <input type="text" class="input" name="email" required> 
            </div>


            <div class="input_field">
                <label style="margin-right: 100px;">  Caste</label>

                <input  type="radio" name="c1" value="General" required><label style="margin: 2px;">  General  </label>
                <input  type="radio" name="c1" value="OBC" required><label style="margin: 2px;">  OBC      </label>
                <input  type="radio" name="c1" value="SC" required><label style="margin: 2px;">  SC       </label>
                <input  type="radio" name="c1" value="ST" required><label style="margin: 2px;">  ST       </label> 
            </div>
        

 
             <div class="input_field">
                <label style="margin-right: 100px;"> Language </label>

                <input  type="checkbox" name="language[]" value="Hindi" ><label style="margin: 2px;"> Hindi  </label>
                <input  type="checkbox" name="language[]" value="English" ><label style="margin: 2px;">English</label>
                <input  type="checkbox" name="language[]" value="Bhojpuri" ><label style="margin: 2px;">Bhojpuri</label>
                <input  type="checkbox" name="language[]" value="Maithli" ><label style="margin: 2px;">Mathli</label> 
            </div>


            <div class="input_field">
                <label>Phone Number</label>
                <input type="Number" class="input" name="phone" required>   
            </div>
        </div>

        <div class="form">
            <div class="input_field">
                <label>Full Address</label>
                <textarea class="textarea" name="address"></textarea>   
            </div>




            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
                <p>Agree to tearms and conditions</p>   
            </div>

            <div class="input_field">
                <input type="submit" value="Register" class="btn" name="register" required>
            </div>


        </div>
        </form>
    </div>

</body>
</html>

<?php
    
    if ($_POST['register'])
    {

  $filename =  $_FILES["uploadfile"]["name"];
  $tempname =  $_FILES["uploadfile"]["tmp_name"];
  $folder = "images/".$filename;
  move_uploaded_file($tempname, $folder); 


        $fname    = $_POST['fname'];
        $lname    = $_POST['lname'];
        $pwd      = $_POST['password'];
        $cpwd     = $_POST['conpassword'];
        $gender   = $_POST['gender'];
        $email    = $_POST['email'];
        $caste    = $_POST['c1'];
        $lang    = $_POST['language'];
        $lang = implode(",", $_POST['language']); 


        $phone    = $_POST['phone'];
        $address  = $_POST['address'];

          
             $query = "INSERT INTO REGFORM (std_img,fname,lname,password,cpassword,gender,email,caste,language,phone,address) VALUES('$folder','$fname','$lname','$pwd','$cpwd','$gender','$email','$caste','$lang','$phone','$address')";
          


          $data = mysqli_query($conn,$query);
  
          if ($data)
          {
            echo "<script>alert('Form Successfull Submited ')</script>";
          
             ?>

                <meta http-equiv="refresh" content="0; url =http://localhost/reg/form.php"/>
            <?php

          }
          else
           { 
             echo "Form not Submited";
           } 
         }
?>
 
 