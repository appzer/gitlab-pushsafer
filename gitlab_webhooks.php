<?php 
$url='';
function array2string($data){
    $log_a = "";
    foreach ($data as $key => $value) {
		
		if(is_array($value)) {
			if(strpos($key,'_link')===false){
				$log_a .= "[b]".$key."[/b]"."\n". array2string($value). "\n";
			}
		} else {
			if(strpos($key,'url')===false && strpos($key,'vatar')===false && $value!=''){
				$log_a .= "[b]".$key."[/b]=".$value."\n";
			} else if($key=='web_url' && $url==''){
				$url = $value;
			}
		}
    }
    return $log_a;
}

if(isset($_GET['k'])){
	$private_key = filter_input(INPUT_GET, 'k', FILTER_SANITIZE_STRING);
	$icon = filter_input(INPUT_GET, 'i', FILTER_SANITIZE_STRING);
	$sound = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);
	$vibration = filter_input(INPUT_GET, 'v', FILTER_SANITIZE_STRING);
	$time2live = filter_input(INPUT_GET, 'l', FILTER_SANITIZE_STRING);
	
	foreach (getallheaders() as $name => $value) {
		if($name=='X-Gitlab-Event'){
			$title = 'Gitlab-Event: '.str_replace('_',' ',$value);
			$url_title = 'Open '.str_replace('_',' ',$value);
		}
	}

	$message = array2string(json_decode(file_get_contents('php://input'),true));
			
	if($title=='') { $title = 'Gitlab Notification';}
	if($message=='') { $message = 'no content ';}
	
	$pushurl = 'https://www.pushsafer.com/data/push-send';
	$data = array(
		'k' => $private_key,
		'm' => $message,
		't' => $title,
		'i' => $icon,
		's' => $sound,
		'v' => $vibration,
		'l' => $time2live,
		'u' => $url,
		'ut' => $url_title
	);
	$options = array(
		'http' => array(
		'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		'method'  => 'POST',
		'content' => http_build_query($data)
		)
	);
	
	$context  = stream_context_create($options);
	$result = file_get_contents($pushurl, false, $context);	
	echo $result;
}
exit();
?>