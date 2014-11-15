<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 25/10/14
 * Time: 19:10
 */

namespace Gustek\FeatureBundle\Tests\FeatureToggle;


use Gustek\FeatureBundle\FeatureToggle\RoleFeatureToggle;

class RoleFeatureToggleTest extends \PHPUnit_Framework_TestCase {

    /** @var RoleFeatureToggle */
    private $roleToggle;

    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $mockSecurityContext;

    public function setUp() {
        $this->mockSecurityContext = $this->getMock('Symfony\Component\Security\Core\SecurityContextInterface');
        $this->roleToggle = new RoleFeatureToggle($this->mockSecurityContext);
    }

    public function tearDown() {
        $mockSecurityContext = null;
        $this->roleToggle = null;
    }

    public function testGetName() {
        $this->assertEquals('role', $this->roleToggle->getName());
    }

    public function testIsEnabled_HasRole() {
        $role = 'SOME_ROLE';
        $this->roleToggle->setOptions(array('roles' => array($role)));
        $this->mockSecurityContext->expects($this->once())
            ->method('isGranted')
            ->with($role)
            ->willReturn(true);
        $this->assertTrue($this->roleToggle->isEnabled());
    }

    public function testIsEnabled_HasRoleMultipleRoles() {
        $role = 'SOME_ROLE';
        $otherRole = 'OTHER_ROLE';
        $returnMap = array(
            array('SOME_ROLE', null, false),
            array('OTHER_ROLE', null, true),
        );
        $this->roleToggle->setOptions(array('roles' => array($role, $otherRole)));
        $this->mockSecurityContext->expects($this->any())
            ->method('isGranted')
            ->will($this->returnValueMap($returnMap));
        $this->assertTrue($this->roleToggle->isEnabled());
    }

    public function testIsEnabled_DoesntHaveRoleMultipleRoles() {
        $role = 'SOME_ROLE';
        $otherRole = 'OTHER_ROLE';
        $returnMap = array(
            array('SOME_ROLE', null, false),
            array('OTHER_ROLE', null, false),
        );
        $this->roleToggle->setOptions(array('roles' => array($role, $otherRole)));
        $this->mockSecurityContext->expects($this->any())
            ->method('isGranted')
            ->will($this->returnValueMap($returnMap));
        $this->assertFalse($this->roleToggle->isEnabled());
    }

    public function testIsEnabled_DoesntHaveRole() {
        $role = 'SOME_ROLE';
        $this->roleToggle->setOptions(array('roles' => array($role)));
        $this->mockSecurityContext->expects($this->once())
            ->method('isGranted')
            ->with($role)
            ->willReturn(false);
        $this->assertFalse($this->roleToggle->isEnabled());
    }
}
