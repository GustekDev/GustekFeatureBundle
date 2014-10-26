<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 25/10/14
 * Time: 22:51
 */

namespace Gustek\FeatureBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ToggleCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('gustek.features')) {
            return;
        }

        $definition = $container->getDefinition(
            'gustek.features'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'gustek.feature.toggle'
        );

        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'addTransport',
                [$id, $attributes['alias']]
            );
        }
    }
}
