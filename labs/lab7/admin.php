<?php
session_start();

if (!isset($_SESSION['username'])) { 
    
    header("Location: index.php"); 
    exit;
    
}

function authorList(){
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    $sql = "SELECT *
            FROM q_author
            ORDER BY lastName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section  </title>
        
        <script>

            function confirmDelete() {
                
                return confirm("Are you sure you want to delete this author?");
                
                
            }            
            
        </script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body class = "adminBody">
    <br ><br >

        <h1> ADMIN SECTION</h1>
        <h2> Welcome <?=$_SESSION[adminFullName]?>!</h2>    
        <?php 
        
        $authors =authorList();
        
        foreach($authors as $author) {
            echo "<div class = 'main'>";
            echo "[<a href='updateAuthor.php?authorId=".$author['authorId']."'>Update</a>] ";
            echo "<form style='display:inline' action='deleteAuthor.php' onsubmit='return confirmDelete()'>
                        <input type='hidden' name='authorId' value='".$author['authorId']."'>
                        <input type='submit' value='Delete'>
                  </form>";
            
            echo $author['firstName'] . "  " . $author['lastName'] . " " . $author['country'] . "<br>";
            echo "</div>";
        }
        
        
        ?>
        <div class = "bottomButtons">
            <form action="addAuthor.php">
                <input type="submit" value="Add New Author" />
            </form>
            <form action="logout.php">
                <input type="submit" value="Logout" />
            </form> 
        </div>
    </body>
</html>