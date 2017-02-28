<?php
header('Content-Type: text/html; charset=UTF8');
include('../inc/db.php');
require_once('class.phpgmailer.php');
session_start();
if(!isset($_POST['reload'])){
                        /***/
                        if(isset($_POST['fullname'])){$fullname = htmlspecialchars($_POST['fullname']);} else {header('Location: http://intranet.tsu.ge/?act=main&admin=admin&send=2 '); exit;}
                        if(isset($_POST['head'])){$head = htmlspecialchars($_POST['head']);} else {header('Location: http://intranet.tsu.ge/?act=main&admin=admin&send=2 '); exit;}
                        if(isset($_POST['sub'])){$sub = htmlspecialchars($_POST['sub']);} else {header('Location: http://intranet.tsu.ge/?act=main&admin=admin&send=2 '); exit;}
                        if(isset($_POST['content'])){$content = htmlspecialchars($_POST['content']);} else {header('Location: http://intranet.tsu.ge/?act=main&admin=admin&send=2 '); exit;}
                        if(!empty($_POST['fullname']) && !empty($_POST['head']) && !empty($_POST['sub']) && !empty($_POST['content'])){header('Location: http://intranet.tsu.ge/?act=main&admin=admin&send=1 ');}
                        else{header('Location: http://intranet.tsu.ge/?act=main&admin=admin&send=2 '); exit;}
                        /***/
                        $mail = new PHPGMailer();
                        $mail->Username = 'contact@tsu.ge'; 
                        $mail->Password = '2014contact';
                        $mail->From = 'kaxam1@gmail.com'; 
                        $mail->FromName = $fullname;
                        $mail->Subject = $sub;
                        $mail->AddAddress('int@tsu.ge');
                        $mail->Body = $content;
                        $mail->Send();
                        /***/
                        if($mail){header('Location: http://intranet.tsu.ge/?act=main&admin=admin&send=3 ');}
                        }
                        if(isset($_POST['reload'])){ 
                                function generateRandomString($length = 6) {
                                return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
                                   }
                             $_SESSION['code'] = generateRandomString(); $passss = $_SESSION['code']; $md5pass = md5($passss);
                            if(!empty($_POST['rpers'])){$rpers = $_POST['rpers'];}
                            
                        $mailshemowqueri1 = mysqli_query($db3,"SELECT text FROM nawilebi WHERE id = 77 ")or die("kavshiri araa");
                        $mailshemowrov1 = mysqli_fetch_array($mailshemowqueri1); $from = $mailshemowrov1['text'];
                        $mailshemowqueri11 = mysqli_query($db3,"SELECT text FROM nawilebi WHERE id = 78")or die("kavshiri araa");
                        $mailshemowrov11 = mysqli_fetch_array($mailshemowqueri11);$subj = $mailshemowrov11['text'];
                        $mailshemowqueri = mysqli_query($db3,"SELECT mail FROM users WHERE PersNumber = '$rpers'")or die("kavshiri araa");
                        $mailshemowrov = mysqli_fetch_array($mailshemowqueri);
                        if(isset($mailshemowrov['mail'])){$mailsenser = $mailshemowrov['mail'];}
                         if(!isset($mailsenser)){header('Location: http://intranet.tsu.ge/?act=login&reload=1&send=3 ');}
                        $mail = new PHPGMailer();
                        $mail->Username = 'contact@tsu.ge'; 
                        $mail->Password = '2014contact';
                        $mail->From = 'intranet.tsu.ge'; 
                        $mail->FromName = "$from";
                        $mail->Subject = "$subj";
                        $mail->AddAddress($mailsenser);
                        $mail->Body = $passss;
                        $mail->Send();
                        $pasupdatepassqueri = mysqli_query($db3,"UPDATE `users` SET password = '$md5pass' WHERE mail = '$mailsenser'")or die("ar moxda parolis agdgena");
                          if($mail && isset($mailsenser)){header('Location: http://intranet.tsu.ge/?act=login&reload=1&send=2 ');}  
                        }else {header('Location: http://intranet.tsu.ge/?act=login&reload=1&send=1 ');}

?>