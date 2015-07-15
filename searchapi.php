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
    //$otherArgs = 'LIMIT 10';

    // connect to the database
    $dbc = new PDO("mysql:host=$hostname;dbname=$db_name;charset=UTF8", $username, $password);
    
    // Use the following line if php version < PHP5.3.6 - http://stackoverflow.com/questions/4361459/php-pdo-charset-set-names
    // $dbc->exec("set names utf8");

    // Set up the query to get the records from the required table

    if ($searchType === 'metiers'){
        $searchColumns = "Intitulé_emploi";
    }

    elseif ($searchType === 'codeROME'){
        $searchColumns = "codeROME";
    }

    else echo "Search Type not Selected";

    $sql = "SELECT * FROM " . $requiredTable . " WHERE " . $searchColumns . " REGEXP '" . $searchTerms . "' " . $otherArgs;
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