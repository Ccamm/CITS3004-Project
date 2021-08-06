<?php

$MYSQL_HOST="cssubmitv2-mysql";
$MYSQL_DB="cssubmitdb";
$MYSQL_USER="development";
$MYSQL_PASS="supersecurelongpasswordnoonewillgetlol";

function getDBConn() {
  global $MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB;
  return new mysqli($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);
}
?>
