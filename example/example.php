<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 23.05.14
 * Time: 21:36
 */

require_once __DIR__ . '/../vendor/autoload.php';

$em = \ElectricityMeter\EMeter::getMeter('CE102R5', '/dev/ttyUSB0');
