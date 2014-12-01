<?php

namespace Gustek\FeatureBundle\FeatureToggle;

use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Class RoleFeatureToggle
 *
 * @author Gustek
 */
class RoleFeatureToggle implements FeatureToggleInterface {

    /** @var SecurityContextInterface */
    private $securityContext;

    /** @var string[] */
    private $roles = array();

    public function __construct(SecurityContextInterface $securityContext) {
        $this->securityContext = $securityContext;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        foreach ($this->roles as $role) {
            if ($this->securityContext->isGranted($role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param array $options
     */
    public function setOptions($options)
    {
        if (!is_array($options)) {
            $options = array($options);
        }
        $this->roles = $options;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'role';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $string = 'Role: [ roles: ';
        $string .= implode(', ', $this->roles);
        $string .= ' ]';
        return $string;
    }
}
