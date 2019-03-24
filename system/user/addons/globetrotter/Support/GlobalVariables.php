<?php

namespace Mindpixel\Globetrotter\Support;

use Mindpixel\Globetrotter\Generators\GlobalVariablesGenerator;

class GlobalVariables
{
  /**
   * Global Variables
   * @var array
   */
  public $global_variables;

  /**
   * Initialize Class Properties and Services
   */
  public function __construct()
  {
    self::build();
  }

  /**
   * Build
   *
   * Builds an array of global variables to register within the EE config
   * @return arrray
   */
  protected function build()
  {
    $this->global_variables = (new GlobalVariablesGenerator)->generate();
  }

  /**
   * Register
   *
   * Registers the custom variables onto the EE global variables array
   * @return array
   */
  public function register()
  {
    // Merge variables with current EE globals
    $global_variables = array_merge(ee()->config->_global_vars, $this->global_variables);

    // Set the merged array
    ee()->config->_global_vars = $global_variables;
  }

}
