<?php

namespace Gustek\FeatureBundle;

use Gustek\FeatureBundle\DependencyInjection\Compiler\ToggleCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class GustekFeatureBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ToggleCompilerPass());
    }
}
