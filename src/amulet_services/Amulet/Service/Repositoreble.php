<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 12.05.14 - {15:18}
 */

namespace Amulet\Service;


use Amulet\Repository\AmuletRepository;
use Doctrine\Common\Persistence\ObjectRepository;

interface Repositoreble {

    /**
     * @return string
     */
    public function getRepositoryClass();

    /**
     * @return ObjectRepository
     */
    public function getRepository();
} 