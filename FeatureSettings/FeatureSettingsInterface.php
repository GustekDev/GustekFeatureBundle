<?php

namespace Gustek\FeatureBundle\FeatureSettings;

/**
 * Interface FeatureSettingsInterface
 *
 * @author Gustek
 */
interface FeatureSettingsInterface {

    public function getToggles($featureName);
} 
