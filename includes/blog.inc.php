<?php
    session_start();

    include_once 'dbh.inc.php';

    // Check for number of entries
	$sql = "SELECT * FROM blog";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
    
    $target_dir = $_SERVER['DOCUMENT_ROOT']. '/mentors/photos/articles/picture' . $resultCheck + 1 . '.jpg';
    $imageFileType = strtolower(pathinfo(basename($_FILES["file_blog_upload"]["name"]),PATHINFO_EXTENSION));

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
    {
        header("Location: ../write_blog.php?edit=type-error");
        exit();
    }
    if(!move_uploaded_file($_FILES["file_blog_upload"]["tmp_name"], $target_dir))
    {
        header("Location: ../write_blog.php?edit=unsuccess");
        exit();
    }

    if (isset($_POST['submit'])) 
    {

        $title = mysqli_real_escape_string($conn, $_POST['headline']);
        $body = mysqli_real_escape_string($conn, $_POST['content']);
        $user = $_SESSION['u_uid'];
        $datetime = date_create()->format('Y-m-d H:i:s');

        $sql = "INSERT INTO blog (blog_headline, blog_story, blog_uid, timestamp) VALUES ('$title', '$body', '$user', '$datetime');";
        mysqli_query($conn, $sql);
        
        header("Location: ../blog.php");
        exit();
    }
?>