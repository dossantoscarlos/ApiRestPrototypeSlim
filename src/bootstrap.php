<?php 

/**
 * Container Resources do Slim.
 * Aqui dentro dele vamos carregar todas as dependências
 * da nossa aplicação que vão ser consumidas durante a execução
 * da nossa API
**/

// use App\Providers\Doctrine;
// use App\Providers\Slim;
// use Slim\Container;

// require __DIR__ . '/../vendor/autoload.php';

// $cnt = new Container(require __DIR__ . '/settings.php');

// $cnt->register(new Doctrine())
//     ->register(new Slim());

// return $cnt;

// use Doctrine\Common\Annotations\AnnotationReader;
// use Doctrine\Common\Cache\FilesystemCache;
// use Doctrine\ORM\EntityManager;
// use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
// use Doctrine\ORM\Tools\Setup;


// $container[EntityManager::class] = function (Container $container): EntityManager {
//     $config = Setup::createAnnotationMetadataConfiguration(
//         $container['settings']['doctrine']['metadata_dirs'],
//         $container['settings']['doctrine']['dev_mode']
//     );

//     $config->setMetadataDriverImpl(
//         new AnnotationDriver(
//             new AnnotationReader,
//             $container['settings']['doctrine']['metadata_dirs']
//         )
//     );

//     $config->setMetadataCacheImpl(
//         new FilesystemCache(
//             $container['settings']['doctrine']['cache_dir']
//         )
//     );

//     return EntityManager::create(
//         $container['settings']['doctrine']['connection'],
//         $config
//     );
// };

// return $container;
 
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Psr7Middlewares\Middleware\TrailingSlash;
use Monolog\Logger;
use Firebase\JWT\JWT;

$isDevMode = true;
/**
 * Diretório de Entidades e Metadata do Doctrine
 */
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../App/Http/Models/Entity/"), $isDevMode);
/**
 * Array de configurações da nossa conexão com o banco
 */
$conn = array(
    'driver' => 'pdo_sqlite',
    'path' =>__DIR__.'/../db.sqlite',
);
/**
 * Instância do Entity Manager
 */
$entityManager = EntityManager::create($conn, $config);

return $entityManager;