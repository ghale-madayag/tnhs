<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SF 1 | TNHS</title>
  <?php include_once('inc/header.php')?>
</head>
<body class="hold-transition sidebar-mini skin-red">
<div class="wrapper">
    <?php include_once('inc/header-menu.php') ?>
    <?php include_once('inc/main-sidebar.php');?>
    <div class="content-wrapper">
      <section class="content-header">
       <h1>
          School Form 1
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
            <form id="form-sf1-all" class="form-horizontal" enctype="multipart/form-data" method="post">
                <table id="sf1-all" class="table table-striped sf1-all display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5"><div style="display: none;"><input type="checkbox" id="select-all"><label for="select-all"></label></div></th>
                            <th>LRN</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Birthdate</th>
                            <th>Age</th>
                            <th>Religious Affilation</th>
                            <th>Complete Address</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Guardian</th>
                            <th>Relationship</th>
                            <th>Contact No.</th>
                            <th>Date Created.</th>
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

    <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">School Form 1</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="form-sf1" enctype="multipart/form-data" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="sf1_lrn" class="col-sm-4 control-label">LRN :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="sf1_lrn" name="sf1_lrn" placeholder="LRN" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_lname" class="col-sm-4 control-label">Last name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="sf1_lname" name="sf1_lname" placeholder="Last name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_fname" class="col-sm-4 control-label">First name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="sf1_fname" name="sf1_fname" placeholder="First name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_mname" class="col-sm-4 control-label">Middle initial:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="sf1_mname" name="sf1_mname" placeholder="Middle initial">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_sex_m" class="col-sm-4 control-label">Sex:</label>
                                <div class="col-sm-8">
                                    <div class="radio">
                                        <label>
                                        <input type="radio" name="sf1_sex" id="sf1_sex_m" value="M" checked="">
                                        Male
                                        </label>
                                        <label>
                                        &nbsp; <input type="radio" name="sf1_sex" id="sf1_sex_f" value="F">
                                        Female 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_dob" class="col-sm-4 control-label">Date of Birth:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="sf1_dob" name="sf1_dob" placeholder="Date of Birth" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_religion" class="col-sm-4 control-label">Religion:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"  placeholder="Religion" name="sf1_religion" id="sf1_religion">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_province" class="col-sm-4 control-label">Province:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" placeholder="Province" name="sf1_province" id="sf1_province"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_city" class="col-sm-4 control-label">City/Municipality:</label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control" placeholder="City/Municipality" name="sf1_city" id="sf1_city"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_add_line" class="col-sm-4 control-label">Complete Address:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"  placeholder="Complete Address" name="sf1_add_line" id="sf1_add_line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_fatname" class="col-sm-4 control-label">Father's Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="sf1_fatname" name="sf1_fatname" placeholder="Father's Name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_motname" class="col-sm-4 control-label">Mother's Maiden Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="sf1_motname" name="sf1_motname" placeholder="Mother's Maiden Name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_guaname" class="col-sm-4 control-label">Guardian's Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="sf1_guaname" name="sf1_guaname" placeholder="Guardian's Name (if learner is not living with parent)" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_rel" class="col-sm-4 control-label">Relationship:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="sf1_rel" name="sf1_rel" placeholder="Relationship" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sf1_contact" class="col-sm-4 control-label">Contact No:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="sf1_contact" name="sf1_contact" placeholder="Contact No." >
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
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
<script src="dist/js/city.js"></script>
<script src="dist/js/sf1.js"></script>
<script>
    
    getAllSf1();
    $(function () {
        var $e = new City();
        $e.showProvinces("#sf1_province");
        $e.showCities("#sf1_city");
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
   
    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".sf1-all input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".sf1-all input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    $('#sf1_dob').datepicker({
      autoclose: true
    })

  });
</script>
</body>
</html>
