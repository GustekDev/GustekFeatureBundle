<?php

namespace Gustek\FeatureBundle\FeatureSettings;

use Gustek\FeatureBundle\Exception\FeatureNotFoundException;

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
        if (!isset($this->featuresSettings[$featureName])) {
            throw new FeatureNotFoundException(
                'Feature ' . $featureName . ' does not exists. Available features: '
                . implode(', ', array_keys($this->featuresSettings))
            );
        }
        return $this->featuresSettings[$featureName]['toggles'];
    }
}
