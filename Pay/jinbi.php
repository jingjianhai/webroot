<?php
require("connect.php");
echo("dddddddddddddd \n");
exit;
$para['order'] = $id;
$para['userId'] = 1;
$para['goldnum'] = 1;
$para['diamond'] = 1;
$para['deposit'] = 1;
$para['type'] = 1;
$url = "http://118.178.123.190:9002";
$result = curlPOST2($url, json_encode($para)); 
exit;

$id = $_GET['id'];
$jinbi = get_jinbi($id,$conn);
//$url = get_url($conn);
$sql = "select config_value from config where config_name='NOTICE_IP'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$url = $row['config_value'];
$url = "118.178.123.190:9002";
$url = "118.178.123.190:9002";
//$url = "113.91.173.211:9002";
//echo $url."<br>"; exit;
echo $url ;
if (!empty($jinbi)){
	$para = array();
	if ($jinbi['type']==2){
		$para['userId'] = (int)$jinbi['user_id'];
		$para['type'] = 9;
	}else{
		$para['order'] = $id;
		$para['userId'] = (int)$jinbi['user_id'];
		$para['goldnum'] = (int)$jinbi['gold'];
		$para['diamond'] = (int)$jinbi['diamond'];
		$para['deposit'] = (int)$jinbi['deposit'];
		$para['type'] = 1;
		
	}

	  

	echo json_encode($para);
	//exit;
	//$result = curlPOST2($url, json_encode($para));   
}
   				
?>