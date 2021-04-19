<?php
    include 'header.php';
?>
<div class = "main-container">
    <div class = "main-time"></div>
</div>

<div class = "main-wrapper">
    <?php
        include_once 'includes/dbh.inc.php';
        $sql = "SELECT blog_id, blog_headline, blog_uid, blog_story, timestamp FROM blog ORDER BY blog_id DESC";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows > 0) 
        {
            // output data of each row
            $aux = 1;
            while(($row = $result->fetch_assoc()) && $aux < 4)
            {
                $aux = $aux + 1;
                $titlu = ''; $user = ''; $body = ''; $time = '';
                if(isset($row['blog_headline'])) $titlu = $row['blog_headline'];
                if(isset($row["blog_uid"])) $user = $row["blog_uid"];
                if(isset($row["timestamp"])) $time = $row["timestamp"];
                if(isset($row["blog_story"])) $body = $row["blog_story"];
                echo 
                "
                <div class = 'column'>
                    <div class = 'articol'>
                        <div class = 'titlu'> " . $titlu . "</div>\
                        <div class = 'log1'><div class = 'im'></div></div>
                    </div>
                </div>

                <style>
                .column .articol .titlu
                {
                    font-size: 25px;
                    font-family: Times New Roman;
                    height: 30%;
                    text-align: center;
                }
                .column .articol .log1
                {
                    height: 70%;
                    width: 100%;
                    margin-bottom: 10px;
                }
                .log1 .im
                {
                    background-image: url('photos/logos/think_icon.png');
                    background-repeat: no-repeat;
                    background-size: contain;
                    width: 150px;                    
                    height: 150px;
                    margin: auto;
                }
                </style>
                ";
            }
            while($aux < 4)
            {
                $aux = $aux + 1;
                echo 
                "
                <div class = 'column'>
                    <div class = 'articol'>
                        <div class = 'titlu'>In curand...</div>
                        <div class = 'log'><div class = 'im'></div></div>
                    </div>
                </div>

                <style>
                .column .articol .titlu
                {
                    font-size: 25px;
                    font-family: Times New Roman;
                    height: 30%;
                    margin-top: 10px;
                    text-align: center;
                }
                .column .articol .log
                {
                    height: 70%;
                    width: 100%;
                    margin-bottom: 10px;
                }
                .log .im
                {
                    background-image: url('photos/logos/load_icon.jpg');
                    background-repeat: no-repeat;
                    background-size: contain;
                    width: 150px;                    
                    height: 150px;
                    margin: auto;
                }
                </style>
                ";
            }
        }
    ?>
</div>
<?php
    include 'footer.php';
?>