<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 25/10/14
 * Time: 18:26
 */

namespace Gustek\FeatureBundle\FeatureToggle;


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
     * @param array $options
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
}
