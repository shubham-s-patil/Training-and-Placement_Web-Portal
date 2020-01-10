<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['apply']))
{

$comp_name=$_POST['comp_name'];
$address=$_POST['address']; 
$academicyear=$_POST['academicyear'];
$vtype=$_POST['vtype'];
$city=$_POST['city'];
$leavetype=$_POST['leavetype'];
$fromdate=$_POST['fromdate'];  
$todate=$_POST['todate'];
$mname=$_POST['mname'];  
$memail=$_POST['memail'];
$mmob=$_POST['mmob'];
$fname=$_POST['fname'];  
$femail=$_POST['femail'];
$fmob=$_POST['fmob'];
$description=$_POST['description'];  
$status=0;
$isread=0;
$grno=$_SESSION['elogin'];
if($fromdate > $todate){
                $error=" ToDate should be greater than FromDate ";
           }
$sql="INSERT INTO tblleaves(grno,academicyear,vtype,comp_name,address,city,LeaveType,ToDate,FromDate,mname,memail,mmob,fname,femail,fmob,Description,Status,IsRead) VALUES(:grno,:academicyear,:vtype,:comp_name,:address,:city,:leavetype,:fromdate,:todate,:mname,:memail,:mmob,:fname,:femail,:fmob,:description,:status,:isread)";
$query = $dbh->prepare($sql);
$query->bindParam(':academicyear',$academicyear,PDO::PARAM_STR);
$query->bindParam(':vtype',$vtype,PDO::PARAM_STR);
$query->bindParam(':grno',$grno,PDO::PARAM_STR);
$query->bindParam(':comp_name',$comp_name,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':mname',$mname,PDO::PARAM_STR);
$query->bindParam(':mmob',$mmob,PDO::PARAM_STR);
$query->bindParam(':memail',$memail,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':femail',$femail,PDO::PARAM_STR);
$query->bindParam(':fmob',$fmob,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Leave applied successfully";
}
else 
{
$error="Something went wrong. Please try again";
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
	<title>Student Internship</title>
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
                <ul class="nav navbar-nav navbar-left in">
                    <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
                </ul>
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- end mobile menu -->
                <!-- start header menu -->
								<?php 
														
$eid=$_SESSION['elogin'];
$sql = "SELECT * from  student where grno=:eid";
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
                        <li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
                        
                        <!-- end language menu -->
                        
                       
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
									<a href="Student_Profile.html">
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
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded=",MaterialButton">
                                <i class="material-icons">more_vert</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- end color quick setting -->
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
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Current Internship Details</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="../index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="student_profile.php">Profile</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Current Internship Details</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Add Pre Internship Details</header>
						
								</div>
								
								<div class="card-body" id="bar-parent10" id="bar-parent1">
									<form  method="POST" name="form1" id="form_sample_1" class="form-horizontal">
										<div class="form-body">
										
										<div class="form-group row">
												<label class="control-label col-md-3">Internship Type
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select class="form-control input-height" name="leavetype">
														<option value="">Select Internship type...</option>
<?php $sql = "SELECT  LeaveType from tblleavetype";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                                            
<option value="<?php echo htmlentities($result->LeaveType);?>"><?php echo htmlentities($result->LeaveType);?></option>
<?php }} ?>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Academic Year
													<span class="required"> </span>
												</label>
												<div class="col-md-5">
													<select class="form-control input-height" name="academicyear">
														<option value="">Select...</option>
														<option>2017-2018</option>
														<option>2018-2019</option>
														<option>2019-2020</option>
														<option>2020-2021</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Vacation Type
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select class="form-control input-height" name="vtype">
														<option value="">Select...</option>
														<option>Summer</option>
														<option>Winter</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Company Name
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="comp_name" placeholder="enter company name" class="form-control input-height" />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Address
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<textarea name="address" placeholder="Address" class="form-control-textarea" rows="5"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">City
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select class="form-control input-height" name="city">
														<option value="">City...</option>
														<option>Pune</option>
														<option>Mumbai</option>
														<option>Aurangabad</option>
														<option>Nashik</option>
													</select>
												</div>
											</div>
											
											<div class="form-group row">
												<label class="control-label col-md-3">Internship Duration
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<div class="date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input5"
													 data-link-format="yyyy-mm-dd">
														<input name="fromdate" class="form-control input-height" size="16" placeholder="date of Birth" type="date" value="">
														
													</div>
													<input type="hidden" id="dtp_input5" value="" />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">
													<span class="required">  </span>
												</label>
												<div class="col-md-5">
													<div class="date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input5"
													 data-link-format="yyyy-mm-dd">
														<input name="todate" class="form-control input-height" size="16" placeholder="date of Birth" type="date" value="">
														
													</div>
													<input type="hidden" id="dtp_input5" value="" />
												</div>
											</div>
											
                                           <div class="form-group row">
												<label class="control-label col-md-3">Mentor Name
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="mname" placeholder="enter mentor name" class="form-control input-height" />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Mentor Email
												</label>
												<div class="col-md-5">
													<div class="input-group">
														<input type="text" class="form-control input-height" name="memail" placeholder="Email Address"> </div>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Mentor Mobile No.
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="mmob" placeholder="enter mobile no." class="form-control input-height" />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Faculty Name
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="fname" placeholder="enter faculty name" class="form-control input-height" />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Faculty Email
												</label>
												<div class="col-md-5">
													<div class="input-group">
														<input type="text" class="form-control input-height" name="femail" placeholder="Email Address"> </div>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Faculty Mobile No.
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="fmob" placeholder="enter mobile no." class="form-control input-height" />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Description
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<textarea name="description" placeholder="Description" class="form-control-textarea" rows="5"></textarea>
												</div>
											</div></div>
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit" name="apply" id="apply" class="btn btn-info m-r-20">Submit</button>
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

</html><?php }}?> 