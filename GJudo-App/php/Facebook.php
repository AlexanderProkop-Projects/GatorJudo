?>
<?php
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

require_once './vendor/facebook/graph-sdk/src/Facebook/autoload.php';
require_once './vendor/facebook/graph-sdk/src/Facebook/Exceptions/FacebookResponseException.php';
require_once './vendor/facebook/graph-sdk/src/Facebook/Exceptions/FacebookSDKException.php';
require_once './vendor/facebook/graph-sdk/src/Facebook/Helpers/FacebookRedirectLoginHelper.php';


$fb = new \Facebook\Facebook([
  'app_id' => '501889450839518',           //Replace {your-app-id} with your app ID
  'app_secret' => '80dc6bbd7a4b1b24fdc4ed35b2f1fd12',   //Replace {your-app-secret} with your app secret
  'default_graph_version' => 'v10.0'

]);

$accessToken = 'EAAHIdz5vDd4BAB7CIF1lZB9zWF37BZCcZBm7DfgdTWN5gA9Oaz8RwV0SmIXet1ZA5rq4FBHLlYu9HAQnqAIyyDpwUKD7AIPUVEZC6guHu6jUvry3JV2f78gwyNlaCZBnZC7cujaTJlMcaDAwQSvkM6ZCQnxJ6GTRxn0lsU6e44Nyc9ntCjkNH03Gzg6Fxo9j2nyMiTbZBlWOrWZAafsZAMnI5hkZA7HSnV6hllam2o0X3rw80AZDZD';
//*/

$postData = "";

try {
$gjudo_feed = $fb->get('/1185506478585981/feed', $accessToken);
$postBody = $gjudo_feed->getDecodedBody();
$postData = $postBody["data"];
echo "check3\n";
} catch (FacebookResponseException $e) {
    echo 'ERROR 1';
    exit();
} catch (FacebookSDKException $e) {
    echo 'ERROR2';
    exit();
}


if (empty($postData))
{
    echo "empty";
}

date_default_timezone_set('America/New_York');

if (! empty($postData)) {
    foreach ($postData as $k => $v) {
        $postDate = date("Ymd H:i:s", strtotime($postData[$k]["updated_time"]));
        insertAnnouncement($postData[$k]["message"], $postDate, 1);
        
    }
}

?>
