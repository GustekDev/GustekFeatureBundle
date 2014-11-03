<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 25/10/14
 * Time: 18:19
 */

namespace Gustek\FeatureBundle\Feature;


interface FeaturesManagerInterface {

    public function addFeature($name, $toggles);

    /**
     * @param $name
     * @return Feature
     */
    public function getFeature($name);

    /**
     * @param $name
     * @return bool
     */
    public function isEnabled($name);

    public function addToggleId($id, $alias);
} 
