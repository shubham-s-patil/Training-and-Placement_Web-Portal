<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['elogin'])==0)
    {   
header('location:index.php');
}
else{
$eid=$_SESSION['elogin'];
if(isset($_POST['update']))
{

$file3=$_FILES["file3"]["name"];
$file4=$_FILES["file4"]["name"];
move_uploaded_file($_FILES["file3"]["tmp_name"],"userdocs/".$file3);
move_uploaded_file($_FILES["file4"]["tmp_name"],"userdocs/".$file4);
$sql="update tbleaves set file3=:file3,file4=:file4 where grno=:eid";
$query = $dbh->prepare($sql);
$query->bindParam(':file3',$file3,PDO::PARAM_STR);
$query->bindParam(':file4',$file4,PDO::PARAM_STR);

$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$msg="Student record updated Successfully";
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
    <title>Post Internship Details</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" media="screen">
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="../assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="../assets/css/material_style.css">
    <!-- Theme Styles -->
    <link href="../assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="../assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/pages/formlayout.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
    <!-- dropzone -->
    <link href="../assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
    <!--tagsinput-->
    <link href="../assets/plugins/jquery-tags-input/jquery-tags-input.css" rel="stylesheet">
    <!--select2-->
    <link href="../assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/img/favicon.ico" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
				<?php 
														
$eid=$_SESSION['elogin'];
$sql = "SELECT * from  student where grno=:eid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$imageURL = $row["profile"];
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
                <ul class="nav navbar-nav navbar-left in">
                    <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
                </ul>
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- end mobile menu -->
                <!-- start header menu -->

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
										<a href="#"><i class="fa fa-circle user-online"></i><span><?php echo htmlentities($result->grno)?></span>
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
								<a href="Add_Internship.php" class="nav-link nav-toggle"> <i class="material-icons">local_library</i>
									<span class="title">Post-Internship Details</span><span class="arrow"></span></a>
								
							</li>
							<li class="nav-item">
								<a href="placements.php" class="nav-link nav-toggle"> <i class="material-icons">public</i>
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
                                <div class="page-title">Post Internship Details </div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="../index.html">Home</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="Student_profile.php">Profile</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Post Internship Details</li>
                            </ol>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
									<header>Upload Documents</header>
								</div>
								<div class="card-body" id="bar-parent10" id="bar-parent">
									<form method="POST" id="example-form" class="form-horizontal">
										<div class="form-body">
											
											<div class="form-group row">
												<label class="control-label col-md-3">Technical Report
												</label>
												<div class="compose-editor">
													<input type="file" name="userpic" class="default">
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Internship Certificate
												</label>
												<div class="compose-editor">
													<input type="file" name="file4" class="default">
												</div>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="offset-md-3 col-md-9">
														<button type="submit" name="update" id="update" class="btn btn-info m-r-20">Submit</button>
														<button type="button" class="btn btn-default">Cancel</button>
													</div>
												</div>
											</div>
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
    </div>
    <!-- start js include path -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/popper/popper.js"></script>
    <script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- bootstrap -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="../assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" charset="UTF-8"></script>
    <script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker-init.js" charset="UTF-8"></script>
    <script src="../assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script src="../assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js" charset="UTF-8"></script>
    <!-- Common js-->
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/layout.js"></script>
    <script src="../assets/js/theme-color.js"></script>
    <!-- Material -->
    <script src="../assets/plugins/material/material.min.js"></script>
    <!-- dropzone -->
    <script src="../assets/plugins/dropzone/dropzone.js"></script>
    <!--tags input-->
    <script src="../assets/plugins/jquery-tags-input/jquery-tags-input.js"></script>
    <script src="../assets/plugins/jquery-tags-input/jquery-tags-input-init.js"></script>
    <!--select2-->
    <script src="../assets/plugins/select2/js/select2.js"></script>
    <script src="../assets/js/pages/select2/select2-init.js"></script>
    <!-- end js include path -->
</body>

</html><?php }}}?> 