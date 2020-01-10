
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
     $facultyname = mysqli_real_escape_string($conn, $_POST['facultyname']);
     $compname = mysqli_real_escape_string($conn, $_POST['compname']);
     $title = mysqli_real_escape_string($conn, $_POST['title']);
	 $datefrom = mysqli_real_escape_string($conn, $_POST['datefrom']);
	 $dateto = mysqli_real_escape_string($conn, $_POST['dateto']);
	 $days = mysqli_real_escape_string($conn, $_POST['days']);

     $query = "INSERT INTO facultyintern(department,facultyname,compname,title,datefrom,dateto,days)
                VALUES ('$department','$facultyname', '$compname', '$title', '$datefrom', '$dateto', '$days')";

     if(!mysqli_query($conn, $query))
     {
         echo "Error" .mysqli_error($conn);
     }
     else
     {
        header("Location: ../login.html");
     }
?>