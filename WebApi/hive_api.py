from bottle import route, run, template
from CSVConvertor import toCSV
import subprocess

@route('/hive/<action>')
def hive(action):
	hive = "$HIVE_HOME/bin/hive -f /home/shweta/Documents/aadhaar-project/hadoop-aadhaar/AadhaarHive/queries/AadhaarCount-"+action+".hql > /home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Outputs/Hive/"+action+".out"
	s=subprocess.Popen(hive, stdout=subprocess.PIPE, shell=True)
	s.wait()

	output=toCSV("/home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Outputs/Hive/"+action+".out")
	return template(output)

run(host='localhost', port=8080)







