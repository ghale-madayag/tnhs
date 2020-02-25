<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SF 3 | TNHS</title>
  <?php include_once('inc/header.php')?>
</head>
<body class="hold-transition sidebar-mini skin-red">
<div class="wrapper">
    <?php include_once('inc/header-menu.php') ?>
    <?php include_once('inc/main-sidebar.php');?>
    <div class="content-wrapper">
      <section class="content-header">
       <h1>
          School Form 3
          <small>List</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">School Form 3</li>
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
            <form id="form-sf3-all" class="form-horizontal" enctype="multipart/form-data" method="post">
                <table id="sf3-all" class="display nowrap table table-hover sf3-all" style="width:100%">
                    <thead>
                        <tr>
                            <th width="5"><div style="display: none;"><input type="checkbox" id="select-all"><label for="select-all"></label></div></th>
                            <th>Name	</th>
                            <th>Book / ModuleTitle	</th>
                            <th>Date Issued</th>
                            <th>Date Returned</th>
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
  </div>

  <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">School Form 3</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="form-sf3" enctype="multipart/form-data" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="fullname" class="col-sm-4 control-label">Name:</label>
                                <div class="col-sm-8">
                                  <select id="fullname" style="width:100%;" class="form-control select2" name="fullname" placeholder="School Year"></select>    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">Book Title:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date_issued" class="col-sm-4 control-label">Date Issued:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="date_issued" name="date_issued" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date_returned" class="col-sm-4 control-label">Date Returned:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="date_returned" name="date_returned" class="form-control">
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
  <?php include_once('inc/footer.php'); ?>
  <div class="control-sidebar-bg"></div>
</div>
<?php include_once('inc/script.php'); ?>
<script src="dist/js/jquery-toast-plugin-master/dist/jquery.toast.min.js"></script>
<script src="dist/js/toast.js"></script>
<script src="dist/js/sf3.js"></script>
<script>
    $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('#date_issued').datepicker({
        autoclose: true
    })

    $('#date_returned').datepicker({
        autoclose: true
    })
    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".sf3-all input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".sf3-all input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

  });
</script>
</body>
</html>
