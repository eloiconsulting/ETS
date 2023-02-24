<?php
if (!defined('BASEPATH')) exit('No direct script access allowed'); //Mail Helper function

if (!function_exists('send_daily_reports')) {
 function send_daily_reports()
 {
    $CI =& get_instance();
    $mail = new PHPMailer;
    $mail->IsSMTP();

    $mail->Host       = "smtp.gmail.com";
    $mail->SMTPAuth   = true;
    $mail->Username   = "doerstechdevelopers@gmail.com";
    $mail->Password   = "doerstech123";
    $mail->SMTPSecure = "TLS";
    $mail->Port       = 587;
    $mail->setFrom($mail->Username);


    // if($_SERVER['HTTP_HOST'] == '192.168.1.17' || $_SERVER['HTTP_HOST'] == 'localhost')
    // {
    //     $mail->Host       = "smtp.gmail.com";
    //     $mail->SMTPAuth   = true;
    //     $mail->Username   = "neopacktesting@gmail.com";
    //     $mail->Password   = "Neopack@123";
    //     $mail->SMTPSecure = "TLS";
    //     $mail->Port       = 587;
    //     $mail->setFrom($mail->Username);
    // }
    // else
    // {
    //     // $mail->Host       = "erp.neopack.in";
    //     $mail->Host       = "neopack.in";
    //     $mail->SMTPAuth   = true;
    //     $mail->Username   = "erp.backup@neopack.in";
    //     $mail->Password   = "pN2hEk9G1Q5Z";
    //     // $mail->Username   = "backup@erp.neopack.in";
    //     // $mail->Password   = "^n&]*;K@B-Q8";
    //     $mail->SMTPSecure = "TLS";
    //     $mail->Port       = 587;
    //     $mail->setFrom($mail->Username);
    // }

    // $mail->AddCC('support@doerstech.com');
    // $mail->AddBCC('siva@kiteserp.com');
    $mail->AddReplyTo("support@doerstech.com");
    return $mail;
 }

}
