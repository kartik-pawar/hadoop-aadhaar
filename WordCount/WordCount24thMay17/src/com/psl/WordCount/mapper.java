package com.psl.WordCount;

import java.io.IOException;
import java.util.StringTokenizer;

import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Mapper;

public class mapper extends Mapper<Object, Text, Text, IntWritable> {
	
	private final static Text word = new Text();
	
	// 0, One Two Three
	
	// One, 1
	// Two, 1
	// Three, 1
	@Override
	protected void map(Object key, Text value, Context context)
			throws IOException, InterruptedException {
		
		StringTokenizer tokens = new StringTokenizer(value.toString());
		
		while(tokens.hasMoreElements()){
			// One, 
			word.set(tokens.nextToken());
			context.write(word, new IntWritable(1));
		}	
	}

}
