<?php 
session_start();

if($_SESSION['level']==1){
      include 'includes/staff_leftbar.php'; 
    }else if($_SESSION['level']==2){
      include 'includes/leftbar.php';
    }?>