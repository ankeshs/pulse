<?php
function searchFor($q, $t)
{
	$q=str_replace(" ", "%20", $q);
$url = "https://ajax.googleapis.com/ajax/services/search/".$t."?v=1.0&q=".$q."&maxResults=10";

// sendRequest
// note how referer is set manually
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, "google.com");
$body = curl_exec($ch);
curl_close($ch);

// now, process the JSON string
$json = json_decode($body);
// now have some fun with the results...
$rs=$json->responseData->results;
//print_r($rs);

foreach($rs as $j)
{
echo "<a href='".($j->url)."' target='_blank'>". $j->title ."</a><br>";
echo $j->content ."<br>";

}
}

function searchImg($q)
{
	$q=str_replace(" ", "%20", $q);
$url = "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=".$q."&maxResults=10";

// sendRequest
// note how referer is set manually
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, "google.com");
$body = curl_exec($ch);
curl_close($ch);

// now, process the JSON string
$json = json_decode($body);
// now have some fun with the results...
$rs=$json->responseData->results;
//print_r($rs);

foreach($rs as $j)
{
echo "<a href='".($j->url)."' target='_blank'><img src='".$j->url."' height='". $j->tbHeight ."' /></a>&nbsp;&nbsp;&nbsp;";

}
}
?>
