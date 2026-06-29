<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cosmic Calendar</title>
    <!-- All styling for the final output page is included below -->
    <style>
        body { font-family: sans-serif; background-color: #1a202c; color: #e2e8f0; }
        .container { max-width: 800px; margin: 2rem auto; padding: 2rem; background-color: #2d3748; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        h1 { text-align: center; color: #9f7aea; }
        .calendar-grid { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
        .day-box { width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 5px; background-color: #4a5568; font-size: 1.2rem; }
        .cosmic-name { background-color: #9f7aea; color: #fff; transform: scale(1.1); box-shadow: 0 0 15px #9f7aea; }
        .cosmic-month { border: 2px solid #f6e05e; }
        .cosmic-both { background-color: #ed8936; color: #fff; border: 2px solid #f6e05e; transform: scale(1.1); box-shadow: 0 0 15px #ed8936; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cosmic Calendar</h1>
        <div class="calendar-grid">
            <?php
                // --- YOUR ENTIRE PHP SCRIPT GOES HERE ---
            ?>
        </div>
    </div>
</body>
</html>



$firstName = 'Louis';
$jsonString = file_get_contents('https://timeapi.io/api/time/current/zone?timeZone=America%2FLos_Angeles');
$data = json_decode($jsonString);

$nameLength = strlen($firstName);
$dateTimeString = $data->dateTime;

$date = new DateTime($dateTimeString);
$dayOfYear = (int)$date->format('z') + 1;
$month = $data->month;



for ($i = $nameLength; $i <= $dayOfYear; $i++) {
    $cssClass = 'day-box';
    if ($i % $nameLength == 0 && $i % $month == 0) {
        $cssClass .= ' cosmic-both';
    }
    else if ($i % $nameLength == 0) {
        $cssClass .= ' cosmic-name';
    }
    else if ($i % $month == 0) {
        $cssClass .= ' cosmic-month';
    }

    echo "<div class='$cssClass'>$i</div>";



}

/* I started initializing all my variables as instructed, and setting up the basic for loop
, then I pushed to keep track of my progress. I realized I forgot a lot of $s when referencing
variables, so I had to go back and fix that. I also realized I was using the wrong variable for
 the dateTimeString, so I had to fix that as well. 

*/