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
    getCorrection(thesis_id, num);

    // // save correction when clicked
    // document.querySelector('#correction').addEventListener('click', saveCorrection);
    
};

// save correction on TinyMCE
const saveCorrection = () => {
    $('form').submit(function(e) {
        e.preventDefault();

        // var correction = $("textarea[name='correction']").val();
        var correction = $("textarea").val();
        var thesis_id = $("#thesis_id").val();

        $.ajax({
            url: "Thesis/saveCorrection/"+thesis_id+"/"+page,
            type: "POST",
            data: {thesis_id: thesis_id, correction: correction},
            error: function() {
                alert('ada yang salah ketika menyimpan koreksi');
            },
            success: function(data) {
                // $("textarea").append(data)
                getCorrection(thesis_id, page);
            }
        })
    })
}

// get correction on TinyMCE
const getCorrection = (thesis_id, page) => {
    $.ajax({
        url: 'Thesis/getCorrection/'+thesis_id+'/'+page,
        type: "POST",
        cache: false,
        success: function(data){
            $('#correction').html(data);
            $('#content').html(data);
            alert(data)
            // location.reload();
        }
    })
}

function ajaxLoad() {
    var ed = tinyMCE.get('content');

    // Do you ajax call here, window.setTimeout fakes ajax call
    ed.setProgressState(1); // Show progress
    window.setTimeout(function() {
        ed.setProgressState(0); // Hide progress
        ed.setContent('HTML content that got passed from server.');
    }, 3000);
}

function ajaxSave() {
    var ed = tinyMCE.get('content');

    // Do you ajax call here, window.setTimeout fakes ajax call
    ed.setProgressState(1); // Show progress
    window.setTimeout(function() {
        ed.setProgressState(0); // Hide progress
        alert(ed.getContent());
    }, 3000);
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
    renderPage(pageNum);

});

// button Events
document.querySelector('#prev-page').addEventListener('click', showPrevPage);
document.querySelector('#next-page').addEventListener('click', showNextPage);