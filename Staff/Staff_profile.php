<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:login.php');
}
else{
$eid=$_SESSION['alogin'];
if(isset($_POST['update']))
{
$name1=$_POST['name'];   
$email1=$_POST['email']; 
$address1=$_POST['address']; 
$department1=$_POST['department']; 
$mob1=$_POST['mob']; 
$gender1=$_POST['gender'];
$dob1=$_POST['dob']; 
$sql="update teacher set name=:name1,email=:email1,address=:address1,department=:department1,mob=:mob1,gender=:gender1,dob=:dob1 where email=:eid";
$query = $dbh->prepare($sql);
$query->bindParam(':name1',$name1,PDO::PARAM_STR);
$query->bindParam(':email1',$email1,PDO::PARAM_STR);
$query->bindParam(':address1',$address1,PDO::PARAM_STR);
$query->bindParam(':department1',$department1,PDO::PARAM_STR);
$query->bindParam(':mob1',$mob1,PDO::PARAM_STR);
$query->bindParam(':dob1',$dob1,PDO::PARAM_STR);
$query->bindParam(':gender1',$gender1,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$msg="Teacher record updated Successfully";
}

    ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
	<title>Staff Profile</title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="../assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="../assets/css/material_style.css">
	<!-- Data Tables -->
	<link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->
	<link href="../assets/css/theme/hover/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="../assets/css/theme/hover/style.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/theme/hover/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="../assets/img/favicon.ico" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="index.html">
						<span class="logo-icon material-icons fa-rotate-45">school</span>
						<span class="logo-default">VIIT</span> </a>
				</div>
				<!-- logo end -->
				<!-- start mobile menu -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
					<span></span>
				</a>
				<!-- end mobile menu -->
				<!-- start header menu -->
	<?php 
														
$eid=$_SESSION['alogin'];
$sql = "SELECT * from  teacher where email=:eid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
					 <!-- start manage user dropdown -->
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img alt="" class="img-circle " src="../assets/img/a.jpg" />
								<span class="username username-hide-on-mobile"><?php echo htmlentities($result->name);?></span>
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="#">
									<a href="Staff_Profile.php">
										<i class="icon-user"></i> Profile </a>
								</li>
								
								<li>
									<a href="#">
										<i class="icon-directions"></i> Help
									</a>
								</li>
								<li class="divider"> </li>
								
								<li>
									<a href="logout.php">
										<i class="icon-logout"></i> Log Out </a>
								</li>
							</ul>
						</li>
						<!-- end manage user dropdown -->
						<!-- end manage user dropdown -->
						
					</ul>
				</div>
			</div>
		</div>
		<!-- end header -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<div class="sidebar-container">
 
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed sidemenu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true"
						 data-slide-speed="200" style="padding-top: 20px">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="user-panel">
									<div class="pull-left image">
										<img src="../assets/img/a.jpg" class="img-circle user-img-circle" alt="User Image" />
									</div>
									<div class="pull-left info">
										<p><?php echo htmlentities($result->name);?></p>
										<a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
									</div>
								</div>
							</li>
							<li class="nav-item">
								<a href="staff_profile.php" class="nav-link nav-toggle"> <i class="material-icons">account_circle</i>
									<span class="title">Profile</span> <span class="arrow"></span>
								</a>
							</li>
							<li class="nav-item">
								<a href="view_students.php" class="nav-link nav-toggle"> <i class="material-icons">people</i>
									<span class="title">View Students</span> <span class="arrow"></span>
								</a>
							</li>
							<li class="nav-item">
								<a href="sponspro.php" class="nav-link nav-toggle"> <i class="material-icons">business</i>
									<span class="title">Add Sponsored Projects</span> <span class="arrow"></span>
								</a>
							</li>
							<li class="nav-item">
								<a href="IV.php" class="nav-link nav-toggle"> <i class="material-icons">local_florist</i>
									<span class="title">Industrial Visit</span> <span class="arrow"></span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">local_convenience_store</i>
									<span class="title">Internship Monitoring</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="leaves.php" class="nav-link "> <span class="title">View All</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="pending.php" class="nav-link "> <span class="title">Pending</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="approved.php" class="nav-link "> <span class="title">Approved</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="notapproved.php" class="nav-link "> <span class="title">Not Approved</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="view_approved.php" class="nav-link nav-toggle"> <i class="material-icons">store_mall_directory</i>
									<span class="title">Approved Internships</span> <span class="arrow"></span>
								</a>
							</li>
							<li class="nav-item">
								<a href="company_registration.php" class="nav-link nav-toggle"> <i class="material-icons">store_mall_directory</i>
									<span class="title">Add Company Details</span> <span class="arrow"></span>
								</a>
							</li>
						<li class="nav-item">
								<a href="lectwork.php" class="nav-link nav-toggle"> <i class="material-icons">local_library</i>
									<span class="title">Lectures or Workshops</span> <span class="arrow"></span>
								</a>
							</li>
							<li class="nav-item">
								<a href="facultyintern.php" class="nav-link nav-toggle"> <i class="material-icons">group</i>
									<span class="title">Faculty Internships</span> <span class="arrow"></span>
								</a>
							</li>
							<li class="nav-item">
								<a href="facultyprotrain.php" class="nav-link nav-toggle"> <i class="material-icons">public</i>
									<span class="title">Training to Industry</span> <span class="arrow"></span>
								</a>
							</li>
							<li class="nav-item">
								<a href="change-password.php" class="nav-link nav-toggle"> <i class="material-icons">work</i>
									<span class="title">Change Password</span> <span class="arrow"></span>
								</a>
							</li>
							<li class="nav-item">
								<a href="logout.php" class="nav-link nav-toggle"> <i class="material-icons">exit_to_app</i>
									<span class="title">Log Out</span> <span class="arrow"></span>
								</a>
							</li>
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Student Profile</div>
							</div>
							 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                             else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="../index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Student</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Student Profile</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							
								<div class="card card-topline-aqua">
									<div class="card-body no-padding height-9">
										<div class="row">
										<div class="profile-userpic">
										<form id="example-form" method="post" name="updatemp">
										
												<img src="../assets/img/a.jpg" class="img-responsive" alt=""> </div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"><?php echo htmlentities($result->name);?></div>
										</div>
										<!-- END SIDEBAR USER TITLE -->
									</div>
								</div>
							<!-- END BEGIN PROFILE SIDEBAR -->
							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content">
								<div class="row">
									<div class="card">
										<div class="card-topline-aqua">
											<header></header>
										</div>
										<div class="white-box">
											<!-- Nav tabs -->
											<div class="p-rl-20">
												<ul class="nav customtab nav-tabs" role="tablist">
													<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">About Me</a></li>
													<li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">Activity</a></li>
												</ul>
											</div>
											<!-- Tab panes -->
											<div class="tab-content">
												<div class="tab-pane active fontawesome-demo" id="tab1">
													<div id="biography">
														<div class="row">

									

														
															<div class="col-md-3 col-6 b-r"> <strong>Name</strong>
																<br>
																<input id="name" name="name" value="<?php echo htmlentities($result->name);?>"  type="text" autocomplete="off" readonly required>
															</div>
															<div class="col-md-3 col-6 b-r"> <strong>Email</strong>
																<br>
																<input  name="email" id="email" value="<?php echo htmlentities($result->email);?>" type="text" required>
															</div>
															<div class="col-md-3 col-6"> <strong>Address</strong>
																<br>
																<input id="address" name="address" type="texarea" value="<?php echo htmlentities($result->address);?>" maxlength="10" autocomplete="off" required>

															</div>
															<div class="col-md-3 col-6 b-r"> <strong>Department</strong>
																<br>
																<input id="department" name="department" type="tel" value="<?php echo htmlentities($result->department);?>" maxlength="10" autocomplete="off" readonly required>

															</div>
															<div class="col-md-3 col-6"> <strong>Mobile No</strong>
																<br>
                                                              <input id="mob" name="mob" type="tel" value="<?php echo htmlentities($result->mob);?>" maxlength="10" autocomplete="off" required>
															</div>
															<div class="col-md-3 col-6"> <strong>Gender</strong>
																<br>
																<input id="gender" name="gender" type="tel" value="<?php echo htmlentities($result->gender);?>" maxlength="10" autocomplete="off" required>

															</div>
															<div class="col-md-3 col-6 b-r"> <strong>Birthdate</strong>
																<br>
																<input id="dob" name="dob" type="tel" value="<?php echo htmlentities($result->dob);?>" maxlength="10" autocomplete="off" required>

															</div>
															
														    </div>
														

														<br>
													
													<div class="row">
															<div class="input-field col s12">
                                                               <button type="submit" name="update"  id="update" class="waves-effect waves-light btn indigo m-b-xs">UPDATE</button>
                                                             </div>
															</div></div>
												</div>
												
												<div class="tab-pane" id="tab2">
													<div class="container-fluid">
														<div class="row">
																				<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Export Table</header>
								</div>
								<div class="card-body " id="bar-parent">
									<table id="exportTable" class="display nowrap" style="width:100%">
										<thead>
											<tr>
												<th>Company Name</th><br>
												<th>Address</th>
												<th>City</th>
												<th>Days</th>
												<th>Skills</th>
												<th>mentor name</th>
												<th>faculty name</th>
												<th>mentor mobile no</th>
											</tr>
										</thead>
										<tbody>
	<?php
	       class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "viit_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$eid=$_SESSION['elogin'];
    $stmt = $conn->prepare("SELECT comp_name,address,city,days,skills,mname,fname,mmob FROM internship where grno=:eid"); 
	
    $stmt -> bindParam(':eid',$eid, PDO::PARAM_STR);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null; ?>
                                    </tbody> </table>
								</div>
							</div>
						</div>
					</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div></form>
							<!-- END PROFILE CONTENT -->
						</div>
					</div>
				</div>
				<!-- end page content -->
			</div>
			<!-- end page container -->
			<!-- start footer -->
		<div class="page-footer">
			<div class="page-footer-inner"> 2019 &copy; Vishwakarma Institute of Information Technology
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- end footer -->
			
		</div>
	</div>
	<!-- start js include path -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<script src="../assets/plugins/popper/popper.js"></script>
	<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- bootstrap -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<!-- Common js-->
	<script src="../assets/js/app.js"></script>

	<script src="../assets/js/layout.js"></script>
	<script src="../assets/js/theme-color.js"></script>
	<!-- Material -->
	<script src="../assets/plugins/material/material.min.js"></script>
	<!-- end js include path -->
</body>

</html>
<?php }}}?> 