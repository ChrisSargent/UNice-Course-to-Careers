<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of settings
 *
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
$ProjectName = "/french";
include_once 'common.php';
include_once '../component/sendemail.php';
$Settings = new settings();

class settings {

    public $Hostname = "localhost";
    public $DBName = "french_abc";
    public $Username = "root";
    public $Password = "hippie";
    public $DB = null;
    public $RootURL = "http://ec2-52-11-78-178.us-west-2.compute.amazonaws.com/french/";
    public $Common;
    public $SendEmail;

    public function __construct() {
        
        if($_SERVER['DOCUMENT_ROOT'] == "C:/wamp/www"){
            $this->Password = "";
            $this->RootURL = "http://localhost:81/french/";
        }
        $this->ConnectDB();
        $this->setTimeZone();
        
        
        $this->Common = new common();
        $this->SendEmail = new sendemail();
    }

    public function ConnectDB() {
        try {
            $this->DB = new PDO("mysql:host={$this->Hostname};dbname={$this->DBName};charset=utf8", "{$this->Username}", "{$this->Password}");
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $exc) {
//            echo "<pre>";
//            print_r($exc);
            die("Can not connect to Greetr");
        }
    }

    public function SetTimeZone() {
        date_default_timezone_set('America/New_York');
    }
    
    

}
include_once $_SERVER['DOCUMENT_ROOT']."/french/pages/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/french/pages/footer.php";
?>
