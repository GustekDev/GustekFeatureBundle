<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 25/10/14
 * Time: 21:42
 */

namespace Gustek\FeatureBundle\Feature;


use Gustek\FeatureBundle\FeatureToggle\FeatureToggleInterface;

class Feature implements FeatureInterface {

    private $name;

    /** @var FeatureToggleInterface[] */
    private $toggles = [];

    public function __construct($name) {
        $this->name = $name;
    }

    /**
     * @param FeatureToggleInterface $featureToggleInterface
     */
    public function addToggle(FeatureToggleInterface $featureToggleInterface)
    {
        $this->toggles[] = $featureToggleInterface;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        foreach ($this->toggles as $toggle) {
            if (!$toggle->isEnabled()) {
                return false;
            }
        }
        return true;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
