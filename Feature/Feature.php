<?php

namespace Gustek\FeatureBundle\Feature;

use Gustek\FeatureBundle\FeatureSettings\FeatureSettingsInterface;
use Gustek\FeatureBundle\FeatureToggle\FeatureToggleInterface;

/**
 * Class Feature
 *
 * @author Gustek
 */
class Feature
{
    private $name;

    /** @var FeatureToggleInterface[] */
    private $toggles = array();

    public function __construct($name, FeatureSettingsInterface $featureSettings, TogglesContainer $togglesContainer)
    {
        $this->name = $name;
        foreach($featureSettings->getToggles($name) as $toggleName => $toggleConfig)
        {
            $this->addToggle($togglesContainer->getToggle($toggleName), $toggleConfig);
        }
    }

    /**
     * @param FeatureToggleInterface $featureToggleInterface
     * @param array $options
     */
    public function addToggle(FeatureToggleInterface $featureToggleInterface, $options)
    {
        $featureToggleInterface->setOptions($options);
        $this->toggles[$featureToggleInterface->getName()] = $featureToggleInterface;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        if (empty($this->toggles))
        {
            return false;
        }
        foreach ($this->toggles as $toggle)
        {
            if (!$toggle->isEnabled())
            {
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
