<?php

namespace Gustek\FeatureBundle\Tests\FeatureToggle;

use Gustek\FeatureBundle\FeatureToggle\GlobalFeatureToggle;

/**
 * Class GlobalFeatureToggleTest
 *
 * @author Gustek
 */
class GlobalFeatureToggleTest extends \PHPUnit_Framework_TestCase {

    /** @var GlobalFeatureToggle */
    private $globalToggle;

    public function setUp() {
        $this->globalToggle = new GlobalFeatureToggle();
    }

    public function tearDown() {
        $this->globalToggle = null;
    }

    public function testIsEnabled_Enabled() {
        $this->globalToggle->setOptions(true);
        $this->assertTrue($this->globalToggle->isEnabled());
    }

    public function testIsEnabled_Disabled() {
        $this->globalToggle->setOptions(false);
        $this->assertFalse($this->globalToggle->isEnabled());
    }

    public function testGetName() {
        $this->assertEquals('global', $this->globalToggle->getName());
    }

    public function testToString_Disabled() {
        $this->globalToggle->setOptions(false);
        $string = $this->globalToggle->__toString();
        $this->assertEquals(
            'Global: [ enabled: No ]',
            $string
        );
    }

    public function testToString_Enabled() {
        $this->globalToggle->setOptions(true);
        $string = $this->globalToggle->__toString();
        $this->assertEquals(
            'Global: [ enabled: Yes ]',
            $string
        );
    }
}
