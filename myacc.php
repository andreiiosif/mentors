<?php
    include 'header.php';
?>
<div class = "main-acc">
    <div class = "main-info">
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
        <div class = "main-info-id">
            <?php
            echo '<div class = "id-text">' . $_SESSION['u_uid'] . ' </div> ';
            ?>
        </div>
        <div class = "main-info-name">
            <span class = "id">Nume:</span> <?php echo $_SESSION['u_first'] . ' ' . $_SESSION['u_last']; ?>
        </div>
        <div class = "main-info-email">
            <span class = "id">Email:</span> <?php echo $_SESSION['u_email']; ?>
        </div>
        <div class = "main-info-rank">
            <span class = "id">Rank:</span> Admin <?php echo $_SESSION['u_adm_lvl']; ?>
        </div>
        <div class = "main-info-acc-edit">
            <div class = "logo"><a href="myacc_edit.php"><i class="fas fa-user-edit fa-2x"></i></a></div>
        </div>
        <div class ="log-out">
            <div class = "butt">
                <form action = "includes/logout.inc.php" method = "POST">
                <button type = "submit" name = "submit" class="lastb">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    include 'footer.php';
?>