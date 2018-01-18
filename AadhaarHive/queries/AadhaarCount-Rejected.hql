CREATE DATABASE IF NOT EXISTS aadhaardb;

SELECT unix_timestamp(current_timestamp);

CREATE EXTERNAL TABLE IF NOT EXISTS aadhaardb.aadhaardata(registrar STRING, enroll_agency STRING, state STRING, district STRING, subdistrict STRING, pincode INT, gender STRING, age INT, card_generated INT, card_rejected INT, has_email INT, has_mobile INT) 
ROW FORMAT DELIMITED FIELDS 
TERMINATED BY ',' 
LINES TERMINATED BY '\n'
LOCATION '/AadhaarData';

SELECT state, COUNT(*)
FROM aadhaardb.aadhaardata 
WHERE card_rejected=1 
GROUP BY state;

SELECT unix_timestamp(current_timestamp);

