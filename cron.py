import subprocess

action="AgeStateContact"

hive = "$HIVE_HOME/bin/hive -f /home/shweta/Documents/aadhaar-project/hadoop-aadhaar/AadhaarHive/queries/AadhaarCount-"+action+".hql >/home/shweta/Documents/aadhaar-project/hadoop-aadhaar/Outputs/Hive/"+action+"Output.out"

print hive

subprocess.Popen(hive, stdout=subprocess.PIPE, shell=True);

