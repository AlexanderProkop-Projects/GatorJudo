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

$accessToken = 'EAAHIdz5vDd4BAI4x5E524vuafaKpX09SZAgAjG1tJSgXi4lhN5lPpSuj0Snkp4ZAta3XpAq1SubvJHleLZBIO5maPI5ZAZCvuLa0ZBTHJfMgizqdjmP3ODuznA9lCOAALWL1Wreem3wFgxE1iDjDrgljm53uu8smvcBdHyLWTICd1Jbg366SviSN6VkLVHhyw3ZBvrKw7SNJ4z1MZAWoeJqvgMmiZBjZBkmRSiKBz4A3czfQZDZD';
//*/

$postData = "";

try {
$gjudo_feed = $fb->get('/1185506478585981/feed', $accessToken);
$postBody = $gjudo_feed->getDecodedBody();
$postData = $postBody["data"];
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
        $postDate = date("Y-m-d H:i:s", strtotime($postData[$k]["updated_time"]));
        //echo gettype($postDate);
        //echo $postData[$k]["message"] . " " . $postDate . " " . 1;
        $message = $postData[$k]["message"];
        //$ID = insertAnnouncement($message, $postDate, 1);
        if (substr($postData["message"],0,15) == 'PRACTICE UPDATE') {
            insertTag($ID, "PRACTICE", 1);
        }
    }
}

?>
