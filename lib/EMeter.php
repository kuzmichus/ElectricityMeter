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

    public function readCurruntTariff()
    {
        return $this->driver->readCurruntTariff();
    }

    public function readPower()
    {
        return $this->driver->readPower();
    }

    public function readSerialNumberPart($part = 00)
    {
        return $this->driver->readSerialNumberPart($part);
    }
}


