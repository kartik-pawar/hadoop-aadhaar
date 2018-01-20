from bottle import route, run, template
import subprocess

@route('/spark/<action>')
def df(action):
    	spark = "pyspark /home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Spark/sparkscript.py "+action+" /home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Outputs/Spark/"+action+".out"
	s=subprocess.Popen(spark, stdout=subprocess.PIPE, shell=True)
	s.wait()
	f=open("/home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Outputs/Spark/"+action+".out")
	data=f.read()
	return template(data)

run(host='localhost', port=8081)


