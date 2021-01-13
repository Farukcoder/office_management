<?php
require_once "../includes/head.php";
require_once "../includes/header.php";
require_once "../includes/leftmenu.php";
require_once "../dbcon.php";

// $sql= "SELECT * FROM  employee WHERE id = $id";
// $result= mysqli_query($con, $sql);
if(isset($_POST['update_employee'])){

  $id=$_GET['id'];

  $fileName = $_FILES['photo']['name'];
  $fileType = $_FILES['photo']['type'];
  $fileTmp = $_FILES['photo']['tmp_name'];
  $fileError = $_FILES['photo']['error'];
  $fileSize = $_FILES['photo']['size'];
  $ext      = pathinfo($fileName, PATHINFO_EXTENSION);

  //Upload
  if (!empty($_FILES['photo']['name'])) {
    if ($ext === 'png' or $ext === 'jpg' or $ext === 'jpeg') {
      if ($fileSize < 1500000) {
        $photo = date('d_m_Y_h_i_s').".".$ext;
      } else {
        echo $inputError['photo'] = "your file to be larg";
      }
    } else {
      $inputError['photo'] = "please upload PNG,JPG,JPEG file";
    }
  }
  $record_id=$_POST['record_id'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $emergency_contact=$_POST['emergency_contact'];
  $father_name=$_POST['father_name'];
  $mother_name=$_POST['mother_name'];
  $present_address=$_POST['present_address'];
  $parmanent_address=$_POST['parmanent_address'];
  $birth_day=$_POST['birth_day'];
  $national_id=$_POST['national_id'];
  $education_level=$_POST['education_level'];
  $employment_type=$_POST['employment_type'];
  $branch_id=$_POST['branch_id'];


  // $date = date('m/d/Y h:i:s', time());
  // $updated_by_ip=$_SERVER['REMOTE_ADDR'];

  $sql="UPDATE `employee` SET `photo`='$photo',`record_id`='$record_id',`name`='$name',`email`='$email',`mobile`='$mobile',`emergency_contact`='$emergency_contact',`father_name`='$father_name',`mother_name`='$mother_name',`present_address`='$present_address',`parmanent_address`='$parmanent_address',`birth_day`='$birth_day',`national_id`='$national_id',`education_level`='$education_level',`employment_type`='$employment_type',`branch_id`='$branch_id' WHERE id=$id";


  $result= mysqli_query($con,$sql);

  if($result){
    move_uploaded_file($fileTmp,'../image/employee/'.$photo);
  $success="your data update successfully";
  }else{
      $error="Something wrong..!!!";
  }

}


  $id=$_GET['id'];
  $query = "SELECT*FROM employee WHERE id = $id";
  $result= mysqli_query($con, $query);

  $row = mysqli_fetch_assoc($result);

?>
<div class="content-wrapper" style="min-height: 208px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-10">
          <h1 class="m-0 text-dark">Create New Employee</h1>
        </div><!-- /.col -->
        <!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
    <?php
      if(isset($success)){
        ?>
        <div class="alert alert-success alert-dismissible fade show col-sm-4" style="position: relative;left:393px;">
          <h5>Your data update successfully..!!!</h5>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php
      }else{
        if(isset($error)){
          if(isset($inputError['photo'])){
        ?>
        
        <div class="alert alert-danger alert-dismissible fade show col-sm-4" style="position: relative;left:393px;">
          <h5>Opps..!! invalid updated data</h5>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php
          }
        }
      }
    ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <form id="create_employee" method="POST" action="" enctype="multipart/form-data" data-parsley-validate="" novalidate="">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-user"></i>
                  &nbsp; Personal Information
                </h3>
              </div>
              <div class="card-body pad table-responsive">
                <div class="row" style="margin-bottom: 13px;">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-5"></div>
                      <div class="col-md-4">
                        <img src="<?='../image/employee/'.$row['photo']?>" class="img-circle elevation-2" alt="User Image" style="width: 120px;margin-left: 100px">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-4 col-form-label control_label"> Upload Photo </label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo" id="emp_photo">
                                <label class="custom-file-label" for="exampleInputFile" id="photo">Choose Picture</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label control_label"> Record ID <span class="required">*</span> </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="record_id" id="record_id" placeholder="Enter Record ID" required="" data-parsley-errors-messages-disabled="" data-parsley-trigger="keyup" value="<?= $row['record_id']?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label control_label"> Name <span class="required">*</span> </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" data-parsley-trigger="keyup" required="" data-parsley-errors-messages-disabled="" data-parsley-pattern="[a-zA-Z\pL\s\-]+$" value="<?= $row['name']?>" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label control_label">Email <span class="required">*</span></label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" data-parsley-trigger="keyup" required="" data-parsley-type="email" data-parsley-errors-messages-disabled=""value="<?= $row['email']?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="mobile" class="col-sm-4 col-form-label control_label">Mobile <span class="required">*</span> </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" required="" data-parsley-trigger="keyup" data-parsley-pattern="^[0-9]*$" data-parsley-errors-messages-disabled="" value="<?= $row['mobile']?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label control_label">Emergency Contact</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="emergency_contact" id="emergency_contact" placeholder="Emergency Mobile" required="" data-parsley-pattern="^[0-9]*$" data-parsley-errors-messages-disabled=""  value="<?= $row['emergency_contact']?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="father_name" class="col-sm-4 col-form-label control_label">Father Name <span class="required">*</span> </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name" required="" data-parsley-trigger="keyup" data-parsley-errors-messages-disabled="" data-parsley-pattern="[a-zA-Z\pL\s\-]+$" value="<?= $row['father_name']?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="mother_name" class="col-sm-4 col-form-label control_label">Mother Name <span class="required">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Mother Name" required="" data-parsley-trigger="keyup" data-parsley-errors-messages-disabled="" data-parsley-pattern="[a-zA-Z\pL\s\-]+$" value="<?= $row['mother_name']?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="present_address" class="col-sm-4 col-form-label control_label">Present Address </label>
                      <div class="col-sm-8">
                        <textarea class="form-control" name="present_address" id="present_address" placeholder=" Employee Present Address here..." rows="4" cols="50" value="<?= $row['present_address']?>"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="parmanent_address" class="col-sm-4 col-form-label control_label">Parmanent Address </label>
                      <div class="col-sm-8">
                        <textarea class="form-control" name="parmanent_address" id="parmanent_address" placeholder=" Employee Parmanent Address here..." rows="4" cols="50" value="<?= $row['parmanent_address']?>"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="birth_day" class="col-sm-4 col-form-label control_label">Date of Birth <span class="required">*</span> </label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control" name="birth_day" id="birth_day" placeholder="Birth Day" required="" data-parsley-errors-messages-disabled="" value="<?= $row['birth_day']?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="national_id" class="col-sm-4 col-form-label control_label">NID <span class="required">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="national_id" id="national_id" placeholder="National ID" required="" data-parsley-errors-messages-disabled="" data-parsley-trigger="keyup" data-parsley-pattern="^[0-9]*$" data-parsley-minlength="10" data-parsley-maxlength="18" value="<?= $row['national_id']?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="education_level" class="col-sm-4 col-form-label control_label">Highest Education Level <span class="required">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control input-lg" name="education_level" id="education_level" placeholder="Ex : BSC in Computer Science " required="" data-parsley-errors-messages-disabled="" value="<?= $row['education_level']?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="employment_type" class="col-sm-4 col-form-label control_label">Employment Type <span class="required">*</span> </label>
                      <div class="col-sm-8">
                        <div class="form-group" data-select2-id="69">

                          <select class="form-control" name="employment_type" id="employment_type" style="width: 100%;" data-parsley-errors-messages-disabled="" required="" value="<?= $row['employee_type']?>">
                            <option value="">Select Employment</option>
                            <option value="1">Probationary</option>
                            <option value="2">Parmanent</option>
                            <option value="3">Full Time</option>
                            <option value="4">Part Time</option>

                          </select>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="branch_id" class="col-sm-4 col-form-label control_label">Branch <span class="required">*</span></label>
                      <div class="col-sm-8">
                        <select class="form-control" style="width: 100%;" name="branch_id" id="branch_id" data-parsley-errors-messages-disabled="" required="" value="<?= $row['branch_id']?>">
                          <option value="">Select Branch</option>
                          <option value="1">Dhaka Head Office </option>
                          <option value="2">Cumilla Brach</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-md-5">
                  </div>
                  <div class="col-md-3">


                    <button class="btn btn-success" type="submit" name="update_employee" style="width: 100%"><i class="fa fa-save"></i> Update </button>

                  </div>
                  <div class="col-md-2">
                    <button class="btn btn-danger" type="reset" style="width: 100%"><i class="fa fa-times"></i> Cancel </button>

                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.card -->
          </div>
        </form>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<script type="text/javascript">
  $(function() {
        $('#create_employee').parsley().on('field:validated', function() {

          on('form:submit', function() {
            return false; // Don't submit form for this demo
          });
        });
</script>
<?php
require_once "../includes/foot.php";
require_once "../includes/footer.php";
?>