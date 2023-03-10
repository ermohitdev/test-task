<?php

namespace ContainerVVVU3Yc;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\ApiController' shared autowired service.
     *
     * @return \App\Controller\ApiController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'AbstractController.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Traits'.\DIRECTORY_SEPARATOR.'ApiResponser.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'ApiController.php';

        $container->services['App\\Controller\\ApiController'] = $instance = new \App\Controller\ApiController(($container->services['doctrine'] ?? $container->load('getDoctrineService')), ($container->privates['App\\Repository\\DeviceRepository'] ?? $container->load('getDeviceRepositoryService')));

        $instance->setContainer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'doctrine' => ['services', 'doctrine', 'getDoctrineService', true],
            'http_kernel' => ['services', 'http_kernel', 'getHttpKernelService', false],
            'parameter_bag' => ['privates', 'parameter_bag', 'getParameterBagService', false],
            'request_stack' => ['services', 'request_stack', 'getRequestStackService', false],
            'router' => ['services', 'router', 'getRouterService', false],
            'session' => ['privates', '.session.deprecated', 'get_Session_DeprecatedService', true],
        ], [
            'doctrine' => '?',
            'http_kernel' => '?',
            'parameter_bag' => '?',
            'request_stack' => '?',
            'router' => '?',
            'session' => '.session.deprecated',
        ]))->withContext('App\\Controller\\ApiController', $container));

        return $instance;
    }
}
