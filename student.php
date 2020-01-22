<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student | TNHS</title>
  <?php include_once('inc/header.php')?>
</head>
<body class="hold-transition sidebar-mini skin-red">
<div class="wrapper">
    <?php include_once('inc/header-menu.php') ?>
    <?php include_once('inc/main-sidebar.php');?>
    <div class="content-wrapper">
      <section class="content-header">
       <h1>
          Student
          <small>List</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Users</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <form id="form-stud-all" class="form-horizontal" enctype="multipart/form-data" method="post">
                <table id="stud-all" class="table table-striped stud-all" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5"><div style="display: none;"><input type="checkbox" id="select-all"><label for="select-all"></label></div></th>
                            <th>Employee No.</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Fund Source</th>
                            <th>Position/ Designation</th>
                            <th>Nature of Appointment/ Employment Status</th>
                        </tr>
                    </thead>
                </table>
            </form>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
           
          </div>
          <!-- /.box-footer-->
        </div>
    </section>

    <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Register Student</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="form-stud" enctype="multipart/form-data" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="lrn" class="col-sm-4 control-label">LRN :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="lrn" name="lrn" placeholder="LRN" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_fname" class="col-sm-4 control-label">First name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="stud_fname" name="stud_fname" placeholder="First name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_mname" class="col-sm-4 control-label">Middle initial:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="stud_mname" name="stud_mname" placeholder="Middle initial">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_lname" class="col-sm-4 control-label">Last name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="stud_lname" name="stud_lname" placeholder="Last name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_dob" class="col-sm-4 control-label">Date of Birth:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="stud_dob" name="stud_dob" placeholder="Date of Birth" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_sex_m" class="col-sm-4 control-label">Sex:</label>
                                <div class="col-sm-8">
                                    <div class="radio">
                                        <label>
                                        <input type="radio" name="stud_sex" id="stud_sex_m" value="M" checked="">
                                        Male
                                        </label>
                                        <label>
                                        &nbsp; <input type="radio" name="stud_sex" id="stud_sex_f" value="F">
                                        Female 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_dosa" class="col-sm-4 control-label">Date of SHS Admission:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="stud_dosa" name="stud_dosa" placeholder="Date of SHS Admission" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_hsc" class="col-sm-4 control-label">High School Completer:</label>
                                <div class="col-sm-8">
                                    <div class="radio">
                                            <input type="checkbox" name="stud_hsc" id="stud_hsc" value="yes">
                                        <label>
                                            <input type="text" class="form-control" id="stud_hsc_ave" name="stud_hsc_ave" placeholder="General Average" >
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_jhsc" class="col-sm-4 control-label">Junior High School Completer:</label>
                                <div class="col-sm-8">
                                    <div class="radio">
                                            <input type="checkbox" name="stud_jhsc" id="stud_jhsc" value="yes">
                                        <label>
                                            <input type="text" class="form-control" id="stud_jhsc_ave" name="stud_jhsc_ave" placeholder="General Average" >
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_dog" class="col-sm-4 control-label">Date of Grad/Comp:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="stud_dog" name="stud_dog" placeholder="Date of Graduation/Completion" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_pept" class="col-sm-4 control-label">PEPT Passer:</label>
                                <div class="col-sm-8">
                                    <div class="radio">
                                            <input type="checkbox" name="stud_pept" id="stud_pept" value="yes">
                                        <label>
                                            <input type="text" class="form-control" id="stud_pept_rat" name="stud_pept_rat" placeholder="Rating" >
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_als" class="col-sm-4 control-label">ALS A&E Passer:</label>
                                <div class="col-sm-8">
                                    <div class="radio">
                                            <input type="checkbox" name="stud_als" id="stud_als" value="yes">
                                        <label>
                                            <input type="text" class="form-control" id="stud_als_rat" name="stud_als_rat" placeholder="Rating" >
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_eli_other" class="col-sm-4 control-label">Others (Pls. Specify):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="stud_eli_other" name="stud_eli_other" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_doe" class="col-sm-4 control-label">Date of Exam/Ass:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="stud_doe" name="stud_doe" placeholder="Date of Examination/Assessment" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stud_als_add" class="col-sm-4 control-label">Name and Address of Community Learning Center:</label>
                                <div class="col-sm-8">
                                <textarea class="form-control" rows="3" placeholder="*Name and Address of Community Learning Center" name="stud_als_add" id="stud_als_add"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div>
  <?php include_once('inc/footer.php'); ?>
  <div class="control-sidebar-bg"></div>
</div>
<?php include_once('inc/script.php'); ?>
<script src="dist/js/jquery-toast-plugin-master/dist/jquery.toast.min.js"></script>
<script src="dist/js/toast.js"></script>
<script src="dist/js/student.js"></script>
<script>
    getAllStud();
    $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
   
    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".pl-all input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".pl-all input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    $('#stud_dob').datepicker({
      autoclose: true
    })

    $('#stud_dosa').datepicker({
      autoclose: true
    })
  });
</script>
</body>
</html>
