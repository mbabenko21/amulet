<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {22:28}
 */

namespace Amulet\Helper;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class LocationHelper {
    /** @var  Collection */
    protected $_doors;

    public function __construct()
    {
        $this->_doors = new ArrayCollection();
    }

    public function getDoors()
    {

    }
} 