<?php
  $var1= $_GET['id'];
  
  $fileContent = "$var1";
  
  file_put_contents("test.txt", null);
  $fileStatus = file_put_contents('test.txt',$fileContent,FILE_APPEND);
  if($fileStatus != false)
  {
     echo "SUCCESS: data written to file";
	}
	else
	{
	echo "FAIL: could not write to file";
	}
    
	?>
