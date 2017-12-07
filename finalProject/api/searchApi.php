<?php

include '../../pokemonDbConn.php';
$conn = getDatabaseConnection();


if (empty($_GET['name'])) {
        
     $sql = "SELECT pokemonId as pokeId, dexId, name, jName, generation, notes, image, (SELECT type as PrimaryType   
        FROM p_pokemon
        NATURAL JOIN p_pokemonType
        NATURAL JOIN p_type
        WHERE primaryId = typeId AND pokemonId = pokeId) as PrimaryType, type as SecondaryType
        FROM p_pokemon
        NATURAL JOIN p_pokemonType
        NATURAL JOIN p_type
        WHERE secondaryId = typeId";
        
        if ($_GET['sort'] = 'sortByName') {
                $sql .= " ORDER BY name";
        } elseif ($_GET['sort'] = 'sortByDex') {
                $sql .= " ORDER BY dexId";
        }
        
        $stmt = $conn -> prepare ($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        
//print_r($records);
echo json_encode($records);   
        
} else {


$name = "%" . $_GET['name'] . "%";

$sql = "SELECT pokemonId as pokeId, dexId, name, jName, generation, notes, image, (SELECT type as PrimaryType   
        FROM p_pokemon
        NATURAL JOIN p_pokemonType
        NATURAL JOIN p_type
        WHERE primaryId = typeId AND pokemonId = pokeId) as PrimaryType, type as SecondaryType
        FROM p_pokemon
        NATURAL JOIN p_pokemonType
        NATURAL JOIN p_type
        WHERE secondaryId = typeId AND name LIKE :name";
        
        if ($_GET['sort'] == 'sortByName') {
                $sql .= " ORDER BY name";
        } elseif ($_GET['sort'] == 'sortByDex') {
                $sql .= " ORDER BY dexId";
        }
        
$stmt = $conn -> prepare ($sql);
$stmt -> execute(array(":name"=>$name));
$records = $stmt -> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);
}

?>