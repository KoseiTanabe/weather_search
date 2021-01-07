<?php
$city = $_POST['place'];
$api_key = '自分のAPIキー';
$url = 'api.openweathermap.org/data/2.5/weather?q=' . "$city" . '&appid=' . "$api_key" . '&lang=ja&units=metric';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
$data = json_decode($json, true);
//var_dump($data);
/*
echo $data['weather'][0]['main']; 
echo $data['weather'][0]['description'];
echo $data['main']['temp'];
echo $data['main']['temp_min'];
echo $data['main']['temp_max'];
*/
curl_close($ch);
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>東京の天気を取得</title>
</head>
<body>
<p>天気</p>
<?php echo $data['weather'][0]['main']; ?><br>
<p>天気の詳細</p>
<?php echo $data['weather'][0]['description']; ?><br>
<p>平均気温</p>
<?php echo $data['main']['temp']; ?><br>
<p>最低気温</p>
<?php echo $data['main']['temp_min']; ?><br>
<p>最高気温<p>
<?php echo $data['main']['temp_max']; ?>
</body>
</html>
