<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of career
 *
 * @author Bilal Ahmad Khan.
 * @email bilalahmadkhn@gmail.com
 */
include_once './pages.php';
include_once './SearchInCareer.php';

class career extends pages
{

    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = new SearchInCareer();
    }

    public function PublishHTML()
    {
        $Survey = $this->ProcessData();
        if (count($Survey) > 0) {
            $Result = $this->GetCareerHTML($Survey);
            $html['result'] = '<div style="margin: 0 auto; width: 80%;"><div id="accordion">' . $Result['result'] . "</div></div>";
        } else {
            $html['result'] = '<div style="margin: 0 auto; width: 80%;">' . "<div>No data found</div></div>";
        }

        $this->pageHTML = $html['result'];


        parent::PublishHTML();
    }

    public function ProcessData()
    {
        $Keyword = utf8_encode(trim($_REQUEST['career']));
        $KeywordResult = $this->data->GetTheKeywordListFromKeyword($Keyword);
        if (count($KeywordResult) > 0) {
            $CodeURL = $this->data->FetchCodeURL($KeywordResult);
        } else {
//echo "No result found";
        }


        $Survey = $this->data->GetSurveyRecords(trim($_REQUEST['career']));


        return $Survey;
    }

    function GetCareerHTML($Survey)
    {
        $html = '';

        $DataArray = array();
        $Iterator = 0;
//    echo "<pre>";
//    print_r($Survey);
//    echo "</pre>";
        foreach ($Survey as $Val) {
            if (trim($Val['b']) != '' && trim($Val['c']) != '' && trim($Val['e'] != '')) {
                $Iterator++;
                foreach ($Val as $SKey => $Vl) {
                    $Val[$SKey] = trim($Vl);
                    if ($Vl != "") {
                        $Val[$SKey] = utf8_encode($Vl);
                    }
                }

//                $DataArray['data'][$Val['b']][$Iterator][] = $Val['c'];
//                $DataArray['data'][$Val['b']][$Iterator][] = $Val['e'];
                if (isset($DataArray['data'][$Val['b']][$Val['c']])) {
                    if (!in_array($Val['e'], $DataArray['data'][$Val['b']][$Val['c']])) {
                        $DataArray['data'][$Val['b']][$Val['c']][] = $Val['e'];
                    }
                } else {
                    $DataArray['data'][$Val['b']][$Val['c']][] = $Val['e'];
                }


                if (!isset($DataArray['total'][$Val['b']][$Val['e']][$Val['y']])) {
                    $DataArray['total'][$Val['b']][$Val['e']][$Val['y']] = 0;
                }

                $DataArray['total'][$Val['b']][$Val['e']][$Val['y']] = $DataArray['total'][$Val['b']][$Val['e']][$Val['y']] + 1;


                $DataArray['right_data'][$Val['y']][0] = "<b>Composante: </b>" . $Val['w'];
                $DataArray['right_data'][$Val['y']][1] = "<b>Filiere: </b>" . $Val['z'];
                $DataArray['right_data'][$Val['y']][2] = "<b>Mention: </b>" . $Val['x'];
                $Link = $this->data->GetTheLink($Val['v']);
//                echo "<pre>";
//                print_r($Link);
//                echo "</pre>";
                if (isset($Link[0]['Diplome_code']) && $Link[0]['Diplome_code'] != "" &&
                    isset($Link[0]['Version_diplome_code']) && $Link[0]['Version_diplome_code'] != ""
                ) {
                    $Link[0]['Version_diplome_code'] = strtolower($Link[0]['Version_diplome_code']);
                    $Link[0]['Diplome_code'] = strtolower($Link[0]['Diplome_code']);
                    $LinkHTML = <<<html
                            <a  target="_blank" href="http://unice.fr/formation/formation-initiale/{$Link[0]['Diplome_code']}{$Link[0]['Version_diplome_code']}">Plus de détails</a>
html;
                    $DataArray['right_data'][$Val['y']][3] = $LinkHTML;
                }


                $SalaryRange = (trim($Val['q']) == '') ? "non renseigné" : $Val['q'];
//            echo "<pre>";
                if (!isset($DataArray['salary'][$Val['e']][$SalaryRange])) {
//                echo "$SalaryRange in {$Val['b']} not set";
                    $DataArray['salary'][$Val['e']][$SalaryRange] = 0;
                }
                $DataArray['salary'][$Val['e']][$SalaryRange] = ($DataArray['salary'][$Val['e']][$SalaryRange] * 1) + 1;
                $DataArray['JobLink'][$Val['e']] = $Val['d'];
                $FoundJob = (trim($Val['k']) == '') ? "non renseigné" : $Val['k'];
                if (!isset($DataArray['found_job'][$Val['e']][$FoundJob])) {
//                echo "$SalaryRange in {$Val['b']} not set";
                    $DataArray['found_job'][$Val['e']][$FoundJob] = 0;
                }
                $DataArray['found_job'][$Val['e']][$FoundJob] = ($DataArray['found_job'][$Val['e']][$FoundJob] * 1) + 1;

                $AfterGraduate = (trim($Val['t']) == '') ? "non renseigné" : $Val['t'];
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
                } else if ($AfterGraduate == "non renseigné") {
                    $AfterGraduate = "Not Specified";
                }
                if (!isset($DataArray['AfterGraduate'][$Val['e']][$AfterGraduate])) {
//                echo "$SalaryRange in {$Val['b']} not set";
                    $DataArray['AfterGraduate'][$Val['e']][$AfterGraduate] = 0;
                }
                $DataArray['AfterGraduate'][$Val['e']][$AfterGraduate] = ($DataArray['AfterGraduate'][$Val['e']][$AfterGraduate] * 1) + 1;


                $Position = (trim($Val['s']) == '') ? "non renseigné" : $Val['s'];
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

        $html['result'] = $this->StackHTML($DataArray);
        $html['graphs'] = $this->MakeBar($DataArray);
        $html['chart'] = $this->MakePayRangeChart($DataArray);
        $html['found'] = $this->MakeFoundJobChart($DataArray);
        $html['after'] = $this->MakeAfterGraduateChart($DataArray);
        $html['position'] = $this->MakePositionChart($DataArray);
        $html['right'] = $this->CareerRightBarData($DataArray);
        $html['JobLink'] = $this->MakeJobLinkButton($DataArray);
        return $html;
    }

    public function MakeJobLinkButton($Data)
    {
//        echo "<pre>";
//        print_r($Data);
//        echo "</pre>";
        $HiddenDiv = "";
        $globalIterator = 1;
        foreach ($Data['JobLink'] as $Key => $Cat) {
            $ConvertedKey = md5($Key);


            $HiddenDiv .= <<<hide
                    
                    
 <button style="display:none;" id="btn{$ConvertedKey}-hide"><a href="http://candidat.pole-emploi.fr/marche-du-travail/fichemetierrome?codeRome={$Cat}" target="_blank">Fiche associee sur le site de Pole Emploi</a></button>
  
hide;


            $globalIterator++;
        }

        return $HiddenDiv;
    }

    public function MakePayRangeChart($Data)
    {
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
          legend:{position: 'bottom'}
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

    public function MakeFoundJobChart($Data)
    {
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
          legend:{position: 'bottom'}
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

    public function MakeAfterGraduateChart($Data)
    {
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
          legend:{position: 'bottom'}
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

    public function MakePositionChart($Data)
    {
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
          legend:{position: 'bottom'}
           
        };
                    

        var chart = new google.visualization.PieChart(document.getElementById("h{$ConvertedKey}-hide"));

        chart.draw(data, options);
      }
                    
                    </script>
                <div class="chart-container" style="display:none; " id="h{$ConvertedKey}-hide">
                </div>
hide;
            $globalIterator++;
        }

        return $HiddenDiv;
    }

    public function MakeBar($Data)
    {
        $HiddenDiv = "";
        $globalIterator = 1;
        $ValArray = array();

        $CatArray = array();
        foreach ($Data['total'] as $BKey => $Catt) {
            if (isset($_GET['debug']) && $_GET['debug'] == 234) {
                echo "<pre>";
                echo "catt";
                print_r($Catt);
                echo "</pre>";
            }

            foreach ($Catt as $MKey => $Cat) {
                if (isset($_GET['debug']) && $_GET['debug'] == 234) {
                    echo "<pre>";
                    echo "Cat";
                    echo $MKey;
                    echo "<br>";
                    print_r($Cat);
                    echo "</pre>";
                }

                $ConvertedKey = md5($MKey);
//                <div class="bar-container" style="display:none;" id="a{$globalIterator}-hide">
                $HiddenDiv .= <<<hide
                    <div class="bar-container" style="display:none;   cursor: pointer; color: blue;" id="bar_$ConvertedKey-hide">
hide;
                $globalIterator++;
                $ValSum=0;
                foreach ($Cat as $LKey => $Val) {
                    $ValArray[]=$Val;
                    $ValSum +=$Val;
                }

                if (isset($_GET['debug']) && $_GET['debug'] == 234) {
                    echo "<pre>";
                    print_r($ValArray);
                    echo $ValSum;
                    echo "</pre>";

                }
            arsort($Cat); //added by mustafa
                foreach ($Cat as $LKey => $Val) {
                    $ConvertedKey = md5($LKey);

                    $Percent = round(($Val*100)/$ValSum);
                    $HiddenDiv .= <<<hide
                        <div rd-data="$ConvertedKey"  class="my-bar"  >
                    $LKey
                          <div  class="meter" style="height:40px;">
  <span style="width: {$Percent}%"></span>
  <bilal>{$Percent}%</bilal>
</div>
  </div>
hide;
                }
                $HiddenDiv .= <<<hide
                    </div>
hide;
            }
        }

        return $HiddenDiv;
    }

    public function StackHTML($Data, $Career = true)
    {
        $stack = '';
//        echo "<pre>";
//        print_r($Data);
//        echo "</pre>";
        $globalIterator = 1;

        foreach ($Data['data'] as $Key => $MainVal) {
            $stack .= <<<html
                <h3>{$Key}</h3>
  <div id="a{$globalIterator}">
html;
            $DuplicatePreventArray = array();
            foreach ($MainVal as $InternalKey => $Vval) {
                $stack .= <<<html
                <p>

    {$InternalKey}

    </p>
html;


                foreach ($Vval as $Val) {
                    $LocalHash = trim($InternalKey).trim($Val);
                    if (in_array($LocalHash, $DuplicatePreventArray)) {
                        continue;
                    } else {
                        $DuplicatePreventArray[] = $LocalHash;
//                        $Iterator = 1;
//                        $Iterator++;
//                        if ($Iterator % 2 == 0) {
//                            $Style = "";
//                            $StatsLinkStart = "";
//                            $StatsLinkEnd = "";
//                        } else {
                        $ConvertedKey = md5($Val);
                        $ConvertedKey = md5($Val);
                        $Style = "class='myClickable'  graph-data=\"{$ConvertedKey}\"  click-data='$globalIterator' style='margin-left:20px;'";
                        $CurrentLink = $this->Settings->RootURL . "pages/speciality_detail.php?career={$_REQUEST['career']}&careerkey={$Val}&key={$ConvertedKey}";
                        $StatsLinkStart = <<<stats
                                <a target="_blank" href="{$CurrentLink}">
stats;
                        $StatsLinkEnd = <<<stats
                                </a>
stats;
//                        }

                        $stack .= <<<html

    <p {$Style}>
    {$StatsLinkStart}
    {$Val}
    {$StatsLinkEnd}
    </p>


html;
                    }
                }

            }
            $stack .= <<<html
            </div>
html;
            $globalIterator++;
            // echo "<pre>";
            //  print_r($DuplicatePreventArray);
            //  echo "</pre>";
        }

        return $stack;
    }

    public function CareerRightBarData($Data)
    {
        $HiddenDiv = "";
//       echo "<pre>";
//       print_r($Data);
//       echo "</pre>";
        foreach ($Data['right_data'] as $BKey => $BVal) {
            $ConvertedKey = md5($BKey);
            $HiddenDiv .= <<<right
                               <ul style="display:none;" id="rd{$ConvertedKey}-hide" class="list-group">
right;
            foreach ($BVal as $SKey => $Val) {

                $HiddenDiv .= <<<right
                        
                                   
  <li class="list-group-item">

    {$Val}
  </li>

right;

            }
            $HiddenDiv .= <<<right
</ul>                               
right;
        }
        return $HiddenDiv;
    }

}

if (!isset($_REQUEST['key'])) {
    $ProcessCareer = new career();
    $ProcessCareer->PublishHTML();
}
?>
