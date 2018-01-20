from bottle import route, run, template
from CSVConvertor import toCSV
import subprocess

@route('/mr/<action>')
def mr(action):
	mr = "$HADOOP_HOME/bin/hadoop jar /home/shweta/Documents/aadhaar-project/hadoop-aadhaar/AadhaarMapReduce/aadhaar.jar "+action+" /AadhaarData /output/"+action
	s1=subprocess.Popen(mr, stdout=subprocess.PIPE, shell=True)
	s1.wait()

	fetchData="$HADOOP_HOME/bin/hadoop fs -get /output/"+action+" /home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Outputs/MR/"
	s2=subprocess.Popen(fetchData, stdout=subprocess.PIPE, shell=True)
	s2.wait()

	output=toCSV("/home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Outputs/MR/"+action+"/part-r-00000")

	return template(output)

run(host='localhost', port=8082)







