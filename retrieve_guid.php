<html>
<head>
<title>GUID generator</title>
</head>

<body>

<?php
//define necessary variables
$apikey = $_POST['api_key'];
$search_param = $_POST['search_field'];

//send url
$jsonurl = 'https://hubapi.com/leads/v1/list/?hapikey=' . $apikey . '&search=' . $search_param;
//get function
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json,true);
$lead_count = 0;
echo '<h1 id="lead_details">Here are the details for the lead you\'re searching for:</h1>';

foreach ($json_output as $lead) {
  $lead_count += 1;
  echo '<h2 id="lead_count">Lead ' . $lead_count . '</h2>';
  echo '<p class="detail">Lead GUID: ' . $lead['guid'] . '<br>';
  echo '<p class="detail">Name: ' . $lead['firstName'] . ' ' . $lead['lastName'] . '<br>';
  echo '<p class="detail">Email: ' . $lead['email'] . '<br>';
  echo '<p class="detail">Phone: ' . $lead['phone'] . '<br>';
  echo '<p class="detail">Company: ' . $lead['company'] . '<br>';
  echo '<p class="detail">Page Views: ' . $lead['analyticsDetails']['pageViewCount'] . '<br>';
  echo '<p class="detail">Visits: ' . $lead['analyticsDetails']['visitCount'] . '<br>';
  echo '<p class="detail">First URL: ' . $lead['firstURL'] . '<br>';
  echo '<p class="detail">Found the Site Via: ' . $lead['fullFoundViaString'] . '<br>';
  if ($lead['isCustomer'] == true) {
    echo '<p class="detail">Customer or Lead?: Customer<br>';
  }
  else {
    echo '<p class="detail">Customer or Lead?: Lead<br>';
  }
  echo '<p class="detail">Lead Link: ' . $lead['publicLeadLink'] . '<br>';
  echo '<p class="detail">Lead Grade: ' . $lead['score'] . '<br>';
  echo '<p class="detail">Twitter Username: ' . $lead['twitterHandle'] . '<br>';
  echo '<p class="detail">Website: ' . $lead['website'] . '<br>';
  echo '<p class="detail">Lead Nurturing Active?: ' . $lead['leadNurturingActive'] . '<br>';
}
echo "</br>";
echo "There were " . $lead_count . " total leads found with that search parameter";


?>

</p>
</body>
</html>