<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {21:54}
 */

namespace Amulet\Service;


interface ExportableInterface {
    /**
     * @return array
     */
    public function export();
} 