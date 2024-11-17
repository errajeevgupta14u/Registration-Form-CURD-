<?php
//error_reporting(0);
//http://localhost/phpmyadmin/index.php?route=/database/structure&db=
// Establish a database connection (assuming $conn is defined elsewhere in your code)
$conn = mysqli_connect("localhost", "root", "", "responsiveform");

// Check if the form is submitted
if (!empty($_POST['register'])) {
    // Retrieve data from the form
  
   $filename =  $_FILES["uploadfile"]["name"];
  $tempname =  $_FILES["uploadfile"]["tmp_name"];
  $folder = "images/".$filename;
  move_uploaded_file($tempname, $folder); 

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $caste = $_POST['c1'];
    $languages = implode(", ", $_POST['language']); // Combine selected languages into a string

    $phone = $_POST['phone'];
    $address = $_POST['address'];
    // Generate PDF using FPDF library
    require("fpdf/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set font and create PDF content
    $pdf->SetFont("Arial", "B", 17);
    $pdf->Cell(0, 10, "Registration Details", 1, 1, 'C');

    $pdf->SetFont("Arial", "", 13);


    $pdf->Cell(0, 10, "your photo  :   $folder", 0, 1);
    $pdf->Image($folder, 155, 25, 45, 45);
    $pdf->Cell(0, 10, "First Name  :   $fname", 0, 1);
    
    $pdf->Cell(0, 10, "Last Name   :   $lname", 0, 1);
    $pdf->Cell(0, 10, "Password   :   $password",0, 1);
    $pdf->Cell(0, 10, "Gender      :   $gender", 0, 1);
    $pdf->Cell(0, 10, "Email       :   $email", 0, 1);
    $pdf->Cell(0, 10, "Caste       :   $caste", 0, 1);
    $pdf->Cell(0, 10, "Languages   :   $languages", 0, 1);
    $pdf->Cell(0, 10, "Phone NO.   :   $phone", 0, 1);
    $pdf->Cell(0, 10, "Address   :   $address", 0, 1);
    // Additional fields like phone and address can be added similarly

    $pdf->Cell(0, 20, "Thanks", 1, 1, 'C');

    // Output the PDF to the browser
    $pdf->Output();
}
?>
