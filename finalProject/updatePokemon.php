<?php
session_start();
if (!isset($_SESSION['username'])) { 
    header("Location: adminLogin.php");
    exit;
}
include 'inc/functions.php';
$conn = getDatabaseConnection();

if (isset($_GET['updateForm'])) { 
    updatePokemon();
    header("Location: admin.php");
    exit;
}

if (isset($_GET['goBack'])) { 
    header("Location: admin.php");
    exit;
}


if (isset($_GET['pokemonId'])) {
    $pokemonInfo = getPokemonInfo();  
}



?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update Author's Info </title>
        <meta charset="utf-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    </head>
    <body>
        <h1 id="success"><?=$success?></h1>
        <div class="adminContainer">
            <h1>Update Pokemon <?=$pokemonInfo['name']?></h1>
                <form>
                    <div class="form-group">
                        <label for="name">English Name</label>
                        <input type="text" name="name" class="form-control" value="<?=$pokemonInfo['name']?>" />
                    </div>    
                    <div class="form-group">
                        <label for="jName">Japanese Name</label>
                        <input type="text" name="jName" class="form-control" value="<?=$pokemonInfo['jName']?>" />
                    </div>       
                    <div class="form-group">
                        <label for="dexId">Dex Id</label>
                        <input type="text" name="dexId" class="form-control" value="<?=$pokemonInfo['dexId']?>" />
                    </div>     
                    <div class="form-group">
                        <label for="generation">Generation</label>
                        <select class="form-control" name="generation">
                            <option><?php echo $pokemonInfo['generation']?></option>
                            <option>I</option>
                            <option>II</option>
                            <option>III</option>
                            <option>IV</option>
                            <option>V</option>
                            <option>VI</option>
                            <option>VII</option>
                        </select>
                    </div>     
                    <div class="form-group">
                        <label for="primaryType">Primary Type</label>
                        <select class="form-control" name="primaryType">
                        <option><?php echo $pokemonInfo['PrimaryType']?></option>
                        <?=displayTypes()?>
                        </select>
                    </div>   
                    <div class="form-group">
                        <label for="secondaryType">Secondary Type</label>
                        <select class="form-control" name="secondaryType">
                        <option><?php echo $pokemonInfo['SecondaryType']?></option>
                        <?=displayTypes()?>
                    </select>
                    </div>   
                    <div class="form-group">
                        <label for="image">Image URL</label>
                        <input type="text" name="image" class="form-control" value="<?=$pokemonInfo['image']?>" />
                    </div>   
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea name="notes" class="form-control" rows="5" id="notes"><?=$pokemonInfo['notes']?></textarea>
                    </div>

                    
                    
                    <input type="hidden" name="pokemonId"  value="<?=$pokemonInfo['pokeId']?>" />
                    <input type="hidden" name="primaryId"  value="<?=$pokemonInfo['primaryId']?>" />
                    <input type="hidden" name="secondaryId"  value="<?=$pokemonInfo['secondaryId']?>" />
                    
                    <input type="submit" class="btn btn-primary" value="Update Pokemon" name="updateForm">
                    <input type="submit" class="btn btn-primary" value="Back" name="goBack" style="float:right;"/>

                </form>
            </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
    </body>
</html>