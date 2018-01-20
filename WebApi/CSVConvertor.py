def toCSV(path):
	f=open(path)
	output=''
	for line in f.readlines():
		output+=line.replace("\t",",")+"\n"
	return output
