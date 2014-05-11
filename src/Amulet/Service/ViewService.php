<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {18:36}
 */

namespace Amulet\Service;


interface ViewService {
    /**
     * @param string $template
     * @param array $data
     * @return void
     */
    public function render($template, array $data = []);
} 