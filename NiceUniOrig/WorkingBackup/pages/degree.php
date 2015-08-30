<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of degree
 *
 * @author Bilal Ahmad Khan.
 * @email bilalahmadkhn@gmail.com
 */
include_once './pages.php';
include_once './SearchInCareer.php';

class degree extends pages {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->data = new SearchInCareer();
    }

    public function PublishHTML() {
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

    public function ProcessData() {



        $Keyword = utf8_encode(trim($_REQUEST['degree']));
//        $KeywordResult = $this->data->GetTheCareersUsingDiplomas($Keyword);



        $Survey = $this->data->GetTheCareersUsingDiplomas(trim($_REQUEST['degree']));


        return $Survey;
    }

    function GetCareerHTML($Survey) {
        $html = '';

        $DataArray = array();
        $Iterator = 0;
//    echo "<pre>";
//    print_r($Survey);
//    echo "</pre>";
        foreach ($Survey as $Val) {
            if (trim($Val['z']) != '' && trim($Val['x']) != '' && trim($Val['z'] != '')) {
                $Iterator++;
                foreach ($Val as $SKey => $Vl) {
                    $Val[$SKey] = trim($Vl);
                    if ($Vl != "") {
                        $Val[$SKey] = utf8_encode($Vl);
                    }
                }

//                $DataArray['data'][$Val['b']][$Iterator][] = $Val['c'];
//                $DataArray['data'][$Val['b']][$Iterator][] = $Val['e'];
                if (isset($DataArray['data'][$Val['z']][$Val['x']])) {
                    if (!in_array($Val['y'], $DataArray['data'][$Val['z']][$Val['x']])) {
                        $DataArray['data'][$Val['z']][$Val['x']][] = $Val['y'];
                    }
                } else {
                    $DataArray['data'][$Val['z']][$Val['x']][] = $Val['y'];
                }


                if (!isset($DataArray['total'][$Val['z']][$Val['y']][$Val['e']])) {
                    $DataArray['total'][$Val['z']][$Val['y']][$Val['e']] = 0;
                }

                $DataArray['total'][$Val['z']][$Val['y']][$Val['e']] = $DataArray['total'][$Val['z']][$Val['y']][$Val['e']] + 1;


                $DataArray['right_data'][$Val['e']][0] = "<b>Rome niveau 1: </b>" . $Val['b'];
                $DataArray['right_data'][$Val['e']][1] = "<b>Rome niveau 2: </b>" . $Val['c'];
                $LinkHTML = <<<html
                            <a  target="_blank" href="http://candidat.pole-emploi.fr/marche-du-travail/fichemetierrome?codeRome={$Val['d']}">Plus de détails</a>
html;
 
                $DataArray['right_data'][$Val['e']][2] = "<b>Code Rome: </b>" . $LinkHTML;
//                $Link = $this->data->GetTheLink($Val['v']);
                
//                echo "<pre>";
//                print_r($Link);
//                echo "</pre>";
                /*
                if (isset($Link[0]['Diplome_code']) && $Link[0]['Diplome_code'] != "" &&
                        isset($Link[0]['Version_diplome_code']) && $Link[0]['Version_diplome_code'] != ""
                ) {
                    $Link[0]['Version_diplome_code'] = strtolower($Link[0]['Version_diplome_code']);
                    $Link[0]['Diplome_code'] = strtolower($Link[0]['Diplome_code']);
                    $LinkHTML = <<<html
                            <a  target="_blank" href="http://candidat.pole-emploi.fr/marche-du-travail/fichemetierrome?codeRome={$Link[0]['Diplome_code']}{$Link[0]['Version_diplome_code']}">Plus de détails</a>
html;
                    $DataArray['right_data'][$Val['y']][3] = $LinkHTML;
                } */


                $SalaryRange = (trim($Val['q']) == '') ? "non renseigné" : $Val['q'];
//            echo "<pre>";
                if (!isset($DataArray['salary'][$Val['y']][$SalaryRange])) {
//                echo "$SalaryRange in {$Val['b']} not set";
                    $DataArray['salary'][$Val['y']][$SalaryRange] = 0;
                }
                $DataArray['salary'][$Val['y']][$SalaryRange] = ($DataArray['salary'][$Val['y']][$SalaryRange] * 1) + 1;
                $DataArray['JobLink'][$Val['y']] = $Val['v']; //chnaged by mustafa from column d to v
                $FoundJob = (trim($Val['k']) == '') ? "non renseigné" : $Val['k'];
                if (!isset($DataArray['found_job'][$Val['y']][$FoundJob])) {
//                echo "$SalaryRange in {$Val['b']} not set";
                    $DataArray['found_job'][$Val['y']][$FoundJob] = 0;
                }
                $DataArray['found_job'][$Val['y']][$FoundJob] = ($DataArray['found_job'][$Val['y']][$FoundJob] * 1) + 1;

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
                if (!isset($DataArray['AfterGraduate'][$Val['y']][$AfterGraduate])) {
//                echo "$SalaryRange in {$Val['b']} not set";
                    $DataArray['AfterGraduate'][$Val['y']][$AfterGraduate] = 0;
                }
                $DataArray['AfterGraduate'][$Val['y']][$AfterGraduate] = ($DataArray['AfterGraduate'][$Val['y']][$AfterGraduate] * 1) + 1;


                $Position = (trim($Val['s']) == '') ? "non renseigné" : $Val['s'];
                if (!isset($DataArray['Position'][$Val['y']][$Position])) {

//                echo "$SalaryRange in {$Val['b']} not set";
                    $DataArray['Position'][$Val['y']][$Position] = 0;
                }
                $DataArray['Position'][$Val['y']][$Position] = ($DataArray['Position'][$Val['y']][$Position] * 1) + 1;

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

    public function MakeJobLinkButton($Data) {
		 if (isset($_GET['debug']) && $_GET['debug'] == 3) {
//echo "Value for v ". $Val['v']. "<br>";

 echo "<pre>";
	  print_r($Data);
	  echo "</pre>";
  }
     
        $HiddenDiv = "";
        $globalIterator = 1;
        foreach ($Data['JobLink'] as $Key => $Cat) {
            $ConvertedKey = md5($Key);
			
           $Link =$this-> GetTheLink($Cat);
		    $Link[0]['Version_diplome_code'] = strtolower($Link[0]['Version_diplome_code']);
                    $Link[0]['Diplome_code'] = strtolower($Link[0]['Diplome_code']);
            $HiddenDiv .= <<<hide
                    
                    
 <button style="display:none;" id="btn{$ConvertedKey}-hide"><a href="http://unice.fr/formation/formation-initiale/{$Link[0]['Diplome_code']}{$Link[0]['Version_diplome_code']}" target="_blank">Fiche associee sur le site de Pole Emploi</a></button>
  
hide;


            $globalIterator++;
        }

        return $HiddenDiv;
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

        return $Result;
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
          pieSliceText: 'none'
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
          pieSliceText: 'none'
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
          pieSliceText: 'none'
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
          pieSliceText: 'none'
           
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

    public function MakeBar($Data) {
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
               if($LKey=="")   ///condition added by mustafa to skip the empty bars
				    continue;
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

    public function StackHTML($Data, $Career = true) {

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
                        $CurrentLink = $this->Settings->RootURL . "pages/speciality_detail_degree.php?degree={$_REQUEST['degree']}&career={$_REQUEST['degree']}&careerkey={$Val}&key={$ConvertedKey}";
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

    public function CareerRightBarData($Data) {
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
    $ProcessCareer = new degree();
    $ProcessCareer->PublishHTML();
}
?>
