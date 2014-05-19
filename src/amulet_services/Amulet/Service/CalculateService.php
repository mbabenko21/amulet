<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {14:13}
 */

namespace Amulet\Service;

/**
 * Interface CalculateService
 * @package Amulet\Service
 */
interface CalculateService {
    /**
     * @param object $object
     * @return object
     */
    public function calculate($object);

    /**
     * @param object $object
     * @return object
     */
    public function regen($object);
} 