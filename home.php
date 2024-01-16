<!-- index.php -->

<?php
function checkTime($i) {
    return ($i < 10) ? "0" . $i : $i;
}

function getTime() {
    $currentTime = date("H:i:s");
    return $currentTime;
}

function getDay() {
    $currentDay = date("l");
    $currentDate = date("d-m-Y");
    return [$currentDay, $currentDate];
}

// WeatherAPI logic
$apiKey = "84bedfaec65643489e7114518241501";
$weatherUrl = "https://api.weatherapi.com/v1/current.json?key={$apiKey}&q=Nairobi&aqi=no";

$weatherData = file_get_contents($weatherUrl);
$weatherData = json_decode($weatherData, true);

$temperature = $weatherData['current']['temp_c'];
$weatherCondition = $weatherData['current']['condition']['text'];

$currentTime = getTime();
$currentDayAndDate = getDay();
$currentDay = $currentDayAndDate[0];
$currentDate = $currentDayAndDate[1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./style.css" rel="stylesheet" />
    <title>BBS Live Screen</title>
</head>
<body>
    <div class="screen">
        <div class="partition-1">
            <img src="./slide_1.png" alt="" />
            <div class="weather-div">
                <p class='temp'><?php echo $temperature; ?>°C</p>
                <p class='weather'><?php echo $weatherCondition; ?></p>
            </div>
            <div class="time-div">
                <p><?php echo $currentTime; ?></p>
                <div class="date-div">
                    <p><?php echo $currentDay; ?></p>
                    <p style="opacity: 33%">|</p>
                    <p><?php echo $currentDate; ?></p>
                </div>
            </div>
        </div>

        <div class="partition-2">
            <img src="./gold_bar.png" alt="" />
        </div>

        <div class="partition-3">
            <img src="./bbs-logo.png" alt="" />
            <p id="txt"></p>
        </div>
    </div>
</body>
</html>
