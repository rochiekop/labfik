<!-- Main Container -->
<main class="akun-container dua">
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

            <?php if (!empty($userslist)){
              foreach($userslist as $u): ?>
                <li class="selectVendor" id="<?=$u['id']?>" title="<?=$u['name']?>">
                  <div class="img-wrapper"><img src="<?=$u['picture_url']?>" alt="<?=$u['name']?>" title="<?=$u['name']?>"></div>
                  <span><a class="users-list-name" href="#"><?=$u['name']?></a></span>
                  <div class="badge badge-success badge-pill"><?=$u['status']?></div>
                </li>
              <?php endforeach; ?>

              <?php } else { ?>
                <li>
                  <a href="" class="selectVendor">Tidak ada Pengguna</a>
                </li>
              <?php } ?>

            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div id="chatSection" class="card">
          <div class="direct-chat direct-chat-primary">
            <div class="card-header with-border">
              <h5 id="ReciverName_txt"><?=$chatTitle?></h5>
              <div class="box-tools pull-right">
                <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat" data-widget="chat-pane-toggle"><i class="fas fa-trash-alt"></i></button> -->
              </div>
            </div>
            <div class="chat-container">
              <div class="direct-chat-messages">
                <div id="dumppy">
                  <!-- <div class="alert alert-info">
                    Silakan pilih admin yang ingin kamu hubungi
                  </div> -->
                </div>
              </div>
            </div>
            <div class="card-footer">
              <input type="hidden" id="Sender_Name" value="Client 1 xyz">
              <input type="hidden" id="Sender_ProfilePic" value="http://dresscode.my.id/helpdesk/uploads/profiles/1.png">
              <input type="hidden" id="ReciverId_txt" value="VUY0dEN3Q2pRazZ2U0FJb1lnSW1QQT09">
              <div class="input-group">
                <div class="fileDiv btn">
                  <input type="file" name="file" class="upload_attachmentfile" disabled="disabled">
                </div>
                <input type="text" name="message" placeholder="Tulis pesan disini ..." class="form-control message" disabled="disabled">
                <button type="button" class="btn btnSend" id="nav_down" disabled="disabled"><span class="fas fa-paper-plane"></span></button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  <!-- End Main Container -->

  <script src="<?=base_url('public/chat/chat.js');?>"></script> 

  <script src="_assets/tambahan.js"></script>
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