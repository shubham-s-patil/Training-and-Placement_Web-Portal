<?
    
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $db ="viit_db";
   
    $conn=new mysqli($dbhost,$dbuser,$dbpass,$db);
    
    if($conn->connect_error)
    {
       echo "connection not establish";
    }
	else
	{
		echo "connection was successful";
	}
?>