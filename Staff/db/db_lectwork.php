
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
     $year = mysqli_real_escape_string($conn, $_POST['year']);
     $type = mysqli_real_escape_string($conn, $_POST['type']);
     $organize = mysqli_real_escape_string($conn, $_POST['organize']);
	 $compname = mysqli_real_escape_string($conn, $_POST['compname']);
	 $trainer = mysqli_real_escape_string($conn, $_POST['trainer']);
	 $designation = mysqli_real_escape_string($conn, $_POST['designation']);
	 $topic = mysqli_real_escape_string($conn, $_POST['topic']);
	 $date_ = mysqli_real_escape_string($conn, $_POST['date_']);
	 $class = mysqli_real_escape_string($conn, $_POST['class']);
	 $attendance = mysqli_real_escape_string($conn, $_POST['attendance']);
     

     $query = "INSERT INTO lectwork(department,year,type,organize,compname,trainer,designation,topic,date_,class,attendance)
                VALUES ('$department','$year', '$type', '$organize', '$compname', '$trainer', '$designation', '$topic','$date_','$class','$attendance')";

     if(!mysqli_query($conn, $query))
     {
         echo "Error" .mysqli_error($conn);
     }
     else
     {
        header("Location: ../login.html");
     }
?>