<html>
    <head>
    <title>My first PHP Website</title>
    </head>
    <body>
        <?php

			//next example will recieve all messages for specific conversation
$service_url = 'http://localhost:8080/getComPort';
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';
print json_encode($decoded);
//var_export($decoded->response);
        ?>
    </body>
</html>