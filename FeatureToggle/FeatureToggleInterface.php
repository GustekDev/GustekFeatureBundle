<?php

namespace Gustek\FeatureBundle\FeatureToggle;

/**
 * Interface FeatureToggleInterface
 *
 * @author Gustek
 */
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

    public function __toString();
} 
