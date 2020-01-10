     <aside id="slide-out" class="side-nav white fixed">
	                     <?php
$eid=$_SESSION['elogin'];
$sql = "SELECT * from student where grno=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="userimages/<?php echo htmlentities($result->UserPic);?>." class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">

                                <p><?php echo htmlentities($result->name);?></p>
                                <span><?php echo htmlentities($result->grno)?></span>
                         <?php }} ?>
                        </div>
                    </div>

                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">

  <li class="no-padding"><a class="waves-effect waves-grey" href="Student_Profile.php"><i class="material-icons"></i>Profile</a></li>

				
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons"></i>Pre-Internship Details<i class="nav-drop-icon material-icons"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="apply_internship.php">Add Details</a></li>
								<li><a href="history.php">Status</a></li>
                            </ul>
                        </div>
                    </li>
                     <li class="no-padding"><a class="waves-effect waves-grey" href="all_students.php"><i class="material-icons"></i>Internships Offer</a></li>
					
                     <li class="no-padding"><a class="waves-effect waves-grey" href="Placements.php"><i class="material-icons"></i>Placement</a></li>
                     <li class="no-padding"><a class="waves-effect waves-grey" href="change-password.php"><i class="material-icons"></i>Change Password</a></li>

                  <li class="no-padding">
                                <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons"></i>Log Out</a>
                            </li>


                </ul>
               
                </div>
            </aside>
