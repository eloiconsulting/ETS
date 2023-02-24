<?php include('header.php');?>
<?php //echo "<pre>";print_r($_SESSION);exit;?>
<div class="page-topbar">
       <!-- <div class="logo-area"> </div> -->
        <div class="quick-area">
            
        <ul class="pull-left info-menu  user-notify">
         <button id="menu_icon"><i class="fa fa-bars" aria-hidden="true"></i></button>
         <!-- <li><a href="#"> <i class="fa fa-envelope"></i> <span class="badge">8</span></a></li> -->
         <!-- <li><a href="#"> <i class="fa fa-bell"></i> <span class="badge">5</span></a></li>          -->
         </ul>
        
       <ul class="pull-right info-menu user-info">
        <?php if($_SESSION['userid'] == 1){?>
        <li><a href="#"> <i class="fa fa-bell"></i> <span class="badge"><?php echo $_SESSION['newcounts'];?></span></a></li>
        <?php }else{ 
             if(isset($_SESSION['newusertask'])){?>
         <li><a href="#"> <i class="fa fa-bell"></i> <span class="badge"><?php echo $_SESSION['newusertask'];?></span></a></li>
            <!-- // if(isset($_SESSION['assigntask'])){?> -->
         <!-- <li><a href="#"> <i class="fa fa-bell"></i> <span class="badge"><?php //echo $_SESSION['assigntask'];?></span></a></li> -->

         <?php }else
         { ?>
         <li><a href="#"> <i class="fa fa-bell"></i> <span class="badge">0</span></a></li>
     <?php } 
        }  ?>
         <li class="profile">
             <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
                 <img src="<?php echo base_url();?>assets/images/avatar.jpg" class="img-circle img-inline">
                 <span><?php echo $_SESSION['username'];?><!--<i class="fa fa-angle-down"></i>--></span>
             </a>
             <ul class="dropdown-menu profile fadeIn ">
                        <li>
                            <a href="#settings">
                                <i class="fa fa-wrench"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="#profile">
                                <i class="fa fa-user"></i>
                                Profile
                            </a>
                        </li>
                        
                        <li class="last">
                            <a href="ui-login.html">
                                <i class="fa fa-lock"></i>
                                Sign Out
                            </a>
                        </li>
                    </ul>
             
            
           </li>
           <li><a href="<?php echo base_url();?>Dashboardctrl/logout/1"> Logout</li>
         </ul>
            
    </div>
    </div>
    
    <div class="page-sidebar expandit">
      <div class="sidebar-inner" id="main-menu-wrapper">
         <div class="profile-info row ">
           <div class="profile-image ">
                <a href="<?php echo base_url();?>Dashboardctrl/index">
                    <img alt="" src="<?php echo base_url();?>assets/images/eloi_icon.png" class="img-circle img-inline" class="img-responsive img-circle">
                </a>
            </div>
             <div class="profile-details">
                <h3>
                    <a href="<?php echo base_url();?>Dashboardctrl/index">Eloi Enquiry Dashboard</a> 
                    <!-- <a href="ui-profile.html"><?php echo $_SESSION['username'] ;?></a>  -->
                </h3>
                
            </div>
          </div>
          
          <ul class="wraplist" style="height: auto;"> 
<!--          <li class="menusection">Main</li>-->
          <li><a href="<?php echo base_url();?>Dashboardctrl/index"><span class="sidebar-icon"><i class="fa fa-tachometer" aria-hidden="true"></i></span> <span class="menu-title">Dashboard</span></a></li>
          
          <?php if($_SESSION['userid'] ==1)
          {?>
          <!--  <li ><a href="<?php echo base_url();?>Dashboardctrl/tasklist"><span class="sidebar-icon"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <span class="menu-title">Task List</span></a>
          </li> -->
          <li ><a href="<?php echo base_url();?>Dashboardctrl/assignedtasklist"><span class="sidebar-icon"><i class="fa fa-list-alt" aria-hidden="true"></i></span> <span class="menu-title">Assigned Task list</span></a>
          </li>
          <li ><a href="<?php echo base_url();?>Dashboardctrl/newenq"><span class="sidebar-icon"><i class="fa fa-forumbee" aria-hidden="true"></i></span> <span class="menu-title">New Enquiry Form</span></a>
          </li>
          <li ><a href="<?php echo base_url();?>Dashboardctrl/totallist"><span class="sidebar-icon"><i class="fa fa-cubes" aria-hidden="true"></i></span></span> <span class="menu-title">Total Enquiry</span></a>
          </li>
            <li><a href="<?php echo base_url();?>Dashboardctrl/Inprogressopportunitylist"><span class="sidebar-icon"><i class="fa fa-tasks" aria-hidden="true"></i></span> <span class="menu-title">InProgress Opportunity</span></a></li>
           <li><a href="<?php echo base_url();?>Dashboardctrl/wonopportunitylist"><span class="sidebar-icon"><i class="fa fa-th-list" aria-hidden="true"></i></span> <span class="menu-title">Won Opportunity</span></a></li>
         
          <li><a href="<?php echo base_url();?>Dashboardctrl/lostopportunitylist"><span class="sidebar-icon"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> <span class="menu-title">Lost Opportunity</span></a></li> 
      <?php }else { ?>
            <li ><a href="<?php echo base_url();?>Dashboardctrl/usertasklist"><span class="sidebar-icon"><i class="fa fa-list-alt" aria-hidden="true"></i></span> <span class="menu-title">Assigned Task list</span></a>
          </li>
          <li ><a href="<?php echo base_url();?>Dashboardctrl/totallist"><span class="sidebar-icon"><i class="fa fa-cubes" aria-hidden="true"></i></span> <span class="menu-title">Total Enquiry</span></a>
          </li>
            <li><a href="<?php echo base_url();?>Dashboardctrl/Inprogressopportunitylist"><span class="sidebar-icon"><i class="fa fa-tasks" aria-hidden="true"></i></span> <span class="menu-title">Task InProgress </span></a></li>
           <li><a href="<?php echo base_url();?>Dashboardctrl/wonopportunitylist"><span class="sidebar-icon"><i class="fa fa-th-list" aria-hidden="true"></i></span> <span class="menu-title">Task Completed</span></a></li>
         
          <li><a href="<?php echo base_url();?>Dashboardctrl/lostopportunitylist"><span class="sidebar-icon"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> <span class="menu-title">Task Pending</span></a></li> 
      <?php } ?>
          
          
          </ul>
        </div>
    </div>