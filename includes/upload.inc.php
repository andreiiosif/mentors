<?php
    session_start();
    $target_dir = $_SERVER['DOCUMENT_ROOT']. '/mentors/users/' . $_SESSION['u_uid'] . '/picture.jpg';
    $imageFileType = strtolower(pathinfo(basename($_FILES["file_upload"]["name"]),PATHINFO_EXTENSION));

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
    {
        header("Location: ../myacc_edit.php?edit=type-error");
        exit();
    }
    if(move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_dir))
    {
        header("Location: ../myacc_edit.php?edit=success");
        exit();
    }
    else 
    {
        header("Location: ../myacc_edit.php?edit=unsuccess");
        exit();
    }
?>