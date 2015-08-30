<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of common
 *
 */
class common {

    public function Response($Message, $IsError = 0, $Response = "", $Dictionary = "") {
        echo json_encode(array('success' => $IsError, 'message' => $Message, 'response' => $Response, 'dictionary' => $Dictionary));
    }

    public function SendEmail($To, $Subject, $Message) {
        $Email = new sendemail();
        $Email->SendMail($To, $Subject, $Message);
        return True;
    }

    

}

?>
