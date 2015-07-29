<?php
    // Set correct character encoding
    mb_internal_encoding("utf-8");
    header("Content-Type: application/json; charset=UTF-8");

    // set up the connection variables
    $db_name  = 'stgsear1_niceunidemo';
    $hostname = 'localhost';
    $username = 'stgsear1_niceuni';
    $password = 'un1c3';
    $requiredTable = 'alldata';
    $searchType = $_GET['type'];
    $searchTerms = $_GET['search'];
    // Ignore results that don't have a CodeROME entry
    $ignoreEmpty = '';
    $searchColumns = "";
    $requiredColumns = "";
    $groupBy = "";

    // connect to the database
    $dbc = new PDO("mysql:host=$hostname;dbname=$db_name;charset=UTF8", $username, $password);
    
    // Use the following line if php version < PHP5.3.6 - http://stackoverflow.com/questions/4361459/php-pdo-charset-set-names
    // $dbc->exec("set names utf8");

    // Set up the query to get the records from the required table

    if ($searchType === 'metiers'){
        $requiredColumns = "ROME_niveau_1_lib, ROME_niveau_2_lib, Intitulé_ROME, CodeROME";
        $searchColumns = "Intitulé_emploi, Intitulé_ROME";
        $groupBy = "CodeROME";
        $ignoreEmpty = "CodeROME != ''";
    }

    elseif ($searchType === 'diplome'){
        $requiredColumns = "Filière_diplôme, Spécialité_diplôme, Mention_diplôme, Code_diplôme";
        $searchColumns = "Spécialité_diplôme, Mention_diplôme, Filière_diplôme";
        $groupBy = "Spécialité_diplôme";
        $ignoreEmpty = "Spécialité_diplôme != ''";
    }

    elseif ($searchType === 'codeROME'){
        $requiredColumns = "*";
        $searchColumns = "codeROME";
        $ignoreEmpty = "ID != ''"; // nullifys the AND statement
        $groupBy = 'ID'; // nullifys the GROUP BY statement
    }

    elseif ($searchType === 'codeDiplome'){
        $requiredColumns = "*";
        $searchColumns = "Code_diplôme";
        $ignoreEmpty = "ID != ''"; // nullifys the AND statement
        $groupBy = 'ID'; // nullifys the GROUP BY statement
    }

    else echo "Search Type not Selected";

    $sql =  " SELECT " .$requiredColumns .
            " FROM " .$requiredTable .
            " WHERE CONCAT(" .$searchColumns .")
             REGEXP '" .$searchTerms ."'
             AND " .$ignoreEmpty. 
             " GROUP BY " .$groupBy;

    // echo $sql;
    // use prepared statements, even if not strictly required is good practice
    $stmt = $dbc->prepare( $sql );

    // execute the query
    $stmt->execute();

    // fetch the results into an array
    $results = $stmt->fetchAll( PDO::FETCH_ASSOC );
    
    // Convert to json
    $json = json_encode($results);    

    // echo the json string
    echo $json;

    // Debugging
    // echo '<pre>'; print_r($results); echo '</pre>';
    // var_dump($json);
?>