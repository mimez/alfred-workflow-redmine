<?php
require(__DIR__ . "/../vendor/autoload.php");

if (getenv('REDMINE_URL') === false || getenv('REDMINE_APIKEY') === false) {
    die('missing environment variable REDMINE_URL or REDMINE_APIKEY');
}

$redmine = new Redmine\Client(getenv('REDMINE_URL'), getenv('REDMINE_APIKEY'));

$projectsWorkflow = new \Mimez\AlfredWorkflow\RedmineWorkflow\RedmineWorkflow($redmine);
$projectsWorkflow($_SERVER['argv'][1]);