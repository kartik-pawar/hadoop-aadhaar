package com.psl.WordCount;

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

public class WordCount extends Configured implements Tool{
	
	
	@Override
	public int run(String[] arg0) throws Exception {
		
		if (arg0.length != 3) {
		      System.err.println("Usage: wordcount <func> <in> <out>");
		      System.exit(2);
		    }
		
		String num="";
		switch(arg0[0])
		{
		case "byState" : num="3";
						break;
						
		case "byEnrollmentAgency" : num="2";
						break;
									
		case "byAge" : num="8";
						break;
						
		/*case "rejectedIdentitiesByStates" : num="10 3";
						break;
						
		case "top10MaxIdentitiesMF" : num="7 4";
						break;
						
		case "MobileNumberOrEmailIdByStateAndAge" : num="11 12 3 8";
						break;*/
		}
		
		System.out.println("\n\n\n\n\n\n\n\n\n\nValue of num received is : "+num+"\n\n\n\n\n\n\n\n\n\n");
		Configuration conf = getConf();
	    conf.set("rowId", num);

		Job job=new Job(conf, "word count");
	    job.setJarByClass(WordCount.class);
	    job.setMapperClass(WordCountMapper.class);
	    job.setReducerClass(WordCountReducer.class);
	    
	    job.setOutputKeyClass(Text.class);
	    job.setOutputValueClass(IntWritable.class);
	    
	    FileInputFormat.addInputPath(job, new Path(arg0[1]));
	    FileOutputFormat.setOutputPath(job, new Path(arg0[2]));
	    
		return job.waitForCompletion(true) ? 0 : 1;
	}
	
	 public static void main(String[] args) throws Exception {
		    
		    
		    int res=ToolRunner.run(new Configuration(), new WordCount(), args);
		    System.exit(res);
		    
		  }

}


