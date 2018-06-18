<?php

namespace Tenolo\BankAccount\Bridge\Symfony\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class BankAccountExtension
 *
 * @package Tenolo\BankAccount\Bridge\Symfony\DependencyInjection
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class BankAccountExtension extends Extension
{

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $locator = new FileLocator(__DIR__ . '/../Resources/config');
        $loader = new Loader\YamlFileLoader($container, $locator);
        $loader->load('services.yml');
    }
}
