<?php

if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else {
$action= "consultationMentions";}

switch ($action){
    case 'consultationMentions'  :
                       include("./vues/v_consultationMentionsLegales.php");
                       break;
    }