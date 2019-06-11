<?php

	require_once('Model/modelEvents.php');
	function controllerGetRecommendations() {
		return getRecommendationsCf() . getRecommendationsMeetup();
	}


?>