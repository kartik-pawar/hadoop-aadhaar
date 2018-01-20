package com.psl.aadhaar;

import org.apache.hadoop.conf.Configuration;
import org.apache.hadoop.conf.Configured;
import org.apache.hadoop.fs.Path;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Job;
import org.apache.hadoop.mapreduce.lib.input.FileInputFormat;
import org.apache.hadoop.mapreduce.lib.output.FileOutputFormat;
import org.apache.hadoop.util.Tool;
import org.apache.hadoop.util.ToolRunner;


public class AadhaarMain extends Configured implements Tool{

		@Override
		public int run(String[] arg0) throws Exception {
			
			if (arg0.length != 3) {
			      System.err.println("Usage: wordcount <func> <in> <out>");
			      System.exit(2);
			    }
			
			String num="";
			Configuration conf = getConf();
			Job job=new Job(conf, "word count");

			switch(arg0[0])
			{
			case "byState" : num="3";
							job.setMapperClass(BasicAadhaarMapper.class);
							job.setReducerClass(AadhaarReducer.class);
							break;
							
			case "byEnrollmentAgency" : num="2";
							job.setMapperClass(BasicAadhaarMapper.class);
							job.setReducerClass(AadhaarReducer.class);
							break;
										
			case "byAge" : num="8";
							job.setMapperClass(AadhaarMapperForAge.class);
							job.setReducerClass(AadhaarReducer.class);
							break;
							
			case "rejectedIdentitiesByStates" : num="10,3";
							job.setMapperClass(AadhaarMapper.class);
							job.setReducerClass(AadhaarReducer.class);
							break;
							
			case "top10MaxIdentitiesMale" : num="7,4";
							job.setMapperClass(AadhaarMapperForMale.class);
							job.setReducerClass(AadhaarReducer.class);
							break;
							
			case "top10MaxIdentitiesFemale" : num="7,4";
							job.setMapperClass(AadhaarMapperForFemale.class);
							job.setReducerClass(AadhaarReducer.class);
							break;
							
			case "MobileNumberOrEmailIdByStateAndAge" : num="11,12,8,3";
							job.setMapperClass(AadhaarMapperLastQuery.class);
							job.setReducerClass(AadhaarReducer.class);
							break;
			}
			
			
			job.getConfiguration().set("rowId", num);			
		    job.setJarByClass(AadhaarMain.class);
		    
		    
		    job.setOutputKeyClass(Text.class);
		    job.setOutputValueClass(IntWritable.class);
		    
		    FileInputFormat.addInputPath(job, new Path(arg0[1]));
		    FileOutputFormat.setOutputPath(job, new Path(arg0[2]));
		    
			return job.waitForCompletion(true) ? 0 : 1;
		}
		
		
		 public static void main(String[] args) throws Exception {		    
			    
			    int res=ToolRunner.run(new AadhaarMain(), args);
			    System.exit(res);
			    
			  }

	}