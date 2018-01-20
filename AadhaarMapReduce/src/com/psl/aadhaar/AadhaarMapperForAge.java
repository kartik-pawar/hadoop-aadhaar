package com.psl.aadhaar;

import java.io.IOException;
import java.util.StringTokenizer;

import org.apache.hadoop.conf.Configuration;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Mapper; 


public class AadhaarMapperForAge extends Mapper<Object, Text, Text, IntWritable>{

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
    	  while(i<Integer.parseInt(row_id)-1)
    	  {
    		  i++;
    		  itr.nextToken();
    	  }
    	  
    	  String nullValue=itr.nextToken();
    	  if(nullValue.equals("NULL"))
    	  	word.set("NULL");
    	  else
    	  {
    		  int age=Integer.parseInt(nullValue);
        	  
        	  if(age>=0 && age<10)
        		  word.set("0-10");
        	  
        	  else if(age>=10 && age<20)
        		  word.set("10-20");
        	  
        	  else if(age>=20 && age<30)
        		  word.set("20-30");
        	  
        	  else if(age>=30 && age<40)
        		  word.set("30-40");
        	  
        	  else if(age>=40 && age<50)
        		  word.set("40-50");
        	  
        	  else if(age>=50 && age<60)
        		  word.set("50-60");
        	  
        	  else if(age>=60)
        		  word.set("60+");  
    	  }
    	  
    	  context.write(word, one);
    
    }

}
