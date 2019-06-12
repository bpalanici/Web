<?php

	require_once('Model/modelEvents.php');
	require_once('Model/profileModel.php');

	function controllerGetRecommendations() {
		addRecommendationsCf();
		addRecommendationsMeetup();
		return getAllRecommendations();
	}


	function controllerGetRepos(){
		return printRepos();
	}

?>