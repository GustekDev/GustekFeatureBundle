<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 26/10/14
 * Time: 00:06
 */

namespace Gustek\FeatureBundle\Feature;


use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FeaturesManager implements FeaturesManagerInterface, ContainerAwareInterface {

    /** @var ContainerInterface */
    private $container;

    /** @var string[] */
    private $togglesIds = [];

    public function addFeature(FeatureInterface $feature)
    {
        // TODO: Implement addFeature() method.
    }

    public function addToggleId($id, $alias)
    {
        $this->togglesIds[$alias] = $id;
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
