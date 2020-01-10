
<?php
     session_start();
     $conn=mysqli_connect("localhost", "root", "", "viit_db");
	 if(!$conn)
	 {
		die('error connecting to database') ;
	 }
         // or die("Failed to connect mysql server " .mysqli_connect_error());
else{
		 echo 'you have connected succesfully';
    }

     $comp_name = mysqli_real_escape_string($conn, $_POST['comp_name']);
     $address = mysqli_real_escape_string($conn, $_POST['address']);
	 $city = mysqli_real_escape_string($conn, $_POST['city']);
	 $date1 = mysqli_real_escape_string($conn, $_POST['date1_']);
	 $date2 = mysqli_real_escape_string($conn, $_POST['date2_']);
	 $skill= mysqli_real_escape_string($conn, $_POST['skill']);
	 $mname = mysqli_real_escape_string($conn, $_POST['mname']);
     $memail = mysqli_real_escape_string($conn, $_POST['memail']);
	 $mmob = mysqli_real_escape_string($conn, $_POST['mmob']);
	 $fname = mysqli_real_escape_string($conn, $_POST['fname']);
     $femail = mysqli_real_escape_string($conn, $_POST['femail']);
	 $fmob = mysqli_real_escape_string($conn, $_POST['fmob']);
	 $file1 = mysqli_real_escape_string($conn, $_POST['file1']);
	 $file2 = mysqli_real_escape_string($conn, $_POST['file2']);
	 $file3 = mysqli_real_escape_string($conn, $_POST['file3']);
	 $file4 = mysqli_real_escape_string($conn, $_POST['file4']);
	 $grno=$_SESSION['elogin'];
 
function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
}   
// Function call to find date difference 
$days = dateDiffInDays($date1, $date2); 
  
 
	 
	 
     

     $query = "INSERT INTO internship(comp_name,grno, address,city , date1, date2, days, skill, mname, memail, mmob, fname, femail, fmob, file1 ,file2,file3,file4)
                VALUES ('$comp_name', '$grno','$address', '$city' , '$date1', '$date2', '$days', '$skill', '$mname', '$memail', '$mmob', '$fname', '$femail', '$fmob','$file1','$file2','$file3','$file4')";

     if(!mysqli_query($conn, $query))
     {
         echo "Error" .mysqli_error($conn);
     }
     else
     {
        header("Location: ../add_internship.php");
     }
?>
