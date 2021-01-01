<?php
require_once "../includes/head.php";
require_once "../includes/header.php";
require_once "../includes/leftmenu.php";
require_once "../dbcon.php";

$id = $_GET['id'];
$sql = "SELECT * FROM employee WHERE id= $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

?>
<div class="content-wrapper" style="min-height: 544.4px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0 text-dark"> Employee Profile</h1>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">


                    <div class="card card-default card-outline">

                        <div class="card-header">
                            <h3 class="card-title"> </h3>

                            <div class="card-tools">


                                <a href="hr/employee/edit_employee/1" class="btn  btn-primary btn-block" style=""> <i class="fa fa-edit"></i> Edit</a>

                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <div class="card-body pad table-responsive">

                            <div class="card card-primary card-outline">
                                <div class="card-header"><i class="fas fa-address-card"></i> Personal Information
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-8 text-left">
                                            <h2 class="text-center" style="text-transform:capitalize;font-family: a;"><?= $row['name'] ?></h2>
                                            <h3 class="text-center text-secondary"><?= $row['branch_id']?></h3>

                                        </div>
                                        <div class="col-md-4">
                                            <img src="../image/icon/user.png" class="img-thumbnail elevation-2" alt="Employee Image" style="width: 120px;margin-left: 100px;border: 1px solid gray;border-radius: 5%">
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-md-12 table-responsive p-0">
                                            <div class="col-md-12" style="padding-top: 100px"></div>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Employee ID </th>
                                                        <td><?= $row['record_id']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Name </th>
                                                        <td><?=$row['name']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email </th>
                                                        <td><?=$row['email']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mobile </th>
                                                        <td><?=$row['mobile']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>present address </th>
                                                        <td><?=$row['present_address']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>present address </th>
                                                        <td><?=$row['parmanent_address']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Date of Birth </th>
                                                        <td><?= $row['birth_day']?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Father Name </th>
                                                        <td><?= $row['father_name']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mother Name </th>
                                                        <td><?= $row['mother_name']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            NID
                                                        </th>
                                                        <td><?= $row['national_id']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Highest Education Level
                                                        </th>
                                                        <td><?= $row['education_level']?></td>
                                                    </tr>


                                                </tbody>


                                            </table>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php
require_once "../includes/foot.php";
require_once "../includes/footer.php";
?>