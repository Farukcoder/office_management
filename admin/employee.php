<?php
require_once "../dbcon.php";
session_start();

if (!isset($_SESSION['is_logged'])) {
  header('location:login.php');
}
require_once "../includes/head.php";
require_once "../includes/header.php";
require_once "../includes/leftmenu.php";
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-users"></i> Employee list</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a href="employee_creat.php">
              <button type="button" class="btn btn-block bg-gradient-primary"><i class="fas fa-user"></i> Add Employee</button>
            </a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Photo</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Designation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $x=1;
                      $result=mysqli_query($con,"SELECT * FROM `employee`");
                      while($row=mysqli_fetch_assoc($result)){
                    ?>
                  <tr>
                    <td>
                      <?php
                        echo $x++;
                      ?>
                    </td>
                    <td><img src="<?= '../image/employee/'.$row['photo'];?>" class="img-circle elevation-2" alt="User Image" style="width: 70px;margin-left: 10px"></td>
                    <td><?php echo $row['record_id'];?></td>
                    <td><?= $row['name'];?></td>
                    <td><?= $row['email'];?></td>
                    <td><?= $row['mobile']?></td>
                    <td><?= $row['employment_type']?></td>
                    <td>
                    <a class="btn btn-info" href="employee_view.php?id=<?= $row['id'];?>">View</a>
                    <a class="btn btn-warning" href="employee_edit.php?id=<?= $row['id'];?>">Edit</a>
                      <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
require_once "../includes/foot.php";
require_once "../includes/footer.php";
?>