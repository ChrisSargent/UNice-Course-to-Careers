<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchInCareer
 *
 * @author Bilal Ahmad Khan.
 * @email bilalahmadkhn@gmail.com
 */
//include_once $_SERVER['DOCUMENT_ROOT'] . '/french/app-code/settings.php';

class SearchInCareer {

    private $Settings;

    public function __construct() {
        $this->Settings = new settings();
    }

    public function GetTheKeywordListFromKeyword($Keyword) {

        $Query = <<<HTML
                select * from keyword where keyword like "%{$Keyword}%"
HTML;
        $MyPrepare = $this->Settings->DB->prepare($Query);
//        $ExecuteResult = $MyPrepare->execute(array("%".utf8_encode($Keyword)."%"));
        $ExecuteResult = $MyPrepare->execute();

        $TempResult = $MyPrepare->fetchAll(PDO::FETCH_ASSOC);

        $Result = array();
        $Index = 0;
        foreach ($TempResult as $Val) {

            $Result[$Index]['id'] = $Val['id'];
            $Result[$Index]['keyword'] = utf8_decode($Val['keyword']);
            $Result[$Index]['kd_id'] = $Val['kd_id'];
            $Index++;
        }

        return $Result;
    }

    public function FetchCodeURL($Param) {
        $Array = array();

        foreach ($Param as $Val) {
            $Array[] = $Val['kd_id'];
        }
        $QueryParam = implode(",", $Array);

        $Query = <<<HTML
                select * from keyword_code where id in ({$QueryParam})
HTML;
        $MyPrepare = $this->Settings->DB->prepare($Query);
        $ExecuteResult = $MyPrepare->execute();

        $TempResult = $MyPrepare->fetchAll(PDO::FETCH_ASSOC);
        return $TempResult;
    }

    public function GetSurveyRecords($Keyword) {
/*
 * 2736260a039bd3eb6b406799e18013dc
 * b7878790d2f4cd00fb41260a201b1c78
 * d4bcedc8853638a8237265ef2fe89b6b
 * */
      $Query = <<<HTML
                select * from survey where 
`a` like "%$Keyword%"
or `e` like "%$Keyword%";
HTML;
        $MyPrepare = $this->Settings->DB->prepare($Query);
//        $ExecuteResult = $MyPrepare->execute(array("%".utf8_encode($Keyword)."%"));
        $ExecuteResult = $MyPrepare->execute();

        $TempResult = $MyPrepare->fetchAll(PDO::FETCH_ASSOC);
//        echo "<pre>";
//            print_r($TempResult);
//            echo "</pre>";
        if (count($TempResult) > 0) {
            $TempResult = $this->SearchUsingRomeCode($TempResult);
        }

        $Result = array();
        $Index = 0;
        foreach ($TempResult as $Val) {
            foreach ($Val as $Key => $SingleVal) {
                $Result[$Index][$Key] = utf8_decode($SingleVal);
            }
            $Index++;
        }

        if (isset($_REQUEST['debug']) && $_REQUEST['debug'] == 1) {
            echo "<pre>";
            print_r($Result);
            echo "</pre>";
        }

        return $Result;
    }

    public function SearchUsingRomeCode($Data) {


        $Needle = array();
        foreach ($Data as $Val) {
            $Needle[] = "'{$Val['d']}'";
        }
        $Needle = implode(",", array_unique($Needle));

        $Query = <<<HTML
                SELECT * 
FROM  `survey` 
WHERE  `d` in ({$Needle});
HTML;
        $MyPrepare = $this->Settings->DB->prepare($Query);
//        $ExecuteResult = $MyPrepare->execute(array("%".utf8_encode($Keyword)."%"));
        $ExecuteResult = $MyPrepare->execute();
        //echo "Total Results = ",$MyPrepare->rowCount(),"<br>";

        $TempResult = $MyPrepare->fetchAll(PDO::FETCH_ASSOC);
        return $TempResult;
    }

    public function GetTheCareersUsingDiplomas($Keywords) {
        $Query = <<<HTML
                select * from survey where
`x` like '%{$Keywords}%'
OR
`y` like '%{$Keywords}%'
OR
`z` like '%{$Keywords}%'
HTML;

        $MyPrepare = $this->Settings->DB->prepare($Query);
        $ExecuteResult = $MyPrepare->execute();
        $TempResult = $MyPrepare->fetchAll(PDO::FETCH_ASSOC);
//echo "Total Results = ",$MyPrepare->rowCount(),"<br>";
//        if (count($TempResult) > 0) {
//            $TempResult = $this->SearchUsingRomeCode($TempResult);
//        }

        $Result = array();
        $Index = 0;
        foreach ($TempResult as $Val) {
            foreach ($Val as $Key => $SingleVal) {
                $Result[$Index][$Key] = utf8_decode($SingleVal);
            }
            $Index++;
        }

        if (isset($_REQUEST['debug']) && $_REQUEST['debug'] == 1) {
            echo "<pre>";
            print_r($Result);
            echo "</pre>";
        }

        return $Result;
    }
    public function GetTheLink($Code) {
        $Query = <<<HTML
                SELECT * 
FROM  `degree_info` 
WHERE Diplome_SISE_code = {$Code}
order by Annee_de_liinscription desc
limit 1
HTML;

        $MyPrepare = $this->Settings->DB->prepare($Query);
        $ExecuteResult = $MyPrepare->execute();
        $Result = $MyPrepare->fetchAll(PDO::FETCH_ASSOC);
//echo "Total Results = ",$MyPrepare->rowCount(),"<br>";
        return $Result;
    }

}

//$Search = new SearchInCareer();
//$Keyword = 'préparation';
//$Search->FetchCodeURL($Search->GetTheKeywordListFromKeyword($Keyword));
//$Search->GetSurveyRecords($Keyword)
?>
