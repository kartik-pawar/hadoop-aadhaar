<?php

header("Content-Type: application/json");

    //include 'api.php';
if(isset($_POST["func"]) && !empty($_POST["func"])){
	switch ($_POST["func"]) {

		case 'toptendisttmale':
        topTenDisttMale();
        break;
        case 'toptendisttfemale':
        topTenDisttFemale();
		break;
		case 'agewisecount':
        ageWiseCount();
        break;
		case 'enrollmentagenciescount':
        enrollmentAgenciesCount();
        break;
        case 'streaming':
        streaming();
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
//*********************************************************************//
//*********************************************************************//
function topTenDisttFemale(){

    sleep(2);
    $results = topTenFemale();

	$response = array("error" => FALSE);
	
    $response["female"] = $results;
	
	echo json_encode($response);

}
//*********************************************************************//
//*********************************************************************//
function ageWiseCount(){

    sleep(2);
    $results = ageWise();

	$response = array("error" => FALSE);
	
    $response["ageWise"] = $results;
	
	echo json_encode($response);

}
//*********************************************************************//
//*********************************************************************//
function enrollmentAgenciesCount(){

    //sleep(2);
    $results = enrollmentAgencies();

	$response = array("error" => FALSE);
	
    $response["enrollmentAgencies"] = $results;
	
	echo json_encode($response);

}
//*********************************************************************//
//*********************************************************************//

function streaming(){
    $target_file = "../jsons/livedata.json";
    echo file_get_contents($target_file);
    //$json = array("State" => generateRandomString(7), "Count" => generateRandomNum(4));
    $json2 = json_decode(file_get_contents("../jsons/state.json"), true);

    $index = rand(0,36);

    file_put_contents($target_file, json_encode($json2["data"][$index]));
    
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generateRandomNum($length = 10) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//*********************************************************************//
//*********************************************************************//

//*********************************************************************//
//*********************************************************************//

//*********************************************************************//
//*********************************************************************//

//*********************************************************************//
//*********************************************************************//

?>
