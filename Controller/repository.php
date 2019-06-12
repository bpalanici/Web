<?php

function getDataOfRepo(){
	$err = 0;

	if(isset($_GET['id'])){
		if(isset($_SESSION['repo_' . $_GET['id']])){
			$repo = $_SESSION['repo_' . $_GET['id']];
			$url = $repo['url'];
		}else{
			$err = 1;
		}
	}else{
		$err = 1;
	}

	if($err == 1){
		return '<div class="error">
					<div class="error-img">
						<img src="Images/error.png" alt="Parameter invalid" width="200px">
					</div>

					<div class="error-msg">
						Something went wrong..
					</div>
				</div>';
	}else{
		return $url;
	}
}


?>