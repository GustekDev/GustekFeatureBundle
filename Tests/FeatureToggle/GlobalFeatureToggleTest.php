<?php
/**
 * Created by PhpStorm.
 * User: gustek
 * Date: 25/10/14
 * Time: 18:27
 */

namespace Gustek\FeatureBundle\Tests\FeatureToggle;


use Gustek\FeatureBundle\FeatureToggle\GlobalFeatureToggle;

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
}
