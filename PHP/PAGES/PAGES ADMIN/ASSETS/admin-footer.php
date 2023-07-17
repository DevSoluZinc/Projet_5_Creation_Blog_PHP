<footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES BLOG\index.php" target="_blank" class="text-muted"><strong>BlogPost</strong></a>
                                &copy;
                            </p>
                        </div>

                    </div>
                </div>
            </footer>
 </div>
    </div>
    <script src="\Projet_5_Creation_Blog_PHP_V2\PHP\PUBLIC\JS\admin.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var editor = new Quill("#quill-editor", {
                modules: {
                    toolbar: "#quill-toolbar"
                },
                placeholder: "Type something",
                theme: "snow"
            });
            var bubbleEditor = new Quill("#quill-bubble-editor", {
                placeholder: "Compose an epic...",
                modules: {
                    toolbar: "#quill-bubble-toolbar"
                },
                theme: "bubble"
            });
        });
    </script>
</body>
</html>