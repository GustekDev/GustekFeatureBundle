<?php

namespace Gustek\FeatureBundle\FeatureToggle;

/**
 * Class GlobalFeatureToggle
 *
 * @author Gustek
 */
class GlobalFeatureToggle implements FeatureToggleInterface {

    /** @var bool */
    private $enabled = false;

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $options
     */
    public function setOptions($options)
    {
        $this->enabled = (bool) $options;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'global';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $string = 'Global: [ enabled: ';
        $string .= $this->enabled ? 'Yes' : 'No';
        $string .= ' ]';
        return $string;
    }
}
