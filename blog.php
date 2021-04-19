<?php
    include 'header.php';
?>
<div class="blog-content">
    <?php
        if(isset($_SESSION['u_id']))
        {
            echo '
                <div class="add-content">
                    <a href="write_blog.php"><div class="add-buton">
                        <i class="fas fa-edit"></i>Scrie articol</div>
                    </a>
                </div>
            ';
        }

        include_once 'includes/dbh.inc.php';
        $sql = "SELECT blog_id, blog_headline, blog_uid, blog_story, timestamp FROM blog ORDER BY blog_id DESC";
        $result = mysqli_query($conn, $sql);
        $ordin = $result->num_rows;
        if($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc())
            {
                $titlu = ''; $user = ''; $body = ''; $time = '';
                if(isset($row['blog_headline'])) $titlu = $row['blog_headline'];
                if(isset($row["blog_uid"])) $user = $row["blog_uid"];
                if(isset($row["timestamp"])) $time = $row["timestamp"];
                if(isset($row["blog_story"])) $body = $row["blog_story"];
                echo "
                    <div class='articol'>
                        <div class = 'art-title'> " . $titlu . "</div>
                        <div class = 'art-author'><div class = 'art-author-logo " . $user . "'></div> <div class = 'art-author-name'>" . $user . "</div>
                        <div class = 'art-time'> ";
                /* Tokenize data information */
                $data = strtok($time, " :-");
                $contor = 0;
                $year = ""; $month = ""; $day = "";
                /*
                1 - Year
                2 - Month
                3 - Day
                */
                while($data != false)
                {
                    $contor++;
                    if($contor == 1) $year = $data;
                    else if($contor == 2) $month = $data;
                    else if($contor == 3) $day = $data;
                    $data = strtok(" :-");
                }    
                
                switch($month)
                {
                    case "01":
                        $month = "Ian";
                        break;
                    case "02":
                        $month = "Feb";
                        break;
                    case "03":
                        $month = "Mar";
                        break;
                    case "04":
                        $month = "Apr";
                        break;
                    case "05":
                        $month = "Mai";
                        break;
                    case "06":
                        $month = "Jun";
                        break;
                    case "07":
                        $month = "Jul";
                        break;
                    case "08":
                        $month = "Aug";
                        break;
                    case "09":
                        $month = "Sep";
                        break;
                    case "10":
                        $month = "Oct";
                        break;
                    case "11":
                        $month = "Nov";
                        break;
                    case "12":
                        $month = "Dec";
                        break;
                }

                echo "posted at " . $month . " " . $day . ", " . $year;

                echo "
                    </div></div>
                    <div class = 'art-photo'>
                    <img src='/mentors/photos/articles/picture". $ordin . ".jpg' class = 'photo'>
                    </div>
                        <div class = 'art-body'>";    
                        
                /* Separate text content */     
                $tok = strtok($body, "\n");
                while($tok != false)
                {
                    echo "<p>" . $tok . "</p>";
                    $tok = strtok("\n");
                }
                echo "</div>
                    </div>
                    <style>
                    .articol .art-author ." . $user . "
                    {
                        width: 30px;
                        height: 30px;
                        background-image: url('/mentors/users/" . $user . "/picture.jpg');
                        background-size: cover;
                        border-radius: 20px;
                    }
                    </style>
                ";
                $ordin = $ordin - 1;
            }
        }
    ?>
</div>
<?php
    include 'footer.php';
?>