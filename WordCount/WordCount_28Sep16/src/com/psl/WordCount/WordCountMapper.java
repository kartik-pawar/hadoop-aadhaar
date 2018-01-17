package com.psl.WordCount;
import java.util.StringTokenizer;

import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Mapper;

public class WordCountMapper extends Mapper<Object, Text, Text, IntWritable> {
	private static final IntWritable one = new IntWritable(1);
	private Text word;
	
	//0, One
	
	protected void map(Object key, Text value, org.apache.hadoop.mapreduce.Mapper<Object,Text,Text,IntWritable>.Context context) throws java.io.IOException ,InterruptedException {
		StringTokenizer itr = new StringTokenizer(value.toString());
		while(itr.hasMoreElements()){
			word.set(itr.nextToken());
			context.write(word, one);
			
		}
	}

}
