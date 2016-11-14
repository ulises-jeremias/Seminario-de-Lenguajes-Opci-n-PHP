<?php

function get_query()
{
  $db = new Connection();
  if (isset($_POST['charact']) || ((isset($_POST['type'])) && (isset($_POST['model'])) && (isset($_POST['brand'])))) {
    $sql = get_search_query();
  } else {
    $sql = get_list_query();
  }
  $db->close();
  return $sql;
}

?>
