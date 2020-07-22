<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- </?php $this->load->view('include/header');?> -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- <title>Admin | Dashboard</title> -->
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?=base_url('public')?>/components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?=base_url('public')?>/components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?=base_url('public')?>/components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url('public')?>/dist/css/AdminLTE.min.css">

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<link rel="stylesheet" href="<?=base_url('public')?>/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="<?=base_url('public')?>/plugins/pace/pace.min.css">

<style>
	.fileDiv {
  position: relative;
  overflow: hidden;
}
.upload_attachmentfile {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}
.btnFileOpen {margin-top: -50px; }

.direct-chat-warning .right>.direct-chat-text {
    background: #d2d6de;
    border-color: #d2d6de;
    color: #444;
	text-align: right;
}
.direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
	text-align: right;
}
.spiner{}
.spiner .fa-spin { font-size:24px;}
.attachmentImgCls{ width:450px; margin-left: -25px; cursor:pointer; }
</style>
 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- </?php $this->load->view('templates/dashboard/headerDosenMhs');?> -->

<!-- Left side column. contains the logo and sidebar -->

<!-- </?php $this->load->view('templates/dashboard/sidebarDosenMhs');?> -->

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  
   
  
  <!-- Main content -->
  
  <section class="content">
    <div class="row">
      <!-- <div class="col-md-8" id="chatSection"> -->
      <div class="col-md-8">
        <!-- DIRECT CHAT -->
        <div class="box box-warning direct-chat direct-chat-primary">
          <div class="box-header with-border">
            <h3 class="box-title" id="ReciverName_txt"><?=$chatTitle;?></h3>

            <div class="box-tools pull-right">
              <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
              <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>-->
              <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat"
                      data-widget="chat-pane-toggle">
                <i class="fa fa-comments"></i></button>-->
              <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>-->
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages" id="content">
                <!-- /.direct-chat-msg -->

                <div id="dumppy"></div>

            </div>
            <!--/.direct-chat-messages-->

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <!--<form action="#" method="post">-->
              <div class="input-group">
                <?php
                  $obj=&get_instance();
                  $obj->load->model('User_model');
                  // $profile_url = $obj->User_model->PictureUrl();
                  $user=$obj->User_model->GetUserData();
                ?>
                    	
                <input type="hidden" id="Sender_Name" value="<?=$user['name'];?>">
                <!-- <input type="hidden" id="Sender_ProfilePic" value="</?=$profile_url;?>"> -->
                    	
                <input type="hidden" id="ReciverId_txt">
                <input type="text" name="message" placeholder="Tulis pesan disini ..." class="form-control message">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Kirim</button>
                    <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
                    <input type="file" name="file" class="upload_attachmentfile"/></div>
                </span>
              </div>
              <!--</form>-->
            </div>
            <!-- /.box-footer-->
            </div>
              <!--/.direct-chat -->
            </div>

            <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$strTitle;?></h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?=count($userslist);?> <?=$strsubTitle;?></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  
                    <?php if(!empty($userslist)){
                    foreach($userslist as $u):
                    ?>
                        <li class="selectVendor" id="<?=$u['id'];?>" title="<?=$u['name'];?>">
                          <!-- <img src="</?=$u['picture_url'];?>" alt="</?=$u['name'];?>" title="</?=$u['name'];?>"> -->
                          <a class="users-list-name" href="#"><?=$u['name'];?></a>
                          <!-- <p style="color: green">online</p> -->
                          <p style="color: green"><?=$u['status']?></p>  
                          <!--<span class="users-list-date">Yesterday</span>-->
                        </li>
                    <?php endforeach;?>
                    
                   <?php }else{?>
                   	<li>
                       <a class="users-list-name" href="#">Tidak ada Pengguna</a>
                     </li>
                  	<?php } ?>
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->            
          </div>
    
    <!-- /.row --> 
   
  </section>
  
  <!-- /.content --> 
  
</div>

<!-- /.content-wrapper --> 

<!-- Modal -->
<div class="modal fade" id="myModalImg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img id="modalImgs" src="uploads/attachment/21_preview.png" class="img-thumbnail" alt="Cinque Terre">
        </div>
        
        <!-- Modal footer -->
         
      </div>
    </div>
  </div>
<!-- Modal -->
  
<!-- </?php $this->load->view('templates/dashboard/footer');?> -->
<script src="<?=base_url('public/chat/chat.js');?>"></script> 
 
</body>
</html>