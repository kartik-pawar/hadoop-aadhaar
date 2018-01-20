package com.psl.aadhaar;

import java.io.IOException;
import java.util.StringTokenizer;

import org.apache.hadoop.conf.Configuration;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Mapper; 


public class AadhaarMapperLastQuery extends Mapper<Object, Text, Text, IntWritable>{

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
      String[] rowIdArray=row_id.split(",");
      String state;
      String age;
      String phoneOrEmail;
      
    	  int i=0;
    	  while(i<Integer.parseInt(rowIdArray[3])-1)
    	  {
    		  i++;
    		  itr.nextToken();  		  
    	  }
    	  state=itr.nextToken();
    	  i++;
    
    	  while(i<Integer.parseInt(rowIdArray[2])-1)
    	  {
    		  i++;
    		  itr.nextToken();  		  
    	  }
    	  age=itr.nextToken();
    	  i++;
    
    	  
    	  while(i<Integer.parseInt(rowIdArray[0])-1) 
    	  {
    		  i++;
    		  itr.nextToken();  
    	  } 
    	  phoneOrEmail=itr.nextToken();
    	  
    	  
    	  if(phoneOrEmail.equals("NULL"))
    	  {
    		  phoneOrEmail="0";
    	  }
    	  
    	  else if(Integer.parseInt(phoneOrEmail)>0)
    	  {
    		  setAge(state,age);
        	  context.write(word, one);
    	  }
    	  
    	  phoneOrEmail=itr.nextToken();
    	  if(phoneOrEmail.equals("NULL"))
    	  {
    		  phoneOrEmail="0";
    	  }
    	  else if(Integer.parseInt(phoneOrEmail)>0)
    	  {
    		  setAge(state,age);    	  
        	  context.write(word, one);
    	  }    	  
    
    }
    
    public void setAge(String state,String age)
    {
    	  if(age.equals("NULL"))
	    	  	word.set(state+" NULL");
	    	  else
	    	  {
	    		  int ageInInt=Integer.parseInt(age);
	        	  
	        	  if(ageInInt>=0 && ageInInt<10)
	        		  word.set(state+" 0-10");
	        	  
	        	  else if(ageInInt>=10 && ageInInt<20)
	        		  word.set(state+" 10-20");
	        	  
	        	  else if(ageInInt>=20 && ageInInt<30)
	        		  word.set(state+" 20-30");
	        	  
	        	  else if(ageInInt>=30 && ageInInt<40)
	        		  word.set(state+" 30-40");
	        	  
	        	  else if(ageInInt>=40 && ageInInt<50)
	        		  word.set(state+" 40-50");
	        	  
	        	  else if(ageInInt>=50 && ageInInt<60)
	        		  word.set(state+" 50-60");
	        	  
	        	  else if(ageInInt>=60)
	        		  word.set(state+" 60+");  
	    	  }
    	  
    }

}
