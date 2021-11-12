<?php

    if(isset($_POST['submit'])){
       
    echo "Image Name = " . $_FILES['image']['name'];
    echo "<br>";
    echo "Image Size = " . $_FILES['image']['size'];
    echo "<br>";
    echo "Image Type = " . $_FILES['image']['type'];
    echo "<br>";
    echo "Location = " . $_FILES['image']['tmp_name'];
    echo "<br>";
    echo "Formate = " . pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    echo "<br>";
    echo "<br>";
    $extention = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    $size = $_FILES['image']['size'];
    // $trg = 'image/' . rand(1,99999999).$extention;
    $tmp = $_FILES['image']['tmp_name'];
    // $trg = 'image/' . rand(1,99999999).$_FILES['image']['name'];
    // $trg = 'image/' . rand(1,99999999).time().$_FILES['image']['name'];
    if($extention = "jpg" || $extention = "png" || $extention = "svg" || $extention = "jpeg"){
        $trg = 'image/' . rand(1,99999999).'-'.time().$_FILES['image']['name'];
        if(!file_exists($trg)){
            if($size = 200000){ // 2mb
                $uploade_image = move_uploaded_file($tmp,$trg);
                if($uploade_image){
                echo "Congrats Image uploaded successfully";
                echo "<br>";
                }
            }else{
                echo "file size big";
            }

        }else{
            echo "File already exists";
        }

    }else{
        echo "Invalid File";
    }
    
       
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Uploade</title>
</head>
<body>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="">
        <input type="submit" name="submit" value="Submit">
        <br>
        <hr>
        <img src="<?php echo $trg; ?>" alt="" width="300px">
    </form>
</body>
</html>