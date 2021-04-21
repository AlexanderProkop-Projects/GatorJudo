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

$accessToken = 'EAAHIdz5vDd4BAP3yaO2i9SzRHXWrGB1F0qs3af3qbTAuQ6SjwJvqZCj1gOZAe1vlG4xJr3XMqs5ZAXvCetSOYrbFqVPnDATDKFGU8YzNLaO4SYiXHqWW0WzfmEUZBkg7Nnx3N2Rx3phtE2gdsDQ9NdSjhNovZCCNJ2Y1v0iXq5gZDZD';
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
echo "TESTING";
if (! empty($postData)) {
    foreach ($postData as $k => $v) {
        $postDate = date("Y-m-d H:i:s", strtotime($postData[$k]["updated_time"]));
        $keys = array_keys($postData[$k]);
        
        /*if("message" == $keys[1]){
            echo "The stirngs are equal, WTF?"; //This prints.
        }*/
        $message = $postData[$k][$keys[1]];
        
        echo "Message: " . $message . ", Date: " . $postDate;
        

        //$test1 = "test";
        //$test2 = "2021-04-16 22:24:07";
        
        //$message = substr($k[]$v["message"],0,15);
        //echo $message . "<br/>";
        //$ID = insertAnnouncement($message, $postDate, 1);
        /*if (substr($message,0,15) == "Practice Update") { //Passes and echoes
            //echo "<br/>PRACTICE<br/>";
            insertTag($ID, "PRACTICE", 1);
        }
        
        else if (substr($message,0,15) == "Tournament Info") { //Passes and echoes
            //echo "<br/>PRACTICE<br/>";
            insertTag($ID, "TOURNAMENT", 1);
        }*/
   
    }
}

?>
