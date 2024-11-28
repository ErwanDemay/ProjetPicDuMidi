<?php
include("./modeles/Parking.php");
include("./modeles/DAO/ParkingDAO.php");

if (isset($_GET['action'])){
    $action=filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else {
$action= "consultationParking";}

switch ($action){
    
    case 'consultationParking'  :
                       $connexionBD = new ParkingDAO();
                       $lesParkings = $connexionBD->getLesParkings();
                       include("./vues/v_consultationParking.php");
                       break;
    }