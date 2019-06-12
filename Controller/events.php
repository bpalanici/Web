<?php

	require_once('Model/modelEvents.php');
	function controllerGetRecommendations() {
		addRecommendationsCf();
		addRecommendationsMeetup();
		return getAllRecommendations();
	}


?>