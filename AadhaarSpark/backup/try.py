import pyspark
sc = pyspark.SparkContext()
tF = sc.textFile("hdfs://localhost:9000/AadhaarData/*.csv")
pairs = tF.map(lambda x:(x.split(",")[3],x.split(",")[6]))
pairs = pairs.map(lambda x:(x,1))
femaleP = pairs.filter(lambda x:x[0][1]=='F')
femaleP = femaleP.groupByKey().mapValues(sum).collect()
with open("sampleOutput2.csv","w") as fp:
	fp.write('\n'.join('%s %s' % x for x in femaleP))
