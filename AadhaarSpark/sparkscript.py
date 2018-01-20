import pyspark
import sys
import time

def ByState(outputPath):
	sTime = time.time()
	pairs = tF.map(lambda x:(x.split(",")[2],int(x.split(",")[8])))
	pairs = pairs.groupByKey().mapValues(sum).collect()
	eTime = time.time()
	with open(outputPath, "w") as myfile:
		myfile.write('\n'+str(sTime))
	with open(outputPath,"a") as fp:
		fp.write('\n'.join('%s,%s' % x for x in pairs))
	with open(outputPath, "a") as myfile:
		myfile.write('\n'+str(eTime))

def ByEnrollA(outputPath):
	sTime = time.time()
	pairs = tF.map(lambda x:(x.split(",")[1],int(x.split(",")[8])))
	pairs = pairs.groupByKey().mapValues(sum).collect()
	eTime = time.time()
	with open(outputPath, "w") as myfile:
		myfile.write('\n'+str(sTime))
	with open(outputPath,"w") as fp:
		fp.write('\n'.join('%s,%s' % x for x in pairs))
	with open(outputPath, "a") as myfile:
		myfile.write('\n'+str(eTime))

def ByGenderF(outputPath):
	sTime = time.time()
	pairs = tF.map(lambda x:(x.split(",")[3],x.split(",")[6]))
	pairs = pairs.map(lambda x:(x,1))
	femaleP = pairs.filter(lambda x:x[0][1]=='F')
	femaleP = femaleP.groupByKey().mapValues(sum).take(10)
	eTime = time.time()
	with open(outputPath, "w") as myfile:
		myfile.write('\n'+str(sTime))
	with open(outputPath,"w") as fp:
		fp.write('\n'.join('%s,%s' % x for x in femaleP))
	with open(outputPath, "a") as myfile:
		myfile.write('\n'+str(eTime))

def ByGenderM(outputPath):
	sTime = time.time()
	pairs = tF.map(lambda x:(x.split(",")[3],x.split(",")[6]))
	pairs = pairs.map(lambda x:(x,1))
	maleP = pairs.filter(lambda x:x[0][1]=='M')
	maleP = maleP.groupByKey().mapValues(sum).take(10)
	eTime = time.time()
	with open(outputPath, "w") as myfile:
		myfile.write('\n'+str(sTime))
	with open(outputPath,"w") as fp:
		fp.write('\n'.join('%s,%s' % x for x in maleP))
	with open(outputPath, "a") as myfile:
		myfile.write('\n'+str(eTime))

def ByStateRej(outputPath):
	sTime = time.time()
	pairs = tF.map(lambda x:(x.split(",")[2],int(x.split(",")[9])))
	sReject = pairs.filter(lambda x:x[1]==1)
	sReject = sReject.groupByKey().mapValues(sum).collect()
	eTime = time.time()
	with open(outputPath, "w") as myfile:
		myfile.write('\n'+str(sTime))
	with open(outputPath,"w") as fp:
		fp.write('\n'.join('%s,%s' % x for x in sReject))
	with open(outputPath, "a") as myfile:
		myfile.write('\n'+str(eTime))

def ByAge(outputPath):
	sTime = time.time()
	pairs = tF.map(lambda x:('NULL' if (x.split(",")[7])=='NULL' else ('0-10' if int(x.split(",")[7])<=10 else \
	('10-20' if int(x.split(",")[7])<=20 else ('20-30' if int(x.split(",")[7])<=30 else ('30-40' if int(x.split(",")[7])<=40 else \
	('40-50' if int(x.split(",")[7])<=50 else ('50-60' if int(x.split(",")[7])<=60 else ('60+' if int(x.split(",")[7])>60 else ''\
	)))))))  ,1))
	pairs = pairs.groupByKey().mapValues(sum).collect()
	eTime = time.time()
	with open(outputPath, "w") as myfile:
		myfile.write('\n'+str(sTime))
	with open(outputPath,"w") as fp:
		fp.write('\n'.join('%s,%s' % x for x in pairs))
	with open(outputPath, "a") as myfile:
		myfile.write('\n'+str(eTime))

def ByStateAgeE(outputPath):
	sTime = time.time()
	pairs = tF.map(lambda x:((x.split(",")[2],('NULL' if (x.split(",")[7])=='NULL' else ('0-10' if int(x.split(",")[7])<=10 else \
	('10-20' if int(x.split(",")[7])<=20 else ('20-30' if int(x.split(",")[7])<=30 else ('30-40' if int(x.split(",")[7])<=40 else \
	('40-50' if int(x.split(",")[7])<=50 else ('50-60' if int(x.split(",")[7])<=60 else ('60+' if int(x.split(",")[7])>60 else ''\
	))))))) )),(1 if (x.split(",")[10]=='1' or x.split(",")[11]=='1') else 0)))
	pairs = pairs.groupByKey().mapValues(sum).collect()
	eTime = time.time()
	with open(outputPath, "w") as myfile:
		myfile.write('\n'+str(sTime))
	with open(outputPath,"w") as fp:
		fp.write('\n'.join('%s,%s' % x for x in pairs))
	with open(outputPath, "a") as myfile:
		myfile.write('\n'+str(eTime))

#main starts here
sc = pyspark.SparkContext()
tF = sc.textFile("hdfs://localhost:9000/AadhaarData/*.csv")

action=sys.argv[1]
output=sys.argv[2]

if(action=="state"):
	ByState(output)
elif(action=="enrollA"):
	ByEnrollA(output)
elif(action=="genderF"):
	ByGenderF(output)
elif(action=="genderM"):
	ByGenderM(output)
elif(action=="stateRej"):
	ByStateRej(output)
elif(action="ageG"):
	ByAge(output)
elif(action=="stateAgeEmail")
	ByStateAgeE(output)
