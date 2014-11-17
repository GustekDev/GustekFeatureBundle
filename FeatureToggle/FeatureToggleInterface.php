<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 25/10/14
 * Time: 18:21
 */

namespace Gustek\FeatureBundle\FeatureToggle;


interface FeatureToggleInterface {

    /**
     * @return bool
     */
    public function isEnabled();

    /**
     * @param mixed $options
     */
    public function setOptions($options);

    /**
     * @return string
     */
    public function getName();
} 
