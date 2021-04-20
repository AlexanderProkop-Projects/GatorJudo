<style>
body {
    width: 550px;
    font-family: Arial;
}

.post-item {
    border-bottom: 1px #F0F0F0 solid;
    padding: 10px;
}
.post-message {
    font-size: 1em;
    padding-bottom: 8px;
}

.post-date {
    color: #b7b7b7;
    font-size: 0.9em;
    font-style: italic;
}
</style>

<h1>Reading Facebook Feed using  PHP</h1>


<?php
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

require_once './vendor/facebook/graph-sdk/src/Facebook/autoload.php';
require_once './vendor/facebook/graph-sdk/src/Facebook/Exceptions/FacebookResponseException.php';
require_once './vendor/facebook/graph-sdk/src/Facebook/Exceptions/FacebookSDKException.php';
require_once './vendor/facebook/graph-sdk/src/Facebook/Helpers/FacebookRedirectLoginHelper.php';
//require_once __DIR__ . '/vendor/autoload.php';


$fb = new \Facebook\Facebook([
  'app_id' => '507375993592234',           //Replace {your-app-id} with your app ID
  'app_secret' => 'b4936c4ff1cfa6d16c4fd679467a3b38',   //Replace {your-app-secret} with your app secret
  'default_graph_version' => 'v10.0'
  //'graph_api_version' => 'v5.0',
]);

$accessToken = "EAAHNdK3dmaoBAFIFqzSlZCZB5fDml5ZBfIChACZBg09ZBaom7FC7B0qVrojyuJgligt7tuQm5C3fZB0SGPL9IMR5ODP321ZAz7ZCIWjSZBoWmx4ZChZCECK1bgcykrJ2Ild3BtujgkO3mgBG1y87PLJueY6bc6XvmTDVX9YABt3TEF3lxKrOuBfgQyiPFrq7Xr22C0WHtXnZAFHgK2wlWRUh8XyEdOTLlSI02nYk1n2ZAiV7gNgZDZD";

$postData = "";
echo "check1\n";

try {
echo "check2\n";
//$facebook->setExtendedAccessToken();
//$facebook->getAccessToken();
$gjudo_feed = $facebook->get('106594874881649/feed', $accessToken);
$postBody = $gjudo_feed->getDecodedBody();
$postData = $postBody["data"];
echo "check3\n";
} catch (FacebookResponseException $e) {
    echo 'ERROR1';
    exit();
} catch (FacebookSDKException $e) {
    echo 'ERROR2';
    exit();
}


if (! empty($postData)) {
    foreach ($postData as $k => $v) {
        $postDate = date("d F, Y", strtotime($postData[$k]["created_time"]))
?>
<div class="post-item">
<div class="post-message"><?php if(!empty($postData[$k]["message"])) { echo $postData[$k]["message"]; } ?></div>
<div class="post-date"><?php echo $postDate; ?></div>
</div>
<?php
    }
}

//var_dump($gjudo_feed);
/*try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get(
    '/815577635221159/feed',
    'EAAHNdK3dmaoBAP5wWTKz8MRegIuH3uGVtVCUadNr5m8ZCMIpmuscukgSFUBht12IlyUmwBv4NvCFdKVpCYt2ZAtDvDuo8NAhrrNAtvdkIms0notCscRILS5VUnQBSAp3u9F9G9TWZC2YoLelWbvm1Rp0oD2M2g29VZB0EZAelHrX17wkWNvnibKdruZBF9weehj3hZAXeqoG3b6lNeeYCYhyQhjXliGtv6RFqPFwBBlLhZCgwBxjdOSE'
  );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$graphNode = $response->getGraphNode();



echo $graphNode->getField('name');*/

?>

</body>
</html>
