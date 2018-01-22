<?php 
function topTenMale(){
    $target_file = "Data/10dist.csv";
    $file = fopen($target_file,"r");
    $distt = array();
    $count = array();
    while(! feof($file)){
        $feeds = fgetcsv($file);
        array_push($distt, $feeds[0]);
        array_push($count, $feeds[1]);
    }
    $result = array();
    for($i=0; $i<count($distt); $i++){
        $result["male".$i]= array("districtName" => $distt[$i], "count" => $count[$i]);
    }
    return $result;
}
function topTenFemale(){
    $target_file = "Data/10dist.csv";
    $file = fopen($target_file,"r");
    $distt = array();
    $count = array();
    while(! feof($file)){
        $feeds = fgetcsv($file);
        array_push($distt, $feeds[0]);
        array_push($count, $feeds[1]);
    }
    $result = array();
    for($i=0; $i<count($distt); $i++){
        $result["female".$i]= array("districtName" => $distt[$i], "count" => $count[$i]);
    }
    return $result;
}

function ageWise(){
    $target_file = "Data/AgeWise.csv";
    $file = fopen($target_file,"r");
    $group = array();
    $count = array();
    while(! feof($file)){
        $feeds = fgetcsv($file);
        array_push($group, $feeds[0]);
        array_push($count, $feeds[1]);
    }
    $result = array();
    for($i=0; $i<count($group); $i++){
        //$result[]= array("ageGroup" => $group[$i], "count" => $count[$i]);
       $result["ageGroup".$i]= array("ageGroup" => $group[$i], "count" => $count[$i]);
    }
    return $result;
}

function enrollmentAgencies(){
    $target_file = "Data/EnrollAgency.csv";
    $file = fopen($target_file,"r");
    $group = array();
    $count = array();
    while(! feof($file)){
        $feeds = fgetcsv($file);
        array_push($group, $feeds[0]);
        array_push($count, $feeds[1]);
    }
    $result = array();
    for($i=0; $i<count($group); $i++){
        $result[] = array("agencyName" => $group[$i], "count" => $count[$i]);
    }
    return $result;
}


?>