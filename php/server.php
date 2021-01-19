<?php
require_once 'parser.php';

$team = $_POST["team"];
$parser = new parser($team);
$parser->get_result($team);

//div[class=colored big] big tr td
?>
