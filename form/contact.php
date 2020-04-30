<?php
require_once 'mail.php';

if ($_SERVER['REQUEST_METHOD']  === 'POST') {
    $message = 'New message from'.$_POST['name'].' with content : '.$_POST['message'].' reply with <a href=\"mailto:'.$_POST['mail'].'\">'.$_POST['mail'].'</a>';
    mail('erwan.roussel@openincubator.tech', 'New landing page message', $message);
} else {
    header('location', '//open-incubator.github.io');
};