<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 03/11/14
 * Time: 21:10
 */

namespace Gustek\FeatureBundle\FeatureSettings;


class FeatureSettingsConfig implements FeatureSettingsInterface
{

    private $featuresSettings = [];

    public function __construct($featureSettings)
    {
        $this->featuresSettings = $featureSettings;
    }

    public function getToggles($featureName)
    {
        return $this->featuresSettings[$featureName];
    }
}
