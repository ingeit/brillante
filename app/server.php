<?php
/*Create a server variable with the link to the tcp IP and custom port you need to
specify the Homestead IP if you are using homestead or, for local environment using
WAMP, MAMP, ... use 127.0.0..1*/

require dirname(__DIR__) . '/vendor/autoload.php';

$websocket = new Hoa\Websocket\Server(
    new Hoa\Socket\Server('ws://192.168.1.100:8889')
);
$websocket->on('open', function (Hoa\Event\Bucket $bucket) {
    echo 'new connection', "\n";

    return;
});
$websocket->on('message', function (Hoa\Event\Bucket $bucket) {
    $data = $bucket->getData();
    echo '> message ', $data['message'], "\n";
    $bucket->getSource()->send($data['message']);
    $bucket->getSource()->broadcast($data['message']);
    echo '< echo', "\n";

    return;
});
$websocket->on('close', function (Hoa\Event\Bucket $bucket) {
    echo 'connection closed', "\n";

    return;
});
$websocket->run();


$websocket = new Server(
    new Hoa\Socket\Server('ws://192.168.1.15:8889')
);
$websocket->on('open', function (Hoa\Event\Bucket $bucket) {
    echo 'new connection', "\n";

    return;
});
$websocket->on('message', function (Hoa\Event\Bucket $bucket) {
    $data = $bucket->getData();
    echo '> message ', $data['message'], "\n";
    $bucket->getSource()->send($data['message']);
    echo '< echo', "\n";

    return;
});
$websocket->on('close', function (Hoa\Event\Bucket $bucket) {
    echo 'connection closed', "\n";

    return;
});
$websocket->run();