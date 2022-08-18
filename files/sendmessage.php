<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$token = "5481439869:AAGgv5bck-moSKo6BxAVlE5EO2w-3etc77I";
$chat_id = "-795838631";
$message = "Вам пришло сообщение от:";
$arr = array (
	'%0AИмя: ' => $name,
	'%0AТелефон: ' => $phone
);

foreach ($arr as $key => $value) {
	$message .= "<b>".$key."</b>".$value;
}

if ($sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}","r")) {
	$res = "Ok";
} else {
	$res = "NO";
}

$response = ["message" => $res];
header('Content-type: application/json');
echo json_encode($response);
?>