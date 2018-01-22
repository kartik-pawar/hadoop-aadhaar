<%php
	$queryLang=$_POST["queryLang"];
	$action=$_POST["action"];

	switch($queryLang){
		case "mr":
			mapreduce($action);
			break;
		case "hive":
			hive($action);
			break;
		case "spark":
			spark($action);
			break;
	}

	
	function mapreduce($action){
		shell_exec('$HADOOP_HOME/bin/hadoop jar /home/shweta/Documents/aadhaar-project/hadoop-aadhaar/AadhaarMapReduce/aadhaar.jar '.$action.' /AadhaarData /output/'.$action);
		shell_exec('$HADOOP_HOME/bin/hadoop fs -get /output/'.$action.' /home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Outputs/MR/');

		$output=fopen('/home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Outputs/MR/'.$action.'/part-r-00000')
		return fgets($output);
	}

	function hive($action){
		
	}

	function spark($action){
		
	}

	function topTen(){
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
%>
