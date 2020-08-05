const url = '/uploads/thesis/kartu.pdf';

let pdfDoc = null,
    pageNum = 1,
    pageIsRendering = false,
    pageNumIsPending = null;

const scale = 1.5,
    canvas = document.querySelector('#thesis_canvas'),
    ctx = canvas.getContext('2d');

// render the page
const renderPage = num => {

}

// get document
pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
    pdfDoc = pdfDoc_;
    console.log(pdfDoc);
});