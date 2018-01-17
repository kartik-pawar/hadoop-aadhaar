CREATE DATABASE IF NOT EXISTS aadhaardb;
USE aadhaardb;


SELECT unix_timestamp(current_timestamp);

CREATE TABLE IF NOT EXISTS aadhaardata(registrar STRING, enroll_agency STRING, state STRING, district STRING, subdistrict STRING, pincode INT, gender STRING, age INT, card_generated INT, card_rejected INT, has_email INT, has_mobile INT) 
ROW FORMAT DELIMITED FIELDS 
TERMINATED BY ',' 
LINES TERMINATED BY '\n' 
STORED AS TEXTFILE; 

LOAD DATA INPATH '/AadhaarData' OVERWRITE INTO TABLE aadhaardata;

SELECT enroll_agency, COUNT(*)
FROM aadhaardata
GROUP BY enroll_agency
ORDER BY enroll_agency;

SELECT unix_timestamp(current_timestamp);


