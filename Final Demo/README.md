Spark query:

tF = sc.textFile("s3://aadhaar-data/*.csv")
pairs = tF.map(lambda x:(x.split(",")[3],x.split(",")[6]))
pairs = pairs.map(lambda x:(x,1))
pairs

