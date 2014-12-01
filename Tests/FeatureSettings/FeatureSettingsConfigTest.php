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
                'toggles' => array(
                    'toggle1' => 'option1',
                    'toggle2' => 'option2',
                ),
            ),
            'feature2' => array(
                'toggles' => array(
                    'someToggle' => 'someOption',
                    'otherToggle' => 'otherOption',
                ),
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

        $this->assertEquals($this->features['feature1']['toggles'], $toggles1);
        $this->assertEquals($this->features['feature2']['toggles'], $toggles2);
    }

}
