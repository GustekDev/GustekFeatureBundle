<?php

namespace Gustek\FeatureBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('gustek_feature');

        $rootNode
            ->children()
                ->scalarNode('settings')->defaultValue('config')->end()
                ->arrayNode('features')
                ->useAttributeAsKey('feature_name')
                ->prototype('array')
                    ->children()
                        ->arrayNode('toggles')
                        ->useAttributeAsKey('toggle_name')
                        ->prototype('variable')
                        ->end()
                    ->end()
                ->end()
            ->end();
        return $treeBuilder;
    }
}
