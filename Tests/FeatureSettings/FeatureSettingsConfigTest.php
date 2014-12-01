<?php

namespace Gustek\FeatureBundle\Tests\FeatureSettings;
use Gustek\FeatureBundle\FeatureSettings\FeatureSettingsConfig;

/**
 * Class FeatureSettingsConfigTest
 * 
 * @author Gustek
 */
class FeatureSettingsConfigTest extends \PHPUnit_Framework_TestCase {

    /** @var FeatureSettingsConfig */
    private $featureSettingsConfig;

    private $features;

    public function setUp() {
        $this->features = array(
            'feature1' => array(
                'toggle1' => 'option1',
                'toggle2' => 'option2',
            ),
            'feature2' => array(
                'someToggle' => 'someOption',
                'otherToggle' => 'otherOption',
            )
        );
        $this->featureSettingsConfig = new FeatureSettingsConfig($this->features);
    }

    public function testGetToggles_NotExistentFeature() {
        $this->setExpectedException('Gustek\FeatureBundle\Exception\FeatureNotFoundException');
        $this->featureSettingsConfig->getToggles('noFeature');
    }

    public function testGetToggle_ExistentFeature() {
        $toggles1 = $this->featureSettingsConfig->getToggles('feature1');
        $toggles2 = $this->featureSettingsConfig->getToggles('feature2');

        $this->assertEquals($this->features[0], $toggles1);
        $this->assertEquals($this->features[1], $toggles2);
    }

}
