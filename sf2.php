<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SF 2 | TNHS</title>
  <?php include_once('inc/header.php')?>
</head>
<body class="hold-transition sidebar-mini skin-red">
<div class="wrapper">
    <?php include_once('inc/header-menu.php') ?>
    <?php include_once('inc/main-sidebar.php');?>
    <div class="content-wrapper">
      <section class="content-header">
       <h1>
          School Form 2
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
            <form id="form-sf2-all" class="form-horizontal" enctype="multipart/form-data" method="post">
                <table id="sf2-all" class="table table-striped sf2-all display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5"><div style="display: none;"><input type="checkbox" id="select-all"><label for="select-all"></label></div></th>
                            <th>LRN</th>
                            <th>Name</th>
                            <th>Date Created</th>
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
  <?php include_once('inc/footer.php'); ?>
  <div class="control-sidebar-bg"></div>
</div>
<?php include_once('inc/script.php'); ?>
<script src="dist/js/jquery-toast-plugin-master/dist/jquery.toast.min.js"></script>
<script src="dist/js/toast.js"></script>
<script src="dist/js/sf2.js"></script>
<script>
    
    getAllSf2();
    $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
   
    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".sf2-all input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".sf2-all input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

  });
</script>
</body>
</html>