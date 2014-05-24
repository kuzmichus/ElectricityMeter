<?php
namespace ElectricityMeter;

final class EMeter
{
    private $driver = null;

    public static function getMeter($driver, $port)
    {
        return new EMeter($driver, $port);
    }

    public function __construct($driver, $port)
    {
        $driverType = '\\ElectricityMeter\\Driver\\' . $driver;

        if (class_exists($driverType)) {
            $this->driver = new $driverType($port, '00', '00');
        } else {
            die ('Драйвер "' . $driver . ': не найден');
        }
    }
}


