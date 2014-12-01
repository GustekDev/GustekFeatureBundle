<?php

namespace Gustek\FeatureBundle\FeatureSettings;

/**
 * Class FeatureSettingsConfig
 *
 * @author Gustek
 */
class FeatureSettingsConfig implements FeatureSettingsInterface
{

    private $featuresSettings = array();

    public function __construct($featureSettings)
    {
        $this->featuresSettings = $featureSettings;
    }

    public function getToggles($featureName)
    {
        return $this->featuresSettings[$featureName]['toggles'];
    }
}
