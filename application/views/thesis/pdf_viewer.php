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
                    <div class="top-bar">
                        <button class="btn" id="prev-page">  <i class="fas fa-arrow-circle-left"></i> Prev Page </button>
                        <button class="btn" id="next-page"> Next Page <i class="fas fa-arrow-circle-right"></i> </button>
                        <span class="page-info">
                            Halaman <span id="page-num"></span> Dari <span id="page-count"></span>
                        </span>
                    </div>
            
                    <!-- <input type="text" id="revision_id" value="<?= $correction->revision_id ?>" hidden > -->
                    <!-- <input type="text" id="pdf_file" value="<?= $correction->pdf_file ?>" hidden> -->
                    <canvas id='thesis_canvas'></canvas>
                    
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
                    <form action="" method="post">
                        <!-- <input type="text"> -->
                        <!-- <textarea name="thesis" id="textarea" cols="30" rows="10"></?= $correction->textarea_file ?></textarea> -->
                        <textarea name="correction" id="correction" cols="30" rows="10"></textarea>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
</main>

<!-- Tambahan -->
<script src="/assets/js/tambahan.js"></script>

<!-- PDF.js -->
<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2/build/pdf.min.js"></script>

<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/q9tneu2aax9fp91cvqlh7mqvx44p6ph4jb63xq6lax2ybita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea',
        // plugins: 'save preview paste a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        plugins: 'save autosave preview a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'save restoredraft checklist',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: '<?= $this->session->userdata('username') ?>',
        height: '460'
    });
</script>

<script>
    var pdf_file = document.getElementById("pdf_file").value;
    const url = 'uploads/thesis/'+pdf_file;
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

        // make correction
        // alert(num);
        var revision_id = document.getElementById("revision_id").value;
        if (checkCorrectionEmpty() == true)
        {
            makeCorrection(uniqid(), num);
        }
        getCorrection(revision_id, num);
        
    }

    // make correction on TinyMCE
    const makeCorrection = (revision_id, page) => {
        $.ajax({
            url: "Thesis/makeCorrection"+revision_id+"/"+page,
            type: "POST",
            cache: false,
            success: function(data){

            }
        })
    }

    // save correction on TinyMCE
    const saveCorrection = (revision_id, page) => {
        $.ajax({
            url: "Thesis/saveCorrection"+revision_id+"/"+page,
            type: "POST",
            cache: false,
            success: function(data){

            }
        })
    }

    // get correction on TinyMCE
    const getCorrection = (revision_id, page) => {
        $.ajax({
            url: 'Thesis/getCorrection/'+revision_id+'/'+page,
            type: "POST",
            cache: false,
            success: function(data){
                // alert(data);
                $('#correction').html(data);
            }
        })
    }

    // check correction empty
    const checkCorrectionEmpty = (revision_id, page) => {
        $.ajax({
            url: 'Thesis/checkCorrectionEmpty/'+revision_id+'/'+page,
            type: "POST",
            cache: false,
            success: function(data){
                
            }
        })
    }

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
        renderPage(pageNum)

    });

    // button Events
    document.querySelector('#prev-page').addEventListener('click', showPrevPage);
    document.querySelector('#next-page').addEventListener('click', showNextPage);

    document.querySelector('#correction').addEventListener('click', saveCorrection);

</script>



