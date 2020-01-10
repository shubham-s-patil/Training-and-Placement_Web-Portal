<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    
    $department=$_POST['department'];
    $name=$_POST['name'];
    $grno=$_POST['grno'];
	$rollno=$_POST['rollno'];
    $dob=$_POST['dob'];
	$shift=$_POST['shift'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $year=$_POST['year'];
    $division=$_POST['division'];
    $mob=$_POST['mob'];
	$email=$_POST['email'];
    $address=$_POST['address'];
    $paddress=$_POST['paddress'];
    $upic=$_FILES["userpic"]["name"];
    $status=1;
$extension = substr($upic,strlen($upic)-4,strlen($upic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
// rename user pic
$userpic=md5($upic).$extension;
     move_uploaded_file($_FILES["userpic"]["tmp_name"],"userimages/".$userpic);
    $query=mysqli_query($con,"insert into student(name,grno,rollno,department,password,dob,year,division,shift,gender,email,mob,address,paddress,UserPic,status) value('$name','$grno','$rollno','$department','$password','$dob','$year','$division','$shift','$gender','$email','$mob','$address','$paddress','$userpic','$status')");
    if ($query) {
    $msg="Data has been added successfully.";
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

  <title>Student Registration</title>
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
           Student Registration
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.html">Home</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active"><a href="#">Application</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">





<form name="submit" method="post" enctype="multipart/form-data">        
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Addimission Form</h4>

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
  <h5>Full Name                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="name" name="name"  type="text" placeholder="enter full name" required>
    </div>
</fieldset>               
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Gr No.                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="grno" name="grno" placeholder="eg. U1720197"  type="text" required>
    </div>
</fieldset>               
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Roll No.                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="rollno" name="rollno" placeholder="enter roll no"  type="text" required>
    </div>
</fieldset>               
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Department                  </h5>
   <div class="form-group">
   <select name='department' id="department" class="form-control white_bg">
     <option value="">Course Applied</option>
      <?php $query=mysqli_query($con,"select * from tblcourse");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['CourseName'];?>"><?php echo $row['CourseName'];?></option>
                  <?php } ?>  
   </select>
    </div>
</fieldset>
                   
</div>

<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student Pic                   </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="userpic" name="userpic"  type="file" required>
    </div>
</fieldset>                  
</div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Shift               </h5>
   <div class="form-group">

   <select class="form-control white_bg" id="shift" name="shift"  required>
    <option value="">Select</option>
<option value="A">I</option>
<option value="B">II</option>
   </select>
                          </div>
                        </fieldset>
                      </div>
			
 </div>  
 
 <div class="row">

<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Password                 </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="password" name="password"  type="password" required>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Confirm Password                 </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="cpassword" name="cpassword"  type="password" required>
                          </div>
                        </fieldset>
                      </div>
                    </div>
					
<div class="row">
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>DOB                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="dob" name="dob"  type="text" placeholder="YYYY-MM-DD" required>
          <small class="text-muted">DOB Must be in this format (YYYY-MM-DD)</small>
    </div>

</fieldset>                  
</div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Year                  </h5>
   <div class="form-group">
   <select name='year' id="year" class="form-control white_bg">
     <option value="">Select..</option>
    <option>FE</option>
	<option>SE</option>
	<option>TE</option>
	<option>BE</option> 
   </select>
    </div>
</fieldset>
                   
</div>

<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Division                </h5>
   <div class="form-group">

   <select class="form-control white_bg" id="division" name="division"  required>
    <option value="">Select</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
   </select>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Gender                </h5>
   <div class="form-group">

   <select class="form-control white_bg" id="gender" name="gender"  required>
    <option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
   </select>
                          </div>
                        </fieldset>
                      </div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Mobile No.                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="mob" name="mob" placeholder="enter mobile no"  type="text" required>
    </div>
</fieldset>               
</div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Email                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="email" name="email" placeholder="enter email"  type="text" required>
    </div>
</fieldset>               
</div>
                    </div>
<div class="row" style="margin-top:1%">
  <div class="col-xl-12 col-lg-12">
    <fieldset>
  <h5>Correspondence Address                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="address" name="address"  type="text" required>
    </div>
</fieldset>
  </div>
</div>
<div class="row">
  <div class="col-xl-12 col-lg-12">
    <fieldset>
  <h5>Permanent Address                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="paddress" name="paddress"  type="text" required>
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
<?php   ?>
