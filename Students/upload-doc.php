<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


if(isset($_POST['submit']))
	
  {
	  $eid=$_SESSION['elogin'];
        $report=$_FILES["report"]["name"];
        $certificate=$_FILES["certificate"]["name"];
        
    
$extensionreport = substr($report,strlen($report)-4,strlen($report));
$extensioncertificate = substr($certificate,strlen($certificate)-4,strlen($certificate));


// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif",".pdf",".PDF");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extensionreport,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif/pdf format allowed');</script>";
}
elseif(!in_array($extensioncertificate,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif/pdf format allowed');</script>";
}



else
{
//rename upload file
$report=md5($report).$extensiontc;
$certificate=md5($certificate).$extensioncertificate;


     move_uploaded_file($_FILES["report"]["tmp_name"],"userdocs/".$report);
     move_uploaded_file($_FILES["certificate"]["tmp_name"],"userdocs/".$certificate);
	 $query=mysqli_query($con,"select * from tbldocument where  UserID='$eid'");
    $rw=mysqli_num_rows($query);
 
    $query=mysqli_query($con,"insert into tbldocument(UserID,report,certificate) value('$eid','$report','$certificate')");
    $report="";
	$certificate="";
    if ($query) {
    $msg="Data has been uploaded successfully.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
}
  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>College Addmission Management System</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/extended/form-extended.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <style>
    .errorWrap {
    padding: 10px;
    margin: 20px 0 0px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>

</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           Upload Documents
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Documents
                </li>
                
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
        <!-- Input Mask start -->
   
        <!-- Formatter start -->
<?php 
$eid=$_SESSION['elogin'];
$ret=mysqli_query($con,"select AdminStatus from student where grno='$eid'");
$num=mysqli_fetch_array($ret);
$adstatus=$num['AdminStatus'];
if($adstatus=='1')
{

$query=mysqli_query($con,"select * from tbldocument where  UserID='$eid'");
$rw=mysqli_num_rows($query);
if($rw>0)
{
while($row=mysqli_fetch_array($query)){
?>
<p style="font-size:16px; color:red" align="center">Your document is already uploaded.</p>

<table class="table mb-0">

<tr>
  <th>Technical Report</th>
  <td><a href="userdocs/<?php echo $row['report'];?>" target="_blank">View File </a></td>
    <td><a href="userdocs/<?php echo $row['report'];?>" target="_blank">Delete File </a></td>

</tr>
<tr>
  <th>Internship Certificate</th>
  <td><a href="userdocs/<?php echo $row['certificate'];?>" target="_blank">View File </a></td>
      <td><a href="userdocs/<?php echo $row['report'];?>" target="_blank">Delete File </a></td>

</tr>

</table>
<?php } }  else { ?>
<form name="submit" method="post" enctype="multipart/form-data">        
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload Documents</h4>

                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                  
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
 <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Technical Report</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="report" name="report"  type="file" required>
    </div>
</fieldset>
                 
</div>

</div>
 <div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Internship Certificate                  </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="certificate" name="certificate"  type="file" required>
    </div>
</fieldset>                 
</div>

                    </div>        
<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Submit</button>
</div>
</div>
 </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php } }  else if($num>0 && $adstatus==''){ ?>
<p> Your application is pending with admin  </p>
<?php } else if($num>0 && $adstatus=='2'){ ?>
<p> Your application has been rejected by admin  </p>
<?php } else{?> 
  <p> First fill the application then upload docs.  </p>
<?php } ?>
          <!-- Formatter end -->
      </form>  
      </div>
    </div>
  </div>
<?php include('includes/footer.php');?>
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/handlebars.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/formatter/formatter.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/card/jquery.card.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-typeahead.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-inputmask.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-formatter.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-maxlength.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-card.js" type="text/javascript"></script>

</body>
</html>

