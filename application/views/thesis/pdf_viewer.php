<!-- Main Container -->
<main class="akun-container dua content">
    <div class="row akun-helpdesk dua">

        <div class="col-md-8">
            <div class="fik-section-title2">
                <br>
                <span class="fas fa-door-open zzzz"></span>
                <h4>Bimbingan TA</h4>
            </div>
            <div class="card">
                <div class="card-header">
                    <h6>Judul</h6>
                    <div class="box-tools pull-right"></div>
                </div>
                <div class="card-body">
                    <!-- <div class="top-bar">
                        <button class="btn" id="prev-page">  <i class="fas fa-arrow-circle-left"></i> Prev Page </button>
                        <button class="btn" id="next-page"> Next Page <i class="fas fa-arrow-circle-right"></i> </button>
                        <span class="page-info">
                            Halaman <span id="page-num"></span> Dari <span id="page-count"></span>
                        </span>
                    </div>
                    <canvas id='thesis_canvas'></canvas> -->

                    <!-- <embed src="<?= base_url('assets/upload/thesis/'.$file->username.'/'.$pdf_file) ?>" width="700" height="420" type="application/pdf"> -->
                    <embed src="<?= base_url('assets/upload/thesis/'.$username->username.'/'.$pdf_file) ?>" width="700" height="420" type="application/pdf">
                    
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <center><h6>Berikan Koreksi Disini</h6></center>
                    <div class="box-tools pull-right"></div>
                </div>
                <div class="card-body" >
                    <!-- <form action="<?= base_url('thesis')?>" method="post">
                        <input type="text" name="thesis_id" id="thesis_id" value="<?= $thesis_id ?>" hidden >
                        <input type="text" name="pdf_file" id="pdf_file" value="<?= $pdf_file ?>" hidden >
                        <input type="text" name="username" id="username" value="<?= $file->username ?>" hidden >
                        <textarea name="correction" id="correction" class="form-control" cols="30" rows="10"><?= $correction ?></textarea>
                    </form> -->
                    <!-- <p id="content"></p> -->

                    <form action="<?= base_url('thesis/saveCorrection/'.$correction->id.'/'.encrypt_url($lecturers->id_guidance))?>" method="post">
                        <textarea name="correction1" id="correction1" class="form-control" cols="30" rows="10"><?= $correction->correction1 ?></textarea>
                        <textarea name="correction2" id="correction2" class="form-control" cols="30" rows="10"><?= $correction->correction2 ?></textarea>
                    </form>

                </div>
            </div>
        </div>

    </div>
    
</main>

<!-- Tambahan -->
<!-- <script src="assets/js/tambahan.js"></script> -->

<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/q9tneu2aax9fp91cvqlh7mqvx44p6ph4jb63xq6lax2ybita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<input type="text" id="user_id" value="<?= $this->session->userdata('id') ?>" hidden>
<input type="text" id="dosen_pembimbing1" value="<?= $lecturers->dosen_pembimbing1 ?>" hidden>
<input type="text" id="dosen_pembimbing2" value="<?= $lecturers->dosen_pembimbing2 ?>" hidden>
<input type="text" id="dosen_penguji1" value="<?= $lecturers->dosen_penguji1 ?>" hidden>
<input type="text" id="dosen_penguji2" value="<?= $lecturers->dosen_penguji2 ?>" hidden>
<script>

    var user_id = document.getElementById("user_id").value;
    var dosen_pembimbing1 = document.getElementById("dosen_pembimbing1").value;
    var dosen_pembimbing2 = document.getElementById("dosen_pembimbing2").value;

    alert(<?= $this->session->userdata('id') ?>)

    // tinymce.init({
    //     selector: 'textarea',
    //     // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    //     plugins: 'save autosave preview autolink lists media table',
    //     toolbar: 'save restoredraft',
    //     toolbar_mode: 'floating',
    //     tinycomments_mode: 'embedded',
    //     // height: '460',
    //     height: '230',
    //     // readonly : 1
    // });

    if (user_id == dosen_pembimbing1)
    {
        tinymce.init({
            selector: '#correction1',
            // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            plugins: 'save autosave preview autolink lists media table',
            toolbar: 'save restoredraft',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            // height: '460',
            height: '230',
            // readonly : 1
        });
    }
    else if (user_id != dosen_pembimbing1)
    {
        tinymce.init({
            selector: '#correction1',
            // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            plugins: 'save autosave preview autolink lists media table',
            toolbar: 'save restoredraft',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            // height: '460',
            height: '230',
            readonly : 1
        });
    }

    if (user_id == dosen_pembimbing2)
    {
        tinymce.init({
            selector: '#correction2',
            // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            plugins: 'save autosave preview autolink lists media table',
            toolbar: 'save restoredraft',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            // height: '460',
            height: '230',
            // readonly : 1
        });
    }
    else if (user_id != dosen_pembimbing2)
    {
        tinymce.init({
            selector: '#correction2',
            // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            plugins: 'save autosave preview autolink lists media table',
            toolbar: 'save restoredraft',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            // height: '460',
            height: '230',
            readonly : 1
        });
    }
    
</script>

<!-- PDF.js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.4.456/build/pdf.min.js"></script> -->

<!-- <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script> -->
<!-- <script>
    var pdf_file = document.getElementById("pdf_file").value;
    var username = document.getElementById("username").value;
    var thesis_id = document.getElementById("thesis_id").value;

    // console.log(pdf_file + username);
    // console.log("hello world")
    // console.log(thesis_id)
    // alert(correction)

    let url = 'assets/upload/thesis/'+username+'/'+pdf_file;
    // const url = 'assets/upload/thesis/ihdar/1920-2_Kartu_Ujian_UAS_1301174660.pdf'
    // const url = 'uploads/thesis/tatul.pdf';

    let pdfDoc = null,
        pageNum = 1,
        pageIsRendering = false,
        pageNumIsPending = null;

    const scale = 1,
        canvas = document.querySelector('#thesis_canvas'),
        ctx = canvas.getContext('2d');

    // render the page
    const renderPage = num => {
        PageIsRendering = true;

        // get page
        pdfDoc.getPage(num).then(page => {

            // set scale
            const viewport = page.getViewport({ scale });
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            // canvas.width = viewport.width * window.devicePixelRatio;
            // canvas.styles.width = viewport.width + 'px';

            const renderCtx = {
                canvasContext: ctx,
                viewport
            }

            page.render(renderCtx).promise.then(() => {
                pageIsRendering = false;

                if(pageNumIsPending != null) {
                    renderPage(pageNumIsPending);
                    pageIsPending = null;
                }
            });
            
            // output current page
            document.querySelector('#page-num').textContent = num;
        });

        // get correction
        // getCorrection(thesis_id, num);

        // // save correction when clicked
        // document.querySelector('#correction').addEventListener('click', saveCorrection);
        
    };

    // save correction on TinyMCE
    // const saveCorrection = () => {
    //     $('form').submit(function(e) {
    //         e.preventDefault();

    //         // var correction = $("textarea[name='correction']").val();
    //         var correction = $("textarea").val();
    //         var thesis_id = $("#thesis_id").val();

    //         $.ajax({
    //             url: "Thesis/saveCorrection/"+thesis_id+"/"+page,
    //             type: "POST",
    //             data: {thesis_id: thesis_id, correction: correction},
    //             error: function() {
    //                 alert('ada yang salah ketika menyimpan koreksi');
    //             },
    //             success: function(data) {
    //                 // $("textarea").append(data)
    //                 getCorrection(thesis_id, page);
    //             }
    //         })
    //     })
    // }

    // get correction on TinyMCE
    // const getCorrection = (thesis_id, page) => {
    //     $.ajax({
    //         url: 'Thesis/getCorrection/'+thesis_id+'/'+page,
    //         type: "POST",
    //         cache: false,
    //         success: function(data){
    //             $('#correction').html(data);
    //             $('#content').html(data);
    //             alert(data)
    //             // location.reload();
    //         }
    //     })
    // }

    // function ajaxLoad() {
    //     var ed = tinyMCE.get('content');

    //     // Do you ajax call here, window.setTimeout fakes ajax call
    //     ed.setProgressState(1); // Show progress
    //     window.setTimeout(function() {
    //         ed.setProgressState(0); // Hide progress
    //         ed.setContent('HTML content that got passed from server.');
    //     }, 3000);
    // }

    // function ajaxSave() {
    //     var ed = tinyMCE.get('content');

    //     // Do you ajax call here, window.setTimeout fakes ajax call
    //     ed.setProgressState(1); // Show progress
    //     window.setTimeout(function() {
    //         ed.setProgressState(0); // Hide progress
    //         alert(ed.getContent());
    //     }, 3000);
    // }


    // check for pages rendering
    const queueRenderPage = num => {
        if(pageIsRendering) {
            pageNumIsPending = num;
        } else {
            renderPage(num);
        }
    }

    // show prev page
    const showPrevPage = () => {
        if(pageNum <= 1) {
            return;
        }
        pageNum--;
        queueRenderPage(pageNum);
    }

    // show next page
    const showNextPage = () => {
        if(pageNum >= pdfDoc.numPages) {
            return;
        }
        pageNum++;
        queueRenderPage(pageNum);
    }
    
    // get document
    pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
        pdfDoc = pdfDoc_;

        document.querySelector('#page-count').textContent = pdfDoc.numPages;
        renderPage(pageNum);

    });
    
    // button Events
    document.querySelector('#prev-page').addEventListener('click', showPrevPage);
    document.querySelector('#next-page').addEventListener('click', showNextPage);

</script> -->

