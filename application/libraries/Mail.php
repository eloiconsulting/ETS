<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Mail {
    public function Mail() {
        require_once('PHPMailer/PHPMailerAutoload.php');
    }
}