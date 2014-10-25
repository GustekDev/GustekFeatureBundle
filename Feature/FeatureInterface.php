<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 25/10/14
 * Time: 18:20
 */

namespace Gustek\FeatureBundle\Feature;


use Gustek\FeatureBundle\FeatureToggle\FeatureToggleInterface;

interface FeatureInterface {

    /**
     * @param FeatureToggleInterface $featureToggleInterface
     */
    public function addToggle(FeatureToggleInterface $featureToggleInterface);

    /**
     * @return bool
     */
    public function isEnabled();

    /**
     * @return string
     */
    public function getName();
} 