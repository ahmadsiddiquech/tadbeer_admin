<?php    
	$curr_url = $this->uri->segment(2);
	$active="active";
  $role_id = $this->session->userdata('user_data')['role_id'];
?>
<!-- sidebar-->
<aside class="aside" >
 <!-- START Sidebar (left)-->
 <div class="aside-inner" >
    <nav data-sidebar-anyclick-close="" class="sidebar">
       <!-- START sidebar nav-->
       <ul class="nav page-sidebar-menu">
          <!-- Iterates over all sidebar items-->
          <?php if($role_id==1){ ?>
          <li class="<?php if($curr_url == 'organizations'){echo 'active';}    ?>">
              <a href="<?php $controller='organizations'; 
              echo ADMIN_BASE_URL . $controller ?>">
             <em class="fa fa-users"></em>
                <span>Organizations</span>
             </a>
          </li>
         <?php } if($role_id != 1){ ?>
          <li class="<?php if($curr_url == 'dashboard'){echo 'active';}    ?>">
                <a href="<?php $controller='dashboard'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-home"></em>
                   <span>Dashboard</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'slider'){echo 'active';}    ?>">
                <a href="<?php $controller='slider'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-money"></em>
                   <span>Home Slider</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'settings'){echo 'active';}    ?>">
                <a href="<?php $controller='settings'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-money"></em>
                   <span>General Settings</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'services'){echo 'active';}    ?>">
                <a href="<?php $controller='services'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-money"></em>
                   <span>Services</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'our_team'){echo 'active';}    ?>">
                <a href="<?php $controller='our_team'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-money"></em>
                   <span>Our Team</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'packages'){echo 'active';}    ?>">
                <a href="<?php $controller='packages'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-money"></em>
                   <span>Packages</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'gallery'){echo 'active';}    ?>">
                <a href="<?php $controller='gallery'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-money"></em>
                   <span>Gallery</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'news'){echo 'active';}    ?>">
                <a href="<?php $controller='news'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-money"></em>
                   <span>News</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'about_us'){echo 'active';}    ?>">
                <a href="<?php $controller='about_us'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-money"></em>
                   <span>About us</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'contact_us'){echo 'active';}    ?>">
                <a href="<?php $controller='contact_us'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-money"></em>
                   <span>Contact Us</span>
                </a>
          </li>
          <li class="<?php if($curr_url == 'feedback'){echo 'active';}    ?>">
                <a href="<?php $controller='feedback'; 
                   echo ADMIN_BASE_URL . $controller ?>">
                   <em class="fa fa-money"></em>
                   <span>Feedback</span>
                </a>
          </li>
        <?php } ?>
       </ul>
       <!-- END sidebar nav-->
    </nav>
 </div>
 <!-- END Sidebar (left)-->
</aside>




