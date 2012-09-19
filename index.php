<html><body>

<?php

require_once('WorldAPIPlace.inc');
require_once('WorldAPIResident.inc');
require_once('WorldAPIGroup.inc');

$resident = new WorldAPIResident('6d286553-59ae-409a-887d-ee75df67b834');
$place = new WorldAPIPlace('d92a6e35-396d-3de4-be08-452f3eeb2050'); // combat sim, resident owned
//$place = new WorldAPIPlace('49ef8b3d-a0cd-8f6f-b226-b19c566d9b60'); // worldapi test, group owned
$group = new WorldAPIGroup('07e23275-7192-e30d-eec1-27c181e1910d');

echo '<h2>Resident</h2>';

$metas = $resident->worldAPI();

echo '<img src="' . $resident->imageURL() . '"></br>';

foreach ($metas as $key => $data) {
  echo 'resident: ' . $key . ' = ' . $data . '<br/><br/>';
}

$fields = $resident->resourceFields();
echo 'thing: ' . array_pop($fields);

echo '<h2>Place</h2>';

$metas = $place->worldAPI();

echo '<div><img src="' . $place->imageURL() . '"></div>';

$parcelname = 'SLURL';
if (isset($metas['parcel'])) $parcelname = $metas['parcel'];
echo '<div><a href="' . $place->slurl() . '">' . $parcelname . '</a></div>';

foreach ($metas as $key => $data) {
  echo 'place: ' . $key . ' = ' . $data . '<br/><br/>';
}

echo '<h2>Owner</h2>';

$owner = $place->owner();

if ($owner) {

  $metas = $owner->worldAPI();

  echo '<img src="' . $owner->imageURL() . '"></br>';

  foreach ($metas as $key => $data) {
    echo 'owner: ' . $key . ' = ' . $data . '<br/><br/>';
  }
}


/*
echo '<h2>Group</h2>';

$metas = $group->worldAPI();

foreach ($metas as $key => $data) {
  echo 'group: ' . $key . ' = ' . $data . '<br/><br/>';
}*/

?>
</body></html>
