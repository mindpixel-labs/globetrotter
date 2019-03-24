<?php

namespace Mindpixel\Globetrotter\Support;

class Config
{
  /**
   * Configuration Data
   */
  protected $_data;

  /**
  * Set the configuration data
  *
  * @return void
  */
  public function __construct()
  {
    return $this->_data = include(PATH_THIRD . "/globetrotter/config/config.php");
  }

  /**
   * Return data from the configuration data array
   * @var string $key
   * @return mixed
   */
  public function get($key)
  {
    return $this->_data[$key];
  }
}
