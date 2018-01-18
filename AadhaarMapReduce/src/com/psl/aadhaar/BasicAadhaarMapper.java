package com.psl.aadhaar;

import java.io.IOException;
import java.util.StringTokenizer;

import org.apache.hadoop.conf.Configuration;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Mapper; 


public class BasicAadhaarMapper extends Mapper<Object, Text, Text, IntWritable>{

	private Text word = new Text();
    private final static IntWritable one = new IntWritable(1);
    private String row_id;
    
    @Override
    protected void setup(Context context) {
        Configuration c = context.getConfiguration();
        row_id = c.get("rowId");
    }
    
    public void map(Object key, Text value, Context context
                    ) throws IOException, InterruptedException {
    	
      StringTokenizer itr = new StringTokenizer(value.toString(),",");

    	  int i=0;
    	  while(i<Integer.parseInt(row_id))
    	  {
    		  i++;
    		  itr.nextToken();
    	  }
    	  word.set(itr.nextToken());
    	  context.write(word, one);
    
    }

}
