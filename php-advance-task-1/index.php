<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>PHP-Advance-Task-1</title>
</head>

<body>
    <div>
        <?php
        require('composer-files/vendor/autoload.php');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services');
        $result = json_decode($response->getBody());
        for ($i = 12; $i < 16; $i++) {
            if($i%2 == 0) {
            echo '<div class = "flex">';
            echo '<div class = "">';
            echo $result->data[$i]->attributes->field_secondary_title->processed;
            echo $result->data[$i]->attributes->field_services->processed;
            echo "</div>";
            $img = $result->data[$i]->relationships->field_image->links->related->href;
            $res = $client->request('GET', $img);
            $res = json_decode($res->getBody()); 
            $url = "https://ir-dev-d9.innoraft-sites.com/" . $res->data->attributes->uri->url;
            echo '<div class = "">';
            echo "<img src = '$url'/>";
            echo "</div>";
            echo "</div>";
        }
        else{
            echo '<div class = "flex">';

            $img = $result->data[$i]->relationships->field_image->links->related->href;
            $res = $client->request('GET', $img);
            $res = json_decode($res->getBody()); 
            $url = "https://ir-dev-d9.innoraft-sites.com/" . $res->data->attributes->uri->url;
            echo '<div class = "">';
            echo "<img src = '$url'/>";
            echo "</div>";
            echo '<div class = "">';
            echo $result->data[$i]->attributes->field_secondary_title->processed;
            echo $result->data[$i]->attributes->field_services->processed;
            echo "</div>";
            echo "</div>";
        }
        }
        ?>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="flex">

        </div>
    </form>


</body>

</html>