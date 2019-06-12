<?php

	require_once('Model/modelEvents.php');
	require_once('Model/profileModel.php');

	function controllerGetRecommendationsCf() {
		addRecommendationsCf();
		return getAllRecommendationsCf();
	}

	function controllerGetRecommendationsMeetup() {
		addRecommendationsMeetup();
		return getAllRecommendationsMeetup();
	}

	function controllerGetRepos(){
		return printRepos();
	}

?>