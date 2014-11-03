<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 03/11/14
 * Time: 21:05
 */

namespace Gustek\FeatureBundle\FeatureSettings;


interface FeatureSettingsInterface {

    public function getToggles($featureName);
} 
