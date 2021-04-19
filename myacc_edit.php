<?php
    include 'header.php';
?>
<div class="main-accedit">
    <div class="myacc-edit">
        <div class="form1">
        <div class = "main-info-acc-photo">
            <div class = "ph">
            <?php
                echo '
                <style>
                .main-info-acc-photo .ph
                {
                    background-image: url("/mentors/users/' .$_SESSION['u_uid']. '/picture.jpg");*/
                }
                </style>'
            ?>
            </div>
        </div>
        <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
        <div class = "titlu">Alege o imagine de profil</div>
        <div class = "insert-bar">
            <input type="file" name="file_upload" id="file_upload">
        </div>
            <?php
            if(isset($_GET["edit"]))
            {
                if($_GET["edit"] == "type-error")
                {
                    echo '<div class="warn-photo" style="color:#560d7c;">*Tipul fisierului nu este suportat!</div>';
                }
                else if($_GET["edit"] == "unsuccess")
                {
                    echo '<div class="warn-photo" style="color:#560d7c;">*Imaginea de profil nu a fost actualizata!</div>';
                }
                else if($_GET["edit"] == "success")
                {
                    echo '<div class="warn-photo" style="color:#4ac4b5;">*Imaginea de profil a fost schimbata cu succes!</div>';
                }
            }
            ?>        
        <div class = "submit-bar">
            <button type="submit" name="submit">Submit</button>
        </div>
        </form>
        </div>
        <div class="form2">
        <form action="includes/update.inc.php" method="post">
        <div class = "titlu">Actualizeaza datele contului</div>
        <div class = "nume">
            <input type="text" name="first" placeholder="Nume">
            <?php
            if(isset($_GET["edit"]))
            {
                if($_GET["edit"] == "invalid-first")
                {
                    echo '<div class="warn" style="color:#560d7c;">*Numele introdus contine caractere invalide!</div>';
                }
                else if($_GET["edit"] == "no-data-first")
                {
                    echo '<div class="warn" style="color:#560d7c;">*Nu ai introdus niciun nume!</div>';
                }
                else if($_GET["edit"] == "success-first")
                {
                    echo '<div class="warn" style="color:#4ac4b5;">*Numele a fost schimbat cu succes!</div>';
                }
            }
            ?>
            <div class = "submit-bar">
            <button type="submit" name="first1">Submit</button>
            </div>
        </div>
        <div class = "prenume">
            <input type="text" name="last" placeholder="Prenume">
            <?php
            if(isset($_GET["edit"]))
            {
                if($_GET["edit"] == "invalid-last")
                {
                    echo '<div class="warn" style="color:#560d7c;">*Prenumele introdus contine caractere invalide!</div>';
                }
                else if($_GET["edit"] == "no-data-last")
                {
                    echo '<div class="warn" style="color:#560d7c;">*Nu ai introdus niciun prenume!</div>';
                }
                else if($_GET["edit"] == "success-last")
                {
                    echo '<div class="warn" style="color:#4ac4b5;">*Prenumele a fost schimbat cu succes!</div>';
                }
            }
            ?>
            <div class = "submit-bar">
            <button type="submit" name="last1">Submit</button>
            </div>
        </div>
        <div class = "email">
            <input type="text" name="email" placeholder="E-mail">
            <?php
            if(isset($_GET["edit"]))
            {
                if($_GET["edit"] == "invalid-email")
                {
                    echo '<div class="warn" style="color:#560d7c;">*Nu ai introdus o adresa de e-mail valida!</div>';
                }
                else if($_GET["edit"] == "success-email")
                {
                    echo '<div class="warn" style="color:#4ac4b5;">*Adresa de e-mail a fost schimbata cu succes!</div>';
                }
            }
            ?>
            <div class = "submit-bar">
            <button type="submit" name="email1">Submit</button>
            </div>
        </div>
        <div class = "password">
            <input type="password" name="new_pass" placeholder="Parola noua">
            <?php
            if(isset($_GET["edit"]))
            {
                if($_GET["edit"] == "no-data-pass")
                {
                    echo '<div class="warn" style="color:#560d7c;">*Nu ai introdus nicio parola!</div>';
                }
                else if($_GET["edit"] == "old-pass")
                {
                    echo '<div class="warn" style="color:#560d7c;">*Ai mai folosit aceasta parola!</div>';
                }
                else if($_GET["edit"] == "success-newpass")
                {
                    echo '<div class="warn" style="color:#4ac4b5;">*Parola a fost schimbata cu succes!</div>';
                }
            }
            ?>
            <div class = "submit-bar">
            <button type="submit" name="new_pass1">Submit</button>
            </div>
        </div>
        </form>
        </div>
    </div>
</div>
<?php
    include 'footer.php';
?>