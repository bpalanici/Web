<?php
   require_once('../Model/updateCfStatisticsModel.php');
   echo "<script type='text/javascript'>alert('Status of update : " . updateCfStatus() . "');window.location=' ../eventsRecommendations.php'</script>";
?>