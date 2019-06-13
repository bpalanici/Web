<?php

	require_once('Model/modelVisitedEvents.php');

	function controllerGetCfVisited() {
		return getVisitedCf();
	}

	function controllerGetMeetupVisited() {
		return getVisitedMeetup();
	}

?>