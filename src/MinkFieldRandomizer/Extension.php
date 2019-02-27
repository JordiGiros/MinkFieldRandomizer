<?php

namespace MinkFieldRandomizer;

use Behat\Testwork\ServiceContainer\Extension as ExtensionInterface;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Behat\Testwork\ServiceContainer\ServiceProcessor;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class Extension implements ExtensionInterface {

    public function getConfigKey() {
        return 'minkfieldrandomizer';
    }

    public function initialize(ExtensionManager $extensionManager) {

    }

    public function configure(ArrayNodeDefinition $builder) {

    }

    public function load(ContainerBuilder $container, array $config) {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__));
        $loader->load('services.yml');
    }

    public function process(ContainerBuilder $container) {

    }

}
