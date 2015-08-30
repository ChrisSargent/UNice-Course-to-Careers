<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of parse_files
 *
 */
//print_r($_SERVER);    
//header('Content-Type: text/html; charset=utf-8');

include_once $_SERVER['DOCUMENT_ROOT'] . '/french/app-code/settings.php';

class parse_files {

    private $Settings;

    public function __construct() {
		
        $this->Settings = new settings();
    }

    public function parseSurvey() {
				echo  "inside table";
        set_time_limit(0);
        $filecontent = fopen("../resources/surveys.csv", "r");
        $Query = <<<HTML
                INSERT INTO survey values 
                (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
                
HTML;
        $Index = 0;

        while (($FileParsedContent = fgetcsv($filecontent) ) !== FALSE) {
            $Index++;
            $MyPrepare = $this->Settings->DB->prepare($Query);
            if ($Index > 1) {
                $Param = array();
                foreach($FileParsedContent as $Val){
                    $Param[] = utf8_encode($Val);
                }
                $ExecuteResult = $MyPrepare->execute($Param);
            }
        }
        echo $Index;
        set_time_limit(30);
    }

    public function parseDegreeInfo() {
        set_time_limit(0);
        $filecontent = fopen("../resources/degrees_info.csv", "r");
        $Query = <<<HTML
                INSERT INTO degree_info set
   Diplome_code = ?,
Annee_de_liinscription = ?,
Version_diplome_code = ?,
Diplome_SISE_code = ?,
Diplome_SISE_type = ?,
Diplome_SISE_intitule_1_lib = ?,
Diplome_SISE_intitule_2_lib = ?,
Diplome_intermediaire_SISE_code = ?,
Diplome_intermediaire_SISE_lib = ?
                
HTML;
        $Index = 0;
        while (($FileParsedContent = fgetcsv($filecontent) ) !== FALSE) {
            $Index++;

//            print_r($FileParsedContent);exit;
            $MyPrepare = $this->Settings->DB->prepare($Query);
            if ($Index > 1) {
//                print_r($FileParsedContent);
//                str_ireplace("", " ",$FileParsedContent)
                $Param = array();
                foreach($FileParsedContent as $Val){
                    $Param[] = utf8_encode($Val);
                }
                $ExecuteResult = $MyPrepare->execute($Param);
            }
        }
        echo $Index;
        set_time_limit(30);
    }

    public function parseKeyword() {
        set_time_limit(0);
        $filecontent = fopen("../resources/key_words.csv", "r");
        $CodeQuery = <<<HTML
             Insert into keyword_code (code_url) values (?);
                
                
HTML;
        $KeywordQuery = <<<HTML
             Insert into keyword (kd_id,keyword) values (?,?);
                
                
HTML;
        $Index = 0;
        $LocalIterator = 0;
        while (($FileParsedContent = fgetcsv($filecontent) ) !== FALSE) {
            $Index++;
            if ($Index > 1) {
                if (isset($FileParsedContent[0]) && trim($FileParsedContent[0]) != "") {
                    $MyPrepare = $this->Settings->DB->prepare($CodeQuery);
                    $ExecuteResult = $MyPrepare->execute(array(utf8_encode($FileParsedContent[0])));
                    if ($ExecuteResult) {
                        $LastInsertedID = $this->Settings->DB->lastInsertId();
                        for ($Iterator = 1; $Iterator <= count($FileParsedContent); $Iterator++) {
                            $LocalIterator++;
                            if (isset($FileParsedContent[$Iterator]) && trim($FileParsedContent[$Iterator] != "")) {
                                $MyPrepare = $this->Settings->DB->prepare($KeywordQuery);
                                $ExecuteResult = $MyPrepare->execute(array($LastInsertedID, utf8_encode($FileParsedContent[$Iterator])));
                            }
                        }
                    }
                }
            }
        }
        echo $Index;
        echo "<br>" . $LocalIterator;
        set_time_limit(30);
    }
    public function parseTableCorrespondence() {
		
        set_time_limit(0);
        $filecontent = fopen("../resources/Table.csv", "r");
        $Query = <<<HTML
                INSERT INTO table_ values 
                (?,?,?,?,?,?,?,?,?,?,?)
                
HTML;
        $Index = 0;
        while (($FileParsedContent = fgetcsv($filecontent) ) !== FALSE) {
            $Index++;
            $MyPrepare = $this->Settings->DB->prepare($Query);
            if ($Index > 1) {
                $Param = array();
                $Param[] = $Index;
                foreach($FileParsedContent as $Val){
                    $Param[] = utf8_encode($Val);
                }
                $ExecuteResult = $MyPrepare->execute($Param);
            }
        }
        echo $Index;
        set_time_limit(30);
    }

    

}

$Parse = new parse_files();
//$Parse->parseKeyword();
//$Parse->parseDegreeInfo();
$Parse->parseSurvey();
//$Parse->parseTableCorrespondence();

?>
