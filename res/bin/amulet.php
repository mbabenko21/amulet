<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 11.05.14 - {23:02}
 */

/**
 * Amulet CLI
 */

// set to run indefinitely if needed
set_time_limit(0);

/* Optional. It’s better to do it in the php.ini file */
date_default_timezone_set('Europe/Moscow');

require __DIR__ . "/../../bootstrap.php";
\Amulet\App::init()->run(true);
$systemConfig = \Amulet\App::init()->configFactory("system");
$app = new \Symfony\Component\Console\Application($systemConfig->getAppName(), $systemConfig->getVersion());

/** @var $em \Doctrine\ORM\EntityManager */
$em = \Amulet\App::init()->get("entity_manager");
$helperSet = new \Symfony\Component\Console\Helper\HelperSet([
    "em" => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em),
    "db" => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    "dialog" => new \Symfony\Component\Console\Helper\DialogHelper(),
    "table" => new \Symfony\Component\Console\Helper\TableHelper()
]);

$app->setHelperSet($helperSet);

$app->addCommands([
    new \Doctrine\ORM\Tools\Console\Command\ClearCache\CollectionRegionCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ClearCache\EntityRegionCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ClearCache\QueryRegionCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ClearCache\ResultCommand(),
    new \Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand(),
    new \Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand(),
    new \Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ConvertDoctrine1SchemaCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand(),
    new \Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand(),
    new \Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand(),
    new \Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand(),
    new \Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand(),
    new \Doctrine\ORM\Tools\Console\Command\InfoCommand(),
    new \Doctrine\ORM\Tools\Console\Command\RunDqlCommand(),
    new \Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand()
]);


$app->run();