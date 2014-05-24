<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 23.05.14
 * Time: 16:43
 */

namespace ElectricityMeter\Driver;


class EMDriver
{
    /**
     * @var ComPort
     */
    private $port;
    private $address = null;
    private $password = null;

    public function __construct($port, $address, $password)
    {
        $this->password = $password;
        $this->address  = $address;

        $this->port = new \ElectricityMeter\ComPort($port);
        $this->port->open();
    }

} 