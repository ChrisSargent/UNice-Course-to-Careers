<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index
 *
 * @author Bilal Ahmad Khan.
 * @email bilalahmadkhn@gmail.com
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/french/app-code/settings.php';
include_once './SearchInCareer.php';

class Index {

    public function __construct() {
        
    }

    public function Head() {
        
    }

    public function Header() {
        
    }

    public function Content() {
        
    }

    public function Footer() {
        
    }

}

function GetCareerHTML($Survey) {
    
    $html =  <<<HTML
           <div style="width:100%">
     
        <table border="1" style="width:100%">
HTML;
    foreach ($Survey as $Val) {
        $third = utf8_encode('Intitulé ROME');
//           print_r($Val);

        $html .= <<<HTML
    
     <tr>
        <td>ROME niveau 1 lib</td>
        <td>{$Val['ROME niveau 1 lib']}</td>
     </tr>
     <tr>
        <td>ROME niveau 2 lib</td>
        <td>{$Val['ROME niveau 2 lib']}</td>
     </tr>
     <tr>
        <td>Intitulé ROME</td>
        <td>{$Val['Intitulé ROME']}</td>
     </tr>
  
HTML;
    }
    $html .= <<<HTML
        
     </table>
   </div>
HTML;
    return $html;
}

function GetDiplomaHTML($Survey) {
    $html = <<<HTML
           <div style="width:100%">
     
        <table border="1" style="width:100%">
HTML;
    foreach ($Survey as $Val) {
        $third = utf8_encode('Intitulé ROME');
//           print_r($Val);

        $html .= <<<HTML
    
     <tr>
        <td>Intitulé_emploi</td>
        <td>{$Val['Intitulé_emploi']}</td>
     </tr>
     <tr>
        <td>Mention_diplôme</td>
        <td>{$Val['Mention_diplôme']}</td>
     </tr>
     <tr>
        <td>Spécialité_diplôme</td>
        <td>{$Val['Spécialité_diplôme']}</td>
     </tr>
  
HTML;
    }
    $html .= <<<HTML
        
     </table>
   </div>
HTML;
    return $html;
}
$html = "";
$Career = new SearchInCareer();
if (isset($_POST['search']) && isset($_POST['career']) && $_POST['career'] != "") {

    $Keyword = utf8_encode($_POST['career']);
    $KeywordResult = $Career->GetTheKeywordListFromKeyword($Keyword);
    if (count($KeywordResult) > 0) {
        $CodeURL = $Career->FetchCodeURL($KeywordResult);
    } else {
//echo "No result found";
    }


    $Survey = $Career->GetSurveyRecords($Keyword);
    $html = GetCareerHTML($Survey);

//$Survey = $Career->GetSurveyRecords($_POST['career']);
} else if (isset($_POST['search']) &&isset($_POST['diploma']) && $_POST['diploma'] != "") {
    $Keyword = utf8_encode($_POST['diploma']);
    $Survey = $Career->GetTheCareersUsingDiplomas($Keyword);
    $html = GetDiplomaHTML($Survey);
}
?>

<div style="width:100%; float: left;">
    <img src="../resources/header.png" />
    <div style="float: left; width: 50%">
        <form method="post" action="" name="career">
            <label>
                Recherche de carrière
                <input type="text" required name="career" value="" />
            </label>
            <input type="submit" value="Search" name="search" />
        </form>
    </div>
    <div style="float: left; width: 50%">
        <form method="post" action="" name="career">
            <label>
                Recherche de diplôme
                <input type="text" required name="diploma" value="" />
            </label>
            <input type="submit" value="Search" name="search" />
        </form>
    </div>
<img src="../resources/footer.png" />
</div>
<?php
echo $html;
?>