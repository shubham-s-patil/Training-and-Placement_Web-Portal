
<?php
     $conn=mysqli_connect("localhost", "root", "", "viit_db");
	 if(!$conn)
	 {
		die('error connecting to database') ;
	 }
         // or die("Failed to connect mysql server " .mysqli_connect_error());
else{
		 echo 'you have connected succesfully';
    }

     $department = mysqli_real_escape_string($conn, $_POST['department']);
     $compname = mysqli_real_escape_string($conn, $_POST['compname']);
     $datefrom = mysqli_real_escape_string($conn, $_POST['datefrom']);
     $dateto = mysqli_real_escape_string($conn, $_POST['dateto']);
	 $students = mysqli_real_escape_string($conn, $_POST['students']);
	 $faculties = mysqli_real_escape_string($conn, $_POST['faculties']);
	 $Coordinator = mysqli_real_escape_string($conn, $_POST['Coordinator']);
	 
	 
	 function dateDiffInDays($datefrom, $dateto)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($dateto) - strtotime($datefrom); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
}   
// Function call to find date difference 
$days = dateDiffInDays($datefrom, $dateto);
	 
	 
     $query = "INSERT INTO visit(department,compname,datefrom,dateto,days,students,faculties,Coordinator)
                VALUES ('$department','$compname', '$datefrom', '$dateto', '$days', '$students', '$faculties', '$Coordinator')";

     if(!mysqli_query($conn, $query))
     {
         echo "Error" .mysqli_error($conn);
     }
     else
     {
        header("Location: ../login.html");
     }
?>