<?php




function displayImages() {
    
    if (isset($_POST['submitForm'])) { //checks whether the form has been submitted
        if($_FILES['myFile']['size'] > 1000000) {
            echo "Too big";
            return;
        } else {
           //print_r($_FILES);
            
           //    echo "File size: "  . $_FILES['myFile']['size'];
            
            move_uploaded_file($_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name'] );
            
            //echo "<img src='gallery/". $_FILES['myFile']['name'] . "'>" ;
            
            
            $files = scandir("gallery/", 1);
            
            
            //print_r($files);
            
            for($i = 0; $i < count($files)-2; $i++){
                echo "<img src='gallery/". $files[$i] . "' width='35px' id='img" . $i . "' onclick='bigImg(" . $i . ")'> <br />" ;
            }
            
        } //endIf

    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lab 10: File Upload </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
        function bigImg(i){
            $("img").css("width", "35px");
            $("#img" + i).css("width", "200px");
        }
        </script>
    </head>
    <body>


    <div class = "main">
        <h1> Photo Gallery </h1>
        <form method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                Upload file: 
                <input type="file" name="myFile"/>
                <input type="submit" name="submitForm" value="Upload!" />
            </div>
        </form>
    
        <br />
    
        <?=displayImages()?>
    </div>


    </body>
    <footer>
        &copy; csumb
    </footer>
</html>