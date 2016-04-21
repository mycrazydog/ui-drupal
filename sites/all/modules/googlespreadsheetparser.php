<?php

//http://www.ravelrumba.com/blog/json-google-spreadsheets/

header('Content-type: application/json');

// Set your CSV feed
$feed = 'https://docs.google.com/spreadsheet/pub?hl=en_US&hl=en_US&key=0AhTaYJ-yYwnCdERkcEVVZmV1ekR1U3NibG5LbDM2SFE&single=true&gid=0&output=csv';
//https://docs.google.com/spreadsheet/ccc?key=0AhTaYJ-yYwnCdERkcEVVZmV1ekR1U3NibG5LbDM2SFE&usp=sharing

 
// Arrays we'll use later
$keys = array();
$newArray = array();
 
// Function to convert CSV into associative array
function csvToArray($file, $delimiter) { 
  if (($handle = fopen($file, 'r')) !== FALSE) { 
    $i = 0; 
    while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) { 
      for ($j = 0; $j < count($lineArray); $j++) { 
        $arr[$i][$j] = $lineArray[$j]; 
      } 
      $i++; 
    } 
    fclose($handle); 
  } 
  return $arr; 
} //end CSV to Array
 
// Do it
$data = csvToArray($feed, ',');
 
// Set number of elements (minus 1 because we shift off the first row)
$count = count($data) - 1;
 
//Use first row for names  
$labels = array_shift($data);  
 
foreach ($labels as $label) {
  $keys[] = $label;
}
 
// Add Ids, just in case we want them later
$keys[] = 'id';
 
for ($i = 0; $i < $count; $i++) {
  $data[$i][] = $i;
}
 
// Bring it all together
for ($j = 0; $j < $count; $j++) {
  $d = array_combine($keys, parse($data[$j]));
  $newArray[$j] = $d;
}

function parse($text) {
    // Damn pesky carriage returns...
    $text = str_replace("\r\n", "\n", $text);
    $text = str_replace("\r", "\n", $text);

    // JSON requires new line characters be escaped
    $text = str_replace("\n", "<br/>", $text);
    return $text;
}



// Print it out as JSON
echo json_encode($newArray);



?>