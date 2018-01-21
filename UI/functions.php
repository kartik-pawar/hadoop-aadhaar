<?php

header("Content-Type: application/json");

    include 'api.php';
if(isset($_POST["func"]) && !empty($_POST["func"])){
	switch ($_POST["func"]) {

		case 'toptendisttmale':
        topTenDisttMale();
        break;
        case 'toptendisttfemale':
        topTenDisttFemale();
        break;
    default:
		$response = array("error" => TRUE);
		$response["error_msg"] = "Function name not defined.";
		echo json_encode($response);
		break;
	}

}
else{
	$response = array("error" => TRUE);
	$response["error_msg"] = "Function name missing.";
	echo json_encode($response);
}

//*********************************************************************//
//*********************************************************************//
//**************************** Functions Start ************************//
//*********************************************************************//
//*********************************************************************//

function topTenDisttMale(){

    sleep(2);
    $results = topTenMale();

	$response = array("error" => FALSE);
	
    $response["male"] = $results;
	
	echo json_encode($response);

}

function topTenDisttFemale(){

    sleep(2);
    $results = topTenFemale();

	$response = array("error" => FALSE);
	
    $response["female"] = $results;
	
	echo json_encode($response);

}
?>