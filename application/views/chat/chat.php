<!-- Main Container -->
<main class="akun-container dua content">
    <div class="row akun-helpdesk dua">

      <div class="col-md-4">
        <div class="fik-section-title2">
          <span class="fas fa-life-ring"></span>
          <h4>Helpdesk</h4>
        </div>
        <div class="card">
          <div class="card-header">
            <h6><?= $strTitle ?> (<?=count($userslist)?>)</h6>
            <div class="box-tools pull-right">
            </div>
          </div>
          <div class="card-body">
            <ul class="users-list list-none clearfix">
            <center>
            <?php if (!empty($userslist)){
              foreach($userslist as $u): ?>
              
                <li class="selectVendor" id="<?=$u['id']?>" title="<?=$u['name']?>">
                  <div class="img-wrapper"><img src="<?=$u['images']?>" alt="<?=$u['name']?>" title="<?=$u['name']?>"></div>
                  <span><a class="users-list-name" href="#"><?=$u['name']?></a></span>
                  <div class="badge badge-primary badge-pill"><?=$u['status']?></div>
                  <div class="badge badge-success badge-pill">1</div>
                </li>
              <?php endforeach; ?>

              <?php } else { ?>
                <li>
                  <a href="" class="selectVendor">Tidak ada Pengguna</a>
                </li>
              <?php } ?>
            </center>

            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div id="chatSection" class="card">
          <div class="direct-chat direct-chat-primary">
            <div class="card-header with-border">
              <!-- <div class="img-wrapper"><img id="ReciverImg"></div> -->
              <h5 id="ReciverName_txt"><?=$chatTitle?></h5>
              <div class="box-tools pull-right">
                <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat" data-widget="chat-pane-toggle"><i class="fas fa-trash-alt"></i></button> -->
              </div>
            </div>
            <div class="chat-container" id="content">
              <div class="direct-chat-messages" id="content">
                <div id="dumppy"></div>
              </div>
            </div>
            <div class="card-footer">
              
              <?php 
                $obj = &get_instance();
                $obj->load->model('User_model');
                $images = $obj->User_model->Images();
                $user = $obj->User_model->GetUserData();
              ?>

              <input type="hidden" id="Sender_Name" value="<?=$user['name']?>">
              <input type="hidden" id="Sender_ProfilePic" value="<?=$images?>">
              <input type="hidden" id="ReciverId_txt">
              <div class="input-group">
                <div class="fileDiv btn">
                  <input type="file" name="file" class="upload_attachmentfile" >
                </div>
                <input type="text" name="message" placeholder="Tulis pesan disini ..." class="form-control message" >
                <button type="button" class="btn btnSend" id="nav_down" ><span class="fas fa-paper-plane"></span></button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  <!-- End Main Container -->

  <script src="<?=base_url('public/chat/chat.js');?>"></script> 

  <!-- <script src="assets/tambahan.js"></script> -->
  <script>
    $('.fik-carousel-info').owlCarousel({
      margin: 0,
      loop: true,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      items: 1
    });
    $('.fik-lab-div-list').owlCarousel({
      margin: 0,
      loop: false,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      nav: true,
      navText: ["<span class='fas fa-arrow-left'>", "<span class='fas fa-arrow-right'>"],
      dots: false,
      items: 4
    });
  </script>