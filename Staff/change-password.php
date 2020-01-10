<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:login.php');
}
else{
// Code for change password 
if(isset($_POST['change']))
    {
$password=$_POST['password'];
$newpassword=$_POST['newpassword'];
$username=$_SESSION['alogin'];
    $sql ="SELECT Password FROM teacher WHERE email=:username and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update teacher set password=:newpassword where email=:username";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is wrong";    
}
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
	<title>Change Password</title>
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
									<a href="staff_profile.php">
									<!--<a href="user_profile.html">-->
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
			</div>	<!-- end sidebar menu --><!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
					
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Change Password</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="../index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="staff_profile.php">Profile</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Change-Password</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Change Password</header>
								</div>
								<div class="card-body" id="bar-parent">
									<form name="chngpwd" method="post" id="form_sample_1" class="form-horizontal">
									 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                                      else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
										<div class="form-body">
											<div class="form-group row">
												<label class="control-label col-md-3">Current Password
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input id="password" type="password"  class="validate" autocomplete="off" name="password"  required class="form-control input-height" />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">New Password
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input id="password" type="password"  class="validate" autocomplete="off" name="newpassword"  required class="form-control input-height" />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Confirm Password
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input id="password" type="password"  class="validate" autocomplete="off" name="confirmpassword"  required class="form-control input-height" />
												</div>
											</div>
											
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit" name="change" class="btn btn-info m-r-20">Submit</button>
														<button type="button" class="btn btn-default">Cancel</button>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
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
	</form>
	<!-- start js include path -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<script src="../assets/plugins/popper/popper.js"></script>
	<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="../assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
	<script src="../assets/plugins/jquery-validation/js/additional-methods.min.js"></script>
	<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<!-- bootstrap -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<script src="../assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script src="../assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js" charset="UTF-8"></script>
	<!-- Common js-->
	<script src="../assets/js/app.js"></script>
	<script src="../assets/js/pages/validation/form-validation.js"></script>
	<script src="../assets/js/layout.js"></script>
	<script src="../assets/js/theme-color.js"></script>
	<!-- Material -->
	<script src="../assets/plugins/material/material.min.js"></script>
	<!-- end js include path -->
</body>

</html>
<?php }}} ?> 