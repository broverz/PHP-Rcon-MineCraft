<?php
require_once('rcon.php');

use Thedudeguy\Rcon;

$rcon = new Rcon($host, $port, $password, $timeout);

if ($rcon->connect())
{
    echo '<h1>Connect Rcon</h1>';
    $rcon->sendCommand("say hello %player%");
}

?>
