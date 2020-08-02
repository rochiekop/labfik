<!-- Main Container -->
<main class="akun-container">
    <div class="fik-section-title2">
        <span class="fas fa-door-open zzzz"></span>
        <h5>Bimbingan TA</h5>
    </div>
    
    <canvas id='thesis_canvas'></canvas>
    <script>
        pdfjsLib.getDocument('').then(doc => {
            console.log('pdf ini memiliki' + doc._pdfInfo.numPages + " halaman");

            doc.getPage(1).then(page => {
                var thesisCanvas = document.getElementById("thesis_canvas");
                var context = thesisCanvas.getContext('2d');

                var viewport = page.getViewport(1);
                thesisCanvas.width = viewport.width;
                thesisCanvas.height = viewport.height;

                page.render({
                    canvasContext: context,
                    viewport: viewport
                });
            })
        });
    </script>
    
</main>

<!-- PDF.js -->
<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2/build/pdf.min.js"></script>