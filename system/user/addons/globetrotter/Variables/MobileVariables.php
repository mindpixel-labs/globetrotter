<?php

namespace Mindpixel\Globetrotter\Variables;

require PATH_THIRD . 'globetrotter/vendor/autoload.php';

use Mindpixel\Globetrotter\Builders\StandardVariableBuilder;

use Detection\MobileDetect;

class MobileVariables extends StandardVariableBuilder
{
  /**
   * Variables
   *
   * Variables that this class provides
   * @var array
   */
  protected $_variables = [
    'is_mobile' => 'is_mobile',
    'is_tablet' => 'is_tablet'
  ];

  /**
   * Construct class properties
   */
  public function __construct()
  {
    $this->detect = new MobileDetect;
  }

  /**
   * Return the variables
   * @return mixed
   */
  public function get_variables()
  {
    return $this->_variables;
  }

  /**
  * Is Mobile
  *
  * Returns true or false if the device is on mobile
  * @return boolean
  */
  public function is_mobile()
  {
    return $this->detect->isMobile();
  }

  /**
  * Is Tablet
  *
  * Returns true or false if the device is a tablet
  * @return boolean
  */
  public function is_tablet()
  {
    return $this->detect->isTablet();
  }
}
