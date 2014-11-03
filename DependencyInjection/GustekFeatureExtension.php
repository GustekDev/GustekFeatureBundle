<?php

namespace Gustek\FeatureBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class GustekFeatureExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        switch ($config['settings'])
        {
            case 'config':
                $settingsLoader = new Reference('gustek.features.settings.config');
                break;
            default:
                $settingsLoader = new Reference($config['settings']);
                break;
        }

        $togglesContainer = new Reference('gustek.features.toggleContainer');
        foreach ($config['features'] as $featureName => $featureConfig)
        {
            $featureDefinition = new Definition('Gustek\FeatureBundle\Feature\Feature', [
                $featureName,
                $settingsLoader,
                $togglesContainer,

            ]);
            $container->setDefinition('gustek.feature.' . $featureName, $featureDefinition);
        }
    }
}
