<?php
require_once __DIR__ . '/wp-content/themes/passivello/vendor/php-graph-sdk-5.0.0/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '######',
  'app_secret' => '########',
  'default_graph_version' => 'v2.8',
]);

$fb->setDefaultAccessToken('###########');

try {
    $response = $fb->get( '/poliedro.polimi/events' );
    $graphEdge = $response->getGraphEdge();
    $count = 0;
    $newcount = 0;
    $events = array();

    foreach ($graphEdge as $event) {
        if ($count > 10) break;
        if ($event['start_time'] >= new DateTime()) $newcount += 1;
        $ev = array('start_time' => $event['start_time'],
                    'id' => $event['id'],
                    'name' => $event['name'],
                    'description' => $event['description'],
                    'place_name' => $event['place']['name']);
        array_push($events, $ev);
    }
    // Sort new events farthest last
    if ($newcount > 1) {
        $tmp1 = array_reverse(array_slice($events, 0, $newcount));
        $tmp2 = array_slice($events, $newcount);
        $events = array_merge($tmp1, $tmp2);
    }

    $obj = ['newcount' => $newcount, 'events' => $events];
    $json = json_encode($obj);
    $f = fopen("../fb_events.json", "w") or die("Unable to open file");
    fwrite($f, $json);
    fclose($f);
    echo "Done.<br>";
    echo "<a href=\"/#eventi\">Go back to events</a>";

} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    die('Graph returned an error: ' . $e->getMessage());
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    die('Facebook SDK returned an error: ' . $e->getMessage());
}

?>
