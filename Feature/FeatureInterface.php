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

    public function addToggle(FeatureToggleInterface $featureToggleInterface);

    public function isEnabled();

    public function getName();
} 