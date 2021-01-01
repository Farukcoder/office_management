<?php
    $page = explode('/',$_SERVER['PHP_SELF']);
    $page = end($page);
?>

<!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="javascript:void(0)" class="brand-link">
         &nbsp;&nbsp;&nbsp; <i class="fa fa-desktop" style="opacity: .8"></i>
         <span class="brand-text font-weight-light"><b>Innovation &lt;</b><span style="color:#0069D9;font-size: 22px;font-weight: bolder;">IT</span><b>&gt;</b></span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="../image/icon/user.png" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="javascript:void(0)" class="d-block">Super_admin</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="deshboard.php" class="nav-link <?= ($page=='deshboard.php')? 'active':''; ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Deshboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item  <?= ($page == 'employee.php')? 'menu-open':''; ?><?= ($page == 'hr_setting.php')? 'menu-open':''; ?><?= ($page == 'creat_employee.php')? 'menu-open':''; ?>">
                     <a href="" class="nav-link <?= ($page == 'employee.php')? 'active':''; ?><?= ($page == 'hr_setting.php')? 'active':''; ?><?= ($page == 'creat_employee.php')? 'active':''; ?>">
                         <i class="nav-icon fas fa-chart-line"></i>
                         <p>
                             HR Module
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview " style="<?= ($page == 'employee.php')? 'active':''; ?><?= ($page == 'creat_employee.php')? 'active':''; ?> ">
                         <li class="nav-item  ">
                             <a href="../admin/employee.php" class="nav-link <?= ($page == 'employee.php')? 'active':''; ?><?= ($page == 'creat_employee.php')? 'active':''; ?>">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>Employee</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="../admin/hr_setting.php" class="nav-link <?= ($page == 'hr_setting.php')? 'active':''; ?>">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>HR Setting</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link ">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>Salary Generate</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>Salary Report</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>Bank Payslip</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>Leave Managment</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>calender</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fa fa-calculator"></i>
                         <p>
                             Attendance
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">
                         <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link active">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>Employee Attendance</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fa fa-cogs"></i>
                         <p>
                             Setting
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">
                         <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link active">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>Department</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link active">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>Designation</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fa fa-home"></i>
                         <p>
                             Company Setting
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">
                         <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link active">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>Profile</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="javascript:void(0)" class="nav-link active">
                                 <i class="far fa-dot-circle nav-icon"></i>
                                 <p>Branch</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             </ul>
             </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>