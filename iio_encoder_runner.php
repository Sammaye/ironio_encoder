<?php
require("IronWorker.class.php");
$iw = new IronWorker('config.ini');


$name = "iio_worker-php";


//# Creating zip package.
$zipName = "ffmpeg.zip";
IronWorker::zipDirectory(dirname(__FILE__)."/workers/ffmpeg", $zipName, true);


//# Posting package.
// Either one of the lines depending upon which you are encoding
//$res = $iw->postCode('mp4_encoder.php', $zipName, $name);
$res = $iw->postCode('ogg_encoder.php', $zipName, $name);

# Pass any data you want to a worker task.
$payload = array(
	'file_name' => '4fa54b3ccacf54cb250000d8.divx', // You will need to get your own input file
	'aws_key' => 'aws_key',
	'aws_secret' => 'aws_secret',
	'bucket' => 's3_bucket'
);

# Adding a new task.
$task_id = $iw->postTask($name, $payload);
echo "task_id = $task_id \n";

sleep(25);

$details = $iw->getTaskDetails($task_id);
print_r($details);
if ($details->status != 'queued'){
    $log = $iw->getLog($task_id);
    print_r($log);
}
