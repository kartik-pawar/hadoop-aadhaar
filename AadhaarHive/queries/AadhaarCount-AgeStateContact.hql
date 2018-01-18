CREATE DATABASE IF NOT EXISTS aadhaardb;

SELECT unix_timestamp(current_timestamp);

CREATE EXTERNAL TABLE IF NOT EXISTS aadhaardb.aadhaardata(registrar STRING, enroll_agency STRING, state STRING, district STRING, subdistrict STRING, pincode INT, gender STRING, age INT, card_generated INT, card_rejected INT, has_email INT, has_mobile INT) 
ROW FORMAT DELIMITED FIELDS 
TERMINATED BY ',' 
LINES TERMINATED BY '\n'
LOCATION '/AadhaarData';

SELECT
state,
CASE
WHEN age BETWEEN 0 AND 10 THEN '0-10'
WHEN age BETWEEN 10 AND 20 THEN '10-20'
WHEN age BETWEEN 20 AND 30 THEN '20-30'
WHEN age BETWEEN 30 AND 40 THEN '30-40'
WHEN age BETWEEN 40 AND 50 THEN '40-50'
WHEN age BETWEEN 50 AND 60 THEN '50-60'
WHEN age>60 THEN '60+'
END as age_range,
count(*) as count
FROM aadhaardb.aadhaardata
GROUP BY
CASE
WHEN age BETWEEN 0 AND 10 THEN '0-10'
WHEN age BETWEEN 10 AND 20 THEN '10-20'
WHEN age BETWEEN 20 AND 30 THEN '20-30'
WHEN age BETWEEN 30 AND 40 THEN '30-40'
WHEN age BETWEEN 40 AND 50 THEN '40-50'
WHEN age BETWEEN 50 AND 60 THEN '50-60'
WHEN age>60 THEN '60+'
END,state
ORDER BY state,age_range;

SELECT unix_timestamp(current_timestamp);

