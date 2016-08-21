<?php

date_default_timezone_set('Europe/Berlin');

include "vendor/autoload.php";

$app = new Silex\Application([
    'debug'=>true
]);

$app->get('/', function() use($app) {
    return $app->sendFile('instructions.html', 200, [
        'Content-Type'=>"text/html"
    ]);
});

$app->get('/{size}/{identifier}', function($size, $identifier) use($app) {
    $cc = FlagLookup::lookup($identifier);
    return new \Symfony\Component\HttpFoundation\BinaryFileResponse(FlagPath::make($cc, $size), 200, [], true, 'inline');
});

$app->run();