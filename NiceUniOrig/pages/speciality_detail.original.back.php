<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of speciality_detail
 *
 */
include_once './pages.php';
include_once 'career.php';

class speciality_detail extends pages {

    private $CareerObj;

    public function __construct() {
        parent::__construct();
        $this->CareerObj = new career();
    }

    public function PublishHTML() {
        $Survey = $this->CareerObj->ProcessData();
        $html = $this->CareerObj->GetCareerHTML($Survey);

        $this->pageHTML = $this->MakeScripts() . $this->MakePageHTML($html);
        /* "<div>" . $html['graphs'] . "</div>" .
          $html['chart'] .
          $html['found'] .
          $html['after'] .
          $html['position']; */
        parent::PublishHTML();
    }

    public function MakeScripts() {
        $Key = $_REQUEST['key'];
        $Result = <<<script
                <script>
                $(document).ready(function() {
    var GraphKeyName = "$Key";
    $("#c" + GraphKeyName + "-hide").toggle();
                console.log(GraphKeyName);
    $("#f" + GraphKeyName + "-hide").toggle();
    $("#g" + GraphKeyName + "-hide").toggle();
    $("#h" + GraphKeyName + "-hide").toggle();
    $("#bar_" + GraphKeyName + "-hide").toggle();
    $("#btn" + GraphKeyName + "-hide").toggle();
});

                </script>
script;
        return $Result;
    }

    public function MakePageHTML($html) {

        $PageHTML = <<<html
                <div class="container">
                    <div class="col-lg-12" style="text-align: center">
                        <h1>{$_REQUEST['careerkey']}</h1>
                    </div>
                </div>
                        <div class="container">
                        <div class="col-lg-12" >
                        <h2>les diplômes qui mènent à ce métier</h2>
                    </div>
                <div style="clear:both;"></div>
                
               <div class="col-lg-6">{$html['graphs']}</div>
               <div class="col-lg-6">{$html['right']}</div>
               
               </div>
                <div class="container">
               <br/>
               <br/>
               </div>
                <div class="container">
               <div class="col-lg-12" >
                        <h2>Quelques indicateurs statistiques concernant ce métier</h2>
                    </div>
               </div>
                <div class="container">
               
               <div class="col-lg-6">{$html['chart']}</div>
               <div class="col-lg-6">{$html['found']}</div>
               <div class="col-lg-6">{$html['after']}</div>
               <div class="col-lg-6">{$html['position']}</div>
               <div class="col-lg-12" style=" text-align:center; padding: 30px 0 10px 0;">{$html['JobLink']}</div>
               
               </div>
html;
        return $PageHTML;
    }

}

if (isset($_REQUEST['key'])) {
    $Speciality = new speciality_detail();
    $Speciality->PublishHTML();
}
?>
