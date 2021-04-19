<?php 
    include 'header.php';
?>
<div class = "main-contact">
    <div class = "formula">
        <form class = "contat-form" action = "includes/contact.inc.php" method = "POST">
            <div class = "txt">
                Completează formularul:
            </div>
            <div class = "cell1">
                <div class = "col">
                    <input type="text" name="first" placeholder="Nume">
                </div>
                <div class = "col col2">
                    <input type="text" name="last" placeholder="Prenume">
                </div>
            </div>
            <div class = "cell2">
                <div class = "cl">
                    <input type="text" name="email" placeholder="E-mail">
                </div>
                <?php
                if(isset($_GET["contact"]))
                {
                    if($_GET["contact"] == "email-fail")
                    {
                        echo '
                        <div class ="contact-err">*Nu ai introdus o adresa de e-mail valida!</div>
                        ';
                    }
                }
                ?>
            </div>
            <div class = "cell3">
                <div class = "cl2">
                    <textarea type="text" name="coment" placeholder="Comentariu"></textarea>
                </div>
            </div>
            <?php
            if(isset($_GET["contact"]))
            {
                if($_GET["contact"] == "empty")
                {
                    echo '
                    <div class ="contact-err">*Nu ai completat toate campurile obligatorii!</div>
                    <style>
                    .cell1 input
                    {
                        border: 2px solid #560d7c;;
                    }
                    .cell2 input
                    {
                        border: 2px solid #560d7c;;
                    }
                    </style>
                    ';
                }
            }
            ?>
            <div class = "cell4">
                <button type="submit" name ="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php
    include 'footer.php';
?>