<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 25/10/14
 * Time: 19:10
 */

namespace Gustek\FeatureBundle\FeatureToggle;


use Symfony\Component\Security\Core\SecurityContextInterface;

class RoleFeatureToggle implements FeatureToggleInterface {

    /** @var SecurityContextInterface */
    private $securityContext;

    /** @var string[] */
    private $roles = [];

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
        if (isset($options['roles'])) {
            $this->roles = $options['roles'];
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'role';
    }
}