<?php
define('SERVICE_ACCOUNT','config.json');
define('DOMAIN','http://localhost/tampets/index.php');

function getActivepeso($peso) {
  $optParams = array(
    'dimensions' => 'rt:pageTitle,rt:pagePath',
    'sort' => '-rt:field1',
    'max-results' => '20'
  );
  $result = $peso->data_realtime->get('peso:'.VIEW, 'rt:field1', $optParams);

  $table = '';
  if ($result) {
    $rows = $result->getRows();
    if ($rows) {
      foreach ($rows as $row) {
        $table .= '<tr class="open-link" data-link="'.$row[1].'">';
        $table .= '<td>'.htmlspecialchars($row[0],ENT_NOQUOTES).'</td>';
        $table .= '<td>'.htmlspecialchars($row[2],ENT_NOQUOTES).'</td>';
        $table .= '</tr>';
      }
    } else {
      $table .= '<tr><td colspan="2"><small>Não há Dados</small></td></tr>';
    }
    return $table;
  } else {
    return '<tr><td colspan="2"><small>Não há Dados</small></td></tr>';
  }
}

function getpesoData() {
  $read_api_key = 'TVKAXFQAP3LHM0TW';
  $channel_id = '2156608';

  $url = "https://api.thingspeak.com/channels/" . $channel_id . "/feeds/last.json?api_key=" . $read_api_key;
  $response = file_get_contents($url);
  $data = json_decode($response);

  $peso = $data->field1; 

  return $peso;
}
?>