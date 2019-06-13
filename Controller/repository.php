<?php

require_once('Model/repositoryModel.php');

function giveError($msg){
	return '<div class="error">
				<div class="error-img">
					<img src="Images/error.png" alt="Parameter invalid" width="200px">
				</div>

				<div class="error-msg">
					' . $msg . '
				</div>
			</div>';
}

function controllerGetScores(){
	if(isset($_GET['id'])){
		$result = getScores($_GET['id']);
		if($result == 1){
			return giveError("We couldn't find a language that we support. Try a repo with python or java!");
		}

		return $result;
	}

	return giveError("No GET parameter in URL");
}


?>