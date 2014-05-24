<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 23.05.14
 * Time: 16:51
 */

namespace ElectricityMeter;


class ComPort
{
    private $port = null;
    private $flags = null;
    private $rate = null;
    private $bits = null;
    private $stop = null;
    private $party = null;

    private $fd = null;

    public function __construct($port, $flags = O_RDWR, $rate = 9600, $bits = 8, $stop = 1, $parity = 0)
    {
        $this->port  = $port;
        $this->flags = $flags;
        $this->rate  = $rate;
        $this->bits  = $bits;
        $this->stop  = $stop;
        $this->party = $parity;

    }

    public function setRate($rate = 9600)
    {
        $this->rate = 9600;
        return $this;
    }

    public function open()
    {
        $this->fd = \dio_open($this->port, $this->flags);

        \dio_tcsetattr($this->fd, array(
            'baud'   => $this->rate,
            'bits'   => $this->bits,
            'stop'   => $this->stop,
            'parity' => $this->party,
        ));
        return $this;
    }

    public function write($data)
    {
        \dio_write($this->fd, $data, strlen($data));
        return $this;
    }

    public function read($bufferLen = 1024)
    {
        return \dio_read($this->fd, $bufferLen);
    }
} 