<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Employee | TNHS</title>
  <?php include_once('inc/header.php')?>
</head>
<body class="hold-transition sidebar-mini skin-red">
<div class="wrapper">
    <?php include_once('inc/header-menu.php') ?>
    <?php include_once('inc/main-sidebar.php');?>
    <div class="content-wrapper">
      <section class="content-header">
       <h1>
          Employee
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
            <form id="form-emp-all" class="form-horizontal" enctype="multipart/form-data" method="post">
                <table id="emp-all" class="table table-striped emp-all" cellspacing="0" width="100%">
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
                    <h4 class="modal-title">Register user</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="form-emp" enctype="multipart/form-data" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="emp_id" class="col-sm-4 control-label">Employee No. / T.I.N. :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Employee No. / T.I.N." >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_fname" class="col-sm-4 control-label">First name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="emp_fname" name="emp_fname" placeholder="First name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_mname" class="col-sm-4 control-label">Middle initial:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="emp_mname" name="emp_mname" placeholder="Middle initial">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_lname" class="col-sm-4 control-label">Last name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="emp_lname" name="emp_lname" placeholder="Last name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_sex" class="col-sm-4 control-label">Sex:</label>
                                <div class="col-sm-8">
                                    <div class="radio">
                                        <label>
                                        <input type="radio" name="emp_sex" id="emp_sex_m" value="M" checked="">
                                        Male
                                        </label>
                                        <label>
                                        &nbsp; <input type="radio" name="emp_sex" id="emp_sex_f" value="F">
                                        Female 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_fund" class="col-sm-4 control-label">Fund Source:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="emp_fund" name="emp_fund" placeholder="Fund Source" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_position" class="col-sm-4 control-label">Position/Designation:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="emp_position" name="emp_position" placeholder="Position/Designation" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_nature" class="col-sm-4 control-label">Nature of Appointment:</label>
                                <div class="col-sm-8">
                                    <div class="radio">
                                        <label>
                                        <input type="radio" name="emp_nature" id="emp_nature_1" value="Regular" checked="">
                                        Regular
                                        </label>
                                        <label>
                                        &nbsp; <input type="radio" name="emp_nature" id="emp_nature_2" value="Probationary">
                                        Probationary 
                                        </label>
                                        <label>
                                        &nbsp; <input type="radio" name="emp_nature" id="emp_nature_3" value="Part Time">
                                        Part Time 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_degree" class="col-sm-4 control-label">Degree/ Postgraduate:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="emp_degree" name="emp_degree" placeholder="Degree/ Postgraduate" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_major" class="col-sm-4 control-label">Major/ Specialization:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="emp_major" name="emp_major" placeholder="Major/ Specialization" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_minor" class="col-sm-4 control-label">Minor:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="emp_minor" name="emp_minor" placeholder="Minor" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_fsem" class="col-sm-4 control-label">Subjects Taught, Advisory Class & Other Ancillary Assignments:</label>
                                <div class="col-sm-8">
                                    <a class="btn">
                                        <i class="fa fa-plus"></i> Add Subject
                                    </a>
                                </div>
                            </div>
                            <div class="subject">
                                <div class="form-group">
                                    <label for="emp_semester" class="col-sm-4 control-label">Semester:</label>
                                    <div class="col-sm-8">
                                    <select class="form-control" id="emp_semester" name="emp_semester">
                                        <option value="First semester">First Semester</option>
                                        <option value="Second semester">Second Semester</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emp_section" class="col-sm-4 control-label">Subject:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="emp_subject" name="emp_subject" placeholder="Subject" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emp_section" class="col-sm-4 control-label">Grade and Section:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="emp_section" name="emp_section" placeholder="Grade and Section" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emp_day" class="col-sm-4 control-label">Day:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="emp_day" name="emp_day" placeholder="M/T/W/TH/F" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emp_day_from" class="col-sm-4 control-label">From:</label>
                                    <div class="col-sm-8">
                                        <input type="time" class="form-control" id="emp_day_from" name="emp_day_from">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emp_day_to" class="col-sm-4 control-label">To:</label>
                                    <div class="col-sm-8">
                                        <input type="time" class="form-control" id="emp_day_to" name="emp_day_to">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emp_min_week" class="col-sm-4 control-label">Total Actual Teaching Minutes per Week
                                    :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="emp_min_week" name="emp_min_week">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_remarks" class="col-sm-4 control-label">Remarks:</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" placeholder="*For Detailed Items, Indicate name of school/office,*For IP - Ethnicity), *For additional loads from JHS- please indicate the number of teaching minutes per week)" name="emp_remarks" id="emp_remarks"></textarea>
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
<script src="dist/js/employee.js"></script>
<script>
    getAllEmp();
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

  });
</script>
</body>
</html>
