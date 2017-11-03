<?php
session_start();

if (!isset($_SESSION['username'])) { 
    
    header("Location: index.php");
    exit;
    
}

include '../../dbConnection.php';
$conn = getDatabaseConnection();

function getAuthorInfo() {
    
    global $conn;
        
    $sql = "SELECT *
            FROM q_author
            WHERE authorId = " . $_GET['authorId'];    
     
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $record;
}

if (isset($_GET['updateForm'])) { 
   
    $sql = "UPDATE q_author SET 
	        firstName = :fName,
	        lastName = :lName,
	        gender = :gender,
	        dob = :dob,
	        dod = :dod,
	        profession = :profession,
	        country = :country,
	        picture = :picture,
	        biography = :biography
            WHERE authorId = :authorId";
            
    $namedParameters = array();
    $namedParameters[':fName'] = $_GET['firstName'];
    $namedParameters[':lName'] = $_GET['lastName'];
    $namedParameters[':gender'] = $_GET['gender'];
    $namedParameters[':dob'] = $_GET['dob'];
    $namedParameters[':dod'] = $_GET['dod'];
    $namedParameters[':profession'] = $_GET['profession'];
    $namedParameters[':country'] = $_GET['country'];
    $namedParameters[':picture'] = $_GET['picture'];
    $namedParameters[':biography'] = $_GET['biography'];
    $namedParameters[':authorId'] = $_GET['authorId'];

    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "Sucess!";
    
}


if (isset($_GET['authorId'])) {
    $authorInfo = getAuthorInfo();  
}




?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update Author's Info </title>
    </head>
    <body>

        <h1> Updating Author's Info </h1>
        
        <fieldset>
            
            <legend> Updating Author </legend>
            
            <form>
                
                
                 <input type="hidden" name="authorId" value="<?=$authorInfo['authorId']?>">
                First Name: <input type="text" name="firstName" value="<?=$authorInfo['firstName']?>" /> <br />
                Last Name: <input type="text" name="lastName" value="<?=$authorInfo['lastName']?>"/> <br />
                Gender: <input type="radio" name="gender" value="F"
                            id="genderF"  
                            
                            <?php
                            
                                if ($authorInfo['gender']=="F") {
                                    echo "checked";
                                }
                            
                            ?>
                            
                            />
                            
                            
                            <label for="genderF"></label>Female
                         <input type="radio" name="gender" value="M"
                         
                            <?= ($authorInfo['gender']=="M")?"checked":"" ?>
                         
                            id="genderM"   /><label for="genderF"></label>Male <br />   
                Birth Date: <input type="date" name="dob" value="<?=$authorInfo['dob']?>"/><br /> 
                Death Date: <input type="date" name="dod" value="<?=$authorInfo['dod']?>"/><br /> 
                Profession: <input type="text" name="profession" value="<?=$authorInfo['profession']?>"/><br /> 
                Country: <select name="country">
                            <option>USA</option>
                            <option>Germany</option>
                            <option>China</option>
                            <option>India</option>
                        </select><br /> 
                Picture URL: <input type="text" name="picture"  value="<?=$authorInfo['picture']?>" />   <br>
                Biography: <br /> <textarea name="biography" cols="55" rows="5"><?=$authorInfo['biography']?></textarea><br>
                <input type="submit" value="Update Author" name="updateForm">
            </form>
            <form action="admin.php">
                <input type="submit" value="Back" />
            </form>
            
        </fieldset>
        
    </body>
</html>