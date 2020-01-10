<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['elogin'])==0)
    {   
header('location:login.php');
}
else{
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
	<title>Deputation Letter</title>
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
	<!-- Theme Styles -->
	<link href="../assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="../assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="../assets/img/favicon.ico" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		
						<?php 
$lid=intval($_GET['leaveid']);														
$eid=$_SESSION['elogin'];
$sql = "SELECT tblleaves.id as lid,tblleaves.comp_name,student.UserPic,tblleaves.academicyear,student.year,student.mob,student.email,student.rollno,student.department,student.name,student.grno,student.id,tblleaves.LeaveType,tblleaves.vtype,tblleaves.ToDate,tblleaves.FromDate,tblleaves.address,tblleaves.PostingDate,tblleaves.Status from tblleaves join student on tblleaves.grno=student.grno where tblleaves.id=$lid";

$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
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
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
					 <!-- start manage user dropdown -->
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img alt="" class="img-circle " src="../assets/img/bhakti.jpg" />
								<span class="username username-hide-on-mobile"><?php echo htmlentities($result->name);?></span>
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="#">
									<a href="Student_Profile.php">
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

										<img src="userimages/<?php echo htmlentities($result->UserPic);?>" class="img-circle user-img-circle" alt="User Image" />
									</div>
									<div class="pull-left info">
										<p><?php echo htmlentities($result->name);?></p>
										<a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
									</div>
								</div>
							</li>
							<li class="nav-item">
								<a href="Student_Profile.php" class="nav-link nav-toggle"> <i class="material-icons">account_circle</i>
									<span class="title">Profile</span> <span class="arrow"></span>
								</a>
								
							</li>
							
							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
									<span class="title">Pre-Internship Details</span><span class="arrow"></span></a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="apply_internship.php" class="nav-link "> <span class="title">Add Details</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="history.php" class="nav-link "> <span class="title">History</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="all_students.php" class="nav-link nav-toggle"> <i class="material-icons">public</i>
									<span class="title">Internships Offer</span><span class="arrow"></span></a>
							</li>
                            <li class="nav-item">
							<li class="nav-item">
								<a href="placements.php" class="nav-link nav-toggle"> <i class="material-icons">local_library</i>
									<span class="title">Placement</span><span class="arrow"></span></a>
							</li>
                            <li class="nav-item">
								<a href="change-password.php" class="nav-link nav-toggle"> <i class="material-icons">work</i>
									<span class="title">Change Password</span><span class="arrow"></span></a>
							</li>
							<li class="nav-item">
								<a href="logout.php" class="nav-link nav-toggle"> <i class="material-icons">exit_to_app</i>
									<span class="title">Log Out</span><span class="arrow"></span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">

					<div class="row">
						<div class="col-md-12">
							<div class="white-box">
								<hr>
								<div class="row">
									<div class="col-md-12">
										    <center>
											<address><br><br><br><br>
												<p class="addr-font-h4">BRACT'S,</p>
												<p class="font-bold addr-font-h3">Viswakarma Institute Of Information Technology<br></p>
												 <p class="addr-font-h4">(An Autonomous Institute affiliated to Savitribai Phule Pune University) <br>
                                                     Accredited with ‘A’ Grade by NAAC,An ISO 9001:2008 Certified Institute<br> S. No. 3/4, Kondhwa Bk, Pune-411 048, Maharastra ,India <br>
                                               <br><p class="font-bold addr-font-h4">Department Of <?php echo htmlentities($result->department);?> Engineering</p><br> <p class="addr-font-h4">(NBA accredited)</p>
												
											</address>
									<p class="font-bold addr-font-h4">Internship Deputation Letter </p><br></center>
									<div class="pull-left">
											<address>
												<p class="text-muted m-l-5">
													To, <br>
													<?php echo htmlentities($result->comp_name);?><br> <?php echo htmlentities($result->address);?>
												</p>
												<br><p class="addr-font-h4">Dear Sir/Madam,</p>
											</address>
										</div>
										<div class="pull-right text-right">
											<address>
												<p class="m-t-30">
													<b> Date :</b> <?php echo htmlentities($result->PostingDate);?>
												</p>
											</address>
										</div>
										
										</div>
										<div class="col-md-12">
										<br><br><p class="addr-font-h4">We are glad to depute <b><?php echo htmlentities($result->name);?></b> bonafied student of Department of Computer Engineering (Roll No. <b><?php echo htmlentities($result->rollno);?></b> of <b><?php echo htmlentities($result->year);?></b> class) for the internship program at your esteemed organization for the period starting from  <b><?php echo htmlentities($result->FromDate);?></b> to  <b><?php echo htmlentities($result->ToDate);?></b>. 
 
 He/She will have to report at your organization on  <b><?php echo htmlentities($result->FromDate);?></b>.<br><br>&nbsp &nbsp &nbsp He/She is expected to carry out the task allocated to him/her with utmost sincerity and diligence.  He/She will have to maintain a log of his /her daily activity and the end submits an internship report and attendance record signed by his/her mentor to the department. I thank you for giving the student this opportunity.
 </p>
										</div>
							
									<div class="col-md-12">
										<div class="pull-right text-right">
											<address><center>
												<p class="addr-font-h4">
													<br><br><br><br><br>(Dr. S.R. Sakhare) <br>  Head Of the Department,<br><br>
												</p></center>
											</address>
										</div>
										<div class="pull-left">
											<address>
												<p class="addr-font-h4">
													<br><br><br><br><br>(Prof. S. B. Tatale)<br> Co-ordinator-I2IC,<br><br>
												
											</address>
										</div>
										</div>
										<div class="clearfix"></div>
										<hr>
										<div class="col-md-12"><center><br><br><br><br><br><br><br>
											<button onclick="javascript:window.print();" class="btn btn-default btn-outline" type="button"> <span><i
													 class="fa fa-print"></i> Print</span> </button></center>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<!-- start chat sidebar -->
			
			
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

</html><?php }}}?> 