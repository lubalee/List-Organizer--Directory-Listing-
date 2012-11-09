<?php

$company = $_POST["company"];
$rep = $_POST["rep"];
$job = $_POST["job"];
$url = $_POST["url"];

$file = 'videos.xml';

$xml = simplexml_load_file($file);

$video = $xml->addChild('video');
$video->addChild('company', $company);
$video->addChild('rep', $rep);
$video->addChild('job', $job);
$video->addChild('url', $url);

$xml->asXML($file);