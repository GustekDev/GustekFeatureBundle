<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 26/10/14
 * Time: 00:06
 */

namespace Gustek\FeatureBundle\Feature;


use Gustek\FeatureBundle\FeatureToggle\FeatureToggleInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FeaturesManager implements FeaturesManagerInterface, ContainerAwareInterface {

    /** @var ContainerInterface */
    private $container;

    /** @var string[] */
    private $togglesIds = [];

    /** @var FeatureInterface[] */
    private $features = [];

    public function addFeature($name, $toggles)
    {
        $feature = new Feature($name);
        foreach ($toggles as $toggleAlias => $options) {
            /** @var FeatureToggleInterface $toggle */
            $toggle = $this->container->get($this->togglesIds[$toggleAlias]);
            $toggle->setOptions($options);
            $feature->addToggle($toggle);
        }
        $this->features[$name] = $feature;
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
