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

    public function MakePayRangeChart($Data) {
//        echo "<pre>";
//        print_r($Data);
//        echo "</pre>";
        $HiddenDiv = "";
        $globalIterator = 1;
        foreach ($Data['salary'] as $Key => $Cat) {
            $ConvertedKey = md5($Key);
            $HiddenDiv .= <<<hide
                    
                    <script>
                        google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tranche de salaire', 'Percentage'],
         
       

hide;
            foreach ($Cat as $SmallKey => $Val) {
                $HiddenDiv .= <<<hide
                    
                    
 ["$SmallKey", $Val],
  
hide;
            }
            $HiddenDiv .= <<<hide
                ]);

        var options = {
          title: 'Tranche de salaire',
          pieSliceText: 'none',
           height: 250,
           width: 450,
           forceIFrame: true
        };
                    

        var chart = new google.visualization.PieChart(document.getElementById("c{$ConvertedKey}-hide"));

        chart.draw(data, options);
      }
                    
                    </script>
                <div class="chart-container" style="display:none; " id="c{$ConvertedKey}-hide">
                </div>
hide;
            $globalIterator++;
        }

        return $HiddenDiv;
    }

    public function MakeFoundJobChart($Data) {
//        echo "<pre>";
//        print_r($Data);
//        echo "</pre>";
        $HiddenDiv = "";
        $globalIterator = 1;
        foreach ($Data['found_job'] as $Key => $Cat) {
            $ConvertedKey = md5($Key);
            $HiddenDiv .= <<<hide
                    
                    <script>
                        google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Niveau d’emploi', 'Percentage'],
         
       

hide;
            foreach ($Cat as $SmallKey => $Val) {
                $HiddenDiv .= <<<hide
                    
                    
 ["$SmallKey", $Val],
  
hide;
            }
            $HiddenDiv .= <<<hide
                ]);

        var options = {
          title: 'Niveau d’emploi',
          pieSliceText: 'none',
           height: 250,
           width: 450,
           forceIFrame: true
        };
                    

        var chart = new google.visualization.PieChart(document.getElementById("f{$ConvertedKey}-hide"));

        chart.draw(data, options);
      }
                    
                    </script>
                <div class="chart-container" style="display:none; " id="f{$ConvertedKey}-hide">
                </div>
hide;
            $globalIterator++;
        }

        return $HiddenDiv;
    }

    public function MakeAfterGraduateChart($Data) {
//        echo "<pre>";
//        print_r($Data);
//        echo "</pre>";
        $HiddenDiv = "";
        $globalIterator = 1;
        foreach ($Data['AfterGraduate'] as $Key => $Cat) {
            $ConvertedKey = md5($Key);
            $HiddenDiv .= <<<hide
                    
                    <script>
                        google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Duree d’acces a lù’emploi', 'Percentage'],
         
       

hide;
            foreach ($Cat as $SmallKey => $Val) {
                $HiddenDiv .= <<<hide
                    
                    
 ["$SmallKey", $Val],
  
hide;
            }
            $HiddenDiv .= <<<hide
                ]);

        var options = {
          title: 'Duree d’acces a lù’emploi',
          pieSliceText: 'none',
           height: 250,
           width: 450,
           forceIFrame: true
        };
                    

        var chart = new google.visualization.PieChart(document.getElementById("g{$ConvertedKey}-hide"));

        chart.draw(data, options);
      }
                    
                    </script>
                <div class="chart-container" style="display:none; " id="g{$ConvertedKey}-hide">
                </div>
hide;
            $globalIterator++;
        }

        return $HiddenDiv;
    }
    
    public function MakePositionChart($Data) {
//        echo "<pre>";
//        print_r($Data);
//        echo "</pre>";
        $HiddenDiv = "";
        $globalIterator = 1;
        foreach ($Data['Position'] as $Key => $Cat) {
            $ConvertedKey = md5($Key);
            $HiddenDiv .= <<<hide
                    
                    <script>
                        google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type de candidature', 'Percentage'],
         
       

hide;
            foreach ($Cat as $SmallKey => $Val) {
                $HiddenDiv .= <<<hide
                    
                    
 ["$SmallKey", $Val],
  
hide;
            }
            $HiddenDiv .= <<<hide
                ]);

        var options = {
          title: 'Type de candidature',
          pieSliceText: 'none',
           height: 250,
           width: 450,
           forceIFrame: true
        };
                    

        var chart = new google.visualization.PieChart(document.getElementById("g{$ConvertedKey}-hide"));

        chart.draw(data, options);
      }
                    
                    </script>
                <div class="chart-container" style="display:none; " id="g{$ConvertedKey}-hide">
                </div>
hide;
            $globalIterator++;
        }

        return $HiddenDiv;
    }

    public function MakeBar($Data) {
        $HiddenDiv = "";
        $globalIterator = 1;
        foreach ($Data['total'] as $Key => $Cat) {

            $HiddenDiv .= <<<hide
                    
                    <div class="bar-container" style="display:none;" id="a{$globalIterator}-hide">
hide;
            $globalIterator++;
            foreach ($Cat as $LKey => $Val) {
                $HiddenDiv .= <<<hide
                        <div>
                    $LKey
                          <div  class="meter">
  <span style="width: {$Val}%"></span>
  <bilal>{$Val}%</bilal>
</div>                              
  </div>
hide;
            }
            $HiddenDiv .= <<<hide
                    
                    </div>
hide;
        }

        return $HiddenDiv;
    }

    public function StackHTML($Data, $Career = true) {
        $stack = '';
//        echo "<pre>";
//        print_r($Data);
//        echo "</pre>";
        $globalIterator = 1;
        $DuplicatePreventArray = array();
        foreach ($Data['data'] as $Key => $MainVal) {
            $stack .= <<<html
                <h3>{$Key}</h3>
  <div id="a{$globalIterator}">
html;

            foreach ($MainVal as $InternalKey => $Vval) {
                $LocalHash = trim($Data['data'][$Key][$InternalKey][0]) . trim($Data['data'][$Key][$InternalKey][1]);
                if (in_array($LocalHash, $DuplicatePreventArray)) {
                    continue;
                } else {
                    $DuplicatePreventArray[] = $LocalHash;
                }
                $Iterator = 1;

                foreach ($Vval as $Val) {
                    $Iterator++;
                    if ($Iterator % 2 == 0) {
                        $Style = "";
                    } else {
                        $ConvertedKey = md5($Val);
                        $Style = "class='myClickable' graph-data=\"{$ConvertedKey}\"  click-data='$globalIterator' style='margin-left:20px;'";
                    }
                    $stack .= <<<html
                
    <p {$Style}>
    {$Val}
    
    </p>
    
  
html;
                }
            }
            $stack .= <<<html
            </div>
html;
            $globalIterator++;
        }
        return $stack;
    }

}

function GetCareerHTML($Survey) {
    $html = '';

    $DataArray = array();
    $Iterator = 0;
//    echo "<pre>";
//    print_r($Survey);
//    echo "</pre>";
    foreach ($Survey as $Val) {
        if (trim($Val['b']) != '' && trim($Val['c']) != '' && trim($Val['e'] != '')) {
            $Iterator++;
            $DataArray['data'][$Val['b']][$Iterator][] = $Val['c'];
            $DataArray['data'][$Val['b']][$Iterator][] = $Val['e'];
            if (!isset($DataArray['total'][$Val['b']][$Val['y']])) {
                $DataArray['total'][$Val['b']][$Val['y']] = 0;
            }

            $DataArray['total'][$Val['b']][$Val['y']] = $DataArray['total'][$Val['b']][$Val['y']] + 1;
            $SalaryRange = (trim($Val['q']) == '') ? "EMPTY" : $Val['q'];
//            echo "<pre>";
            if (!isset($DataArray['salary'][$Val['e']][$SalaryRange])) {
//                echo "$SalaryRange in {$Val['b']} not set";
                $DataArray['salary'][$Val['e']][$SalaryRange] = 0;
            }
            $DataArray['salary'][$Val['e']][$SalaryRange] = ($DataArray['salary'][$Val['e']][$SalaryRange] * 1) + 1;

            $FoundJob = (trim($Val['k']) == '') ? "EMPTY" : $Val['k'];
            if (!isset($DataArray['found_job'][$Val['e']][$FoundJob])) {
//                echo "$SalaryRange in {$Val['b']} not set";
                $DataArray['found_job'][$Val['e']][$FoundJob] = 0;
            }
            $DataArray['found_job'][$Val['e']][$FoundJob] = ($DataArray['found_job'][$Val['e']][$FoundJob] * 1) + 1;

            $AfterGraduate = (trim($Val['t']) == '') ? "EMPTY" : $Val['t'];
            if ($AfterGraduate < 0) {
                $AfterGraduate = "Have been woking before graduation";
            } else if ($AfterGraduate >= 0 && $AfterGraduate < 3) {
                $AfterGraduate = "Moins de 3 mois";
            } else if ($AfterGraduate >= 3 && $AfterGraduate < 6) {
                $AfterGraduate = "3-6 moins";
            } else if ($AfterGraduate >= 6 && $AfterGraduate < 12) {
                $AfterGraduate = "6-12 mois";
            } else if ($AfterGraduate >= 12 && $AfterGraduate < 24) {
                $AfterGraduate = "1-2 ans";
            } else if ($AfterGraduate >= 24) {
                $AfterGraduate = "Plus que 2 ans";
            } else if ($AfterGraduate == "EMPTY") {
                $AfterGraduate = "Not Specified";
            }
            if (!isset($DataArray['AfterGraduate'][$Val['e']][$AfterGraduate])) {
//                echo "$SalaryRange in {$Val['b']} not set";
                $DataArray['AfterGraduate'][$Val['e']][$AfterGraduate] = 0;
            }
            $DataArray['AfterGraduate'][$Val['e']][$AfterGraduate] = ($DataArray['AfterGraduate'][$Val['e']][$AfterGraduate] * 1) + 1;


            $Position = (trim($Val['s']) == '') ? "EMPTY" : $Val['s'];
            if (!isset($DataArray['Position'][$Val['e']][$Position])) {

//                echo "$SalaryRange in {$Val['b']} not set";
                $DataArray['Position'][$Val['e']][$Position] = 0;
            }
            $DataArray['Position'][$Val['e']][$Position] = ($DataArray['Position'][$Val['e']][$Position] * 1) + 1;

//            print_r($DataArray['salary']);
        }
    }
    if (isset($_GET['debug']) && $_GET['debug'] == 2) {
        echo "<pre>";
        print_r($DataArray);
        echo "</pre>";
    }
    $UIObj = new Index();
    $html['result'] = $UIObj->StackHTML($DataArray);
    $html['graphs'] = $UIObj->MakeBar($DataArray);
    $html['chart'] = $UIObj->MakePayRangeChart($DataArray);
    $html['found'] = $UIObj->MakeFoundJobChart($DataArray);
    $html['after'] = $UIObj->MakeAfterGraduateChart($DataArray);
    $html['position'] = $UIObj->MakePositionChart($DataArray);
    return $html;
}

function GetDiplomaHTML($Survey) {
    $html = '';
    $DataArray = array();
    foreach ($Survey as $Val) {
        if (trim($Val['aa']) != '' && trim($Val['x']) != '' && trim($Val['y'] != '')) {
            $DataArray[$Val['aa']][] = $Val['x'];
            $DataArray[$Val['aa']][] = $Val['y'];
        }
    }
    $UIObj = new Index();
    $html = $UIObj->StackHTML($DataArray);
    return $html;
}

$html = "";
$Career = new SearchInCareer();
if (isset($_POST['search']) && isset($_POST['career']) && $_POST['career'] != "") {

    $Keyword = utf8_encode(trim($_POST['career']));
    $KeywordResult = $Career->GetTheKeywordListFromKeyword($Keyword);
    if (count($KeywordResult) > 0) {
        $CodeURL = $Career->FetchCodeURL($KeywordResult);
    } else {
//echo "No result found";
    }


    $Survey = $Career->GetSurveyRecords($Keyword);
    $html = GetCareerHTML($Survey);

//$Survey = $Career->GetSurveyRecords($_POST['career']);
} else if (isset($_POST['search']) && isset($_POST['diploma']) && $_POST['diploma'] != "") {
    $Keyword = utf8_encode(trim($_POST['diploma']));
    $Survey = $Career->GetTheCareersUsingDiplomas($Keyword);
    $html = GetDiplomaHTML($Survey);
}
?>
<!doctype html>
<html lang="en">
    <head>

        <title>French</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!--        <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">-->
        <link rel="stylesheet" href="jquery-ui-1.10.4.custom.css">
        <link rel="stylesheet" href="french-style.css">

        <script type="text/javascript" src="french-script.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>
    </head>
    <div style="width:100%; float: left; margin-top: 20px;">
        <img style="margin-bottom: 20px" src="../resources/header.png" />
        <div style="margin: 0 auto; width: 80%">
            <div style="float: left; width: 50%">
                <form method="post" action="" name="career" style="float:left;">
                    <label>
                        Recherche de carrière
                        <input type="text" required name="career" value="" />
                    </label>
                    <input type="submit" value="Search" name="search" />
                </form>
            </div>
            <div style="float: left; width: 50%">
                <form method="post" action="" name="career" style="float:right;">
                    <label>
                        Recherche de diplôme
                        <input type="text" required name="diploma" value="" />
                    </label>
                    <input type="submit" value="Search" name="search" />
                </form>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div style="margin: 0 auto; width: 80%;">
            <div id="accordion">
                <?php
                if (isset($html['result'])) {
                    echo $html['result'];
                }
                ?>
            </div>
            <div style="float: left; width: 100%;">
                <div style="float: left;">
                    <?php
                    if (isset($html['chart'])) {
                        echo $html['chart'];
                    }
                    ?>
                </div>
                <div style="float: left;">
                    <?php
                    if (isset($html['position'])) {
                        echo $html['position'];
                    }
                    ?>
                </div>
                <div style="float: right;">
                    <?php
                    if (isset($html['found'])) {
                        echo $html['found'];
                    }
                    ?>
                </div>
                <div style="float: left;">
                    <?php
                    if (isset($html['after'])) {
                        echo $html['after'];
                    }
                    ?>
                </div>


            </div>
            <div>
                <?php
                if (isset($html['graphs'])) {
                    echo $html['graphs'];
                }
                ?>
            </div>
        </div>
        <div style="clear: both;"></div>
        <img  style="margin-top: 20px" src="../resources/footer.png" />
    </div>

</body>
</html>