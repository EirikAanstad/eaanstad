<?php

function getDatabaseConnection() {
    $host = 'localhost'; //cloud 9 database
    $dbname = 'pokemon';
    $username = 'root';
    $password = '';
    
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    
    //creates database connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //we'll be able to see some errors with database
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
    
}

$conn = getDatabaseConnection();


function displayPokemon(){
    global $conn;
    $sql = "SELECT pokemonId as pokeId, dexId, name, jName, generation, (SELECT type as PrimaryType   
            FROM p_pokemon
            NATURAL JOIN p_pokemonType
            NATURAL JOIN p_type
            WHERE primaryId = typeId AND pokemonId = pokeId) as PrimaryType, type as SecondaryType
            FROM p_pokemon
            NATURAL JOIN p_pokemonType
            NATURAL JOIN p_type
            WHERE secondaryId = typeId";
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}


function getPokemonInfo() {
    
    global $conn;
        
    $sql = "SELECT pokemonId as pokeId, primaryId, secondaryId, dexId, name, jName, generation, notes, image, (SELECT type as PrimaryType   
            FROM p_pokemon
            NATURAL JOIN p_pokemonType
            NATURAL JOIN p_type
            WHERE primaryId = typeId AND pokemonId = pokeId) as PrimaryType, type as SecondaryType
            FROM p_pokemon
            NATURAL JOIN p_pokemonType
            NATURAL JOIN p_type
            WHERE secondaryId = typeId AND pokemonId = :pokemonId";    
     
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":pokemonId"=>$_GET['pokemonId']));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $record;
}


function getTypes(){
    global $conn;
    $sql = "SELECT type 
            FROM `p_type`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $records;
}

function getTypeId($type){
    
    $pokeTypes = getTypes();
    $counter = 0;
    $types = array();
    
    foreach ($pokeTypes as $poke) {
        $types[$counter] = $poke['type'];
        $counter++;
    }
    for($i = 0; $i < count($types); $i++) {
        if($type == $types[$i]) {
            return $i+1;
        }
    }
    
}

function addPokemon() {
    global $conn;
    
    $sql = "INSERT INTO p_pokemon
        (`pokemonId`, `dexId`, `name`, `jName`, `generation`, `notes`, `image`)
        VALUES 
        (NULL, :dexId, :name, :jName, :generation, :notes, :image)";
    $np = array();
    $np[":dexId"] = $_GET['dexId'];
    $np[":name"]  = $_GET['name'];
    $np[":jName"]  = $_GET['jName'];
    $np[":generation"]  = $_GET['generation'];
    $np[":notes"]  = $_GET['notes'];
    $np[":image"]  = $_GET['image'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    
    
    
    
    $sql = "INSERT INTO p_pokemonType
    (`pokemontypeId`, `pokemonId`, `primaryId`, `secondaryId`)
    VALUES 
    (NULL, :pokemonId, :primaryId, :secondaryId)";
    $np = array();
    $np[":pokemonId"]  = $conn->lastInsertId();
    $np[":primaryId"]  = getTypeId($_GET['primaryType']);
    $np[":secondaryId"]  = getTypeId($_GET['secondaryType']);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);

    echo "pokemon added!";
}

function displayTypes(){
    $records = getTypes();
    foreach ($records as $record) {
    echo "<option " ;
    echo ">" . $record['type'] . "</option>";
    }
    

}

function updatePokemon(){
    global $conn;
    $sql = "UPDATE p_pokemon 
            SET 
	        dexId = :dexId,
	        name = :name,
	        jName = :jName,
	        generation = :generation,
	        notes = :notes,
	        image = :image
	        WHERE pokemonId = :pokemonId";
	        
            
    $namedParameters = array();
    $namedParameters[':dexId'] = $_GET['dexId'];
    $namedParameters[':name'] = $_GET['name'];
    $namedParameters[':jName'] = $_GET['jName'];
    $namedParameters[':generation'] = $_GET['generation'];
    $namedParameters[':notes'] = $_GET['notes'];
    $namedParameters[':image'] = $_GET['image'];
    $namedParameters[':pokemonId'] = $_GET['pokemonId'];
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    $sql = "UPDATE p_pokemonType SET 
	        primaryId = :primaryId,
	        secondaryId = :secondaryId
	        WHERE pokemonId = :pokemonId";
	        
            
    $namedParameters = array();
    $namedParameters[':primaryId'] = $_GET['primaryId'];
    $namedParameters[':secondaryId'] = $_GET['secondaryId'];
    $namedParameters[':pokemonId'] = $_GET['pokemonId'];

    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
}

?>