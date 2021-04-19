<?php
    include 'header.php';
?>
<div class="blog-edit">
<form class = "contat-form" action = "includes/blog.inc.php" method = "POST" enctype="multipart/form-data">
    <div class = "art-headline">
        <input type="text" name="headline" placeholder="Titlu">
    </div>
    <div class = "art-content">
        <textarea id="corp" type="text" name="content" placeholder="Scrie ceva...">
        </textarea>
    </div>
    <div class = "titlu">Alege o imagine pentru articol</div>
        <div class = "insert-bar">
        <input type="file" name="file_blog_upload" id="file_blog_upload">
    </div>
    <!-- continut pentru testare imagine -->
            <?php
            if(isset($_GET["edit"]))
            {
                if($_GET["edit"] == "type-error")
                {
                    echo '<div class="warn-photo" style="color:#560d7c;">*Tipul fisierului nu este suportat!</div>';
                }
                else if($_GET["edit"] == "unsuccess")
                {
                    echo '<div class="warn-photo" style="color:#560d7c;">*Imaginea nu a incarcata!</div>';
                }
                else if($_GET["edit"] == "success")
                {
                    echo '<div class="warn-photo" style="color:#4ac4b5;">*Articolul a fost incarcat cu succes!</div>';
                }
            }
            ?>
    <div class = "art-button">
        <button type="submit" name ="submit">Posteaza</button>
    </div>
    <script>
        autosize(document.getElementById('corp'));
        document.getElementById('corp').addEventListener('keydown', function(e) {
        if (e.key == 'Tab') {
            e.preventDefault();
            var start = this.selectionStart;
            var end = this.selectionEnd;

            // set textarea value to: text before caret + tab + text after caret
            this.value = this.value.substring(0, start) +
            "\t" + this.value.substring(end);

            // put caret at right position again
            this.selectionStart =
            this.selectionEnd = start + 1;
        }
        });
    </script>
</form>
</div>
<?php
    include 'footer.php';
?>