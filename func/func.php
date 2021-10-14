<?php

require(dirname(__DIR__) . '/vendor/autoload.php');
use Sinergi\BrowserDetector;

ini_set('display_errors', 0);

function captureVisit()
{
    $browser = new BrowserDetector\Browser();
    $os = new BrowserDetector\Os();
    $device = new BrowserDetector\Device();
    $ipAddress = $_SERVER['REMOTE_ADDR'];

    $log = 
        "[" . date("Y-m-d H:i:s") . "] " .
        "Browser - " . $browser->getName() . " " . $browser->getVersion() . " | " .
        "OS - " . $os->getName() . " | " .
        "Device - " . $device->getName() . " | " .
        $ipAddress . PHP_EOL;

    $logFile = fopen(dirname(__DIR__) . "/func/visitLog.txt", "a") or die();
    fwrite($logFile, $log);
    fclose($logFile);
}