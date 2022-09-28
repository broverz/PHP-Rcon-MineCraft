<?php
require_once('query.php');
require_once('rcon.php');

$server = new Query('localhost', 25565, 3);
$server->connect();

$info = $server->get_info();
print_r($info);

$host = 'localhost'; // Server host name or IP
$port = 25575;                      // Port rcon is listening on
$password = '@yosiket14789'; // rcon.password setting set in server.properties
$timeout = 3;                       // How long to timeout.

use Thedudeguy\Rcon;

$rcon = new Rcon($host, $port, $password, $timeout);

if ($rcon->connect())
{
    echo '<h1>เข้า Rcon ผ่าน</h1>';
    $rcon->sendCommand("say hello %player%");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Minecraft IP : <?= $info['hostip'] ?></title>
</head>

<body>
    <?php if ($info === false) { ?>
        <h1 style="color: red">OFFLINE</h1>
    <?php } else { ?>
        <h1 style="color: greenyellow">ONLINE</h1>
        <h1>Slots : <?= $info['numplayers'] ?> / <?= $info['maxplayers'] ?></h1>
        <h1>Players : <?= implode(', ', $info['players']) ?></h1>
    <?php } ?>
</body>

</html>