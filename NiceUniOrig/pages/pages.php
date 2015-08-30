<?php

include_once '../app-code/settings.php';
include_once './header.php';
include_once './footer.php';

class pages {

    public $pageHTML;
    public $Header;
    public $Footer;
    public $Settings;

    public function __construct() {
        $this->Header = new header();
        $this->Footer = new footer();
        $this->Settings = new settings();
    }

    public function PublishHTML() {
        echo $this->Header->Header();
        echo $this->LoadDefaultScripts();
        echo $this->pageHTML;
        echo $this->Footer->footer();
    }

    public function RenderHTML() {
        return $this->Header->Header().
        $this->LoadDefaultScripts().
        $this->pageHTML .
                $this->Footer->footer();
    }

    public function LoadDefaultScripts() {
        return <<<script
                <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!--        <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">-->
        <link rel="stylesheet" href="{$this->Settings->RootURL}pages/jquery-ui-1.10.4.custom.css">
        <link rel="stylesheet" href="{$this->Settings->RootURL}pages/french-style.css">

        <script type="text/javascript" src="{$this->Settings->RootURL}pages/french-script.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>

script;
    }

}

?>
