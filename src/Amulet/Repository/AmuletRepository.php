<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {22:45}
 */

namespace Amulet\Repository;


use Amulet\Exception\EntityRepositoryException;
use Doctrine\ORM\EntityRepository;

class AmuletRepository extends EntityRepository
{

    protected function equals($object, $class, $thrown = true)
    {
        if ($thrown === true) {
            if ($object instanceof $class === false) {
                throw new EntityRepositoryException(
                    sprintf("object not instance %s", $class)
                );
            }
        }
        return ($object instanceof $class);
    }
} 