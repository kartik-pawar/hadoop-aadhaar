from bottle import route, run, template
import subprocess

@route('/mr/<action>')
def mr(action):
	hive = "$HADOOP_HOME/bin/hive -f /home/shweta/Documents/aadhaar-project/hadoop-aadhaar/AadhaarHive/queries/AadhaarCount-"+action+".hql > /home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Outputs/Hive/"+action+".out"
	s=subprocess.Popen(hive, stdout=subprocess.PIPE, shell=True)
	s.wait()
	f=open("/home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Outputs/Hive/"+action+".out")
	data=f.read()
	return template(data)

run(host='localhost', port=8082)







