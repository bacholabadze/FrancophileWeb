<?php
if (isset($_POST['submit'])){
    $file=$_FILES['file'];
    
    $filename = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
   
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf' );
    if(in_array($fileActualExt, $allowed)){
        if($fileError===0){
            if($fileSize<50000000){
                $fileNameNew=uniqid('', true).".".$fileActualExt;
                $fileDestination='uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                header("Location: uploadPage.php?uploadsuccess");

            }else{
                echo"your file is too big";
            }

        }else{
            echo"there was an error";
        }

    } else{
        echo"you cannot upload file of this type";
    }
}