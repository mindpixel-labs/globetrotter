<?php

namespace Mindpixel\Globetrotter\Variables;

use Mindpixel\Globetrotter\Builders\GetVariableBuilder;

class GetVariables extends GetVariableBuilder
{
  /**
   * Construct class properties
   */
  public function __construct()
  {
  }

  /**
   * Return the variables
   * @return array
   */
  public function get_variables()
  {
    return ee('Security/XSS')->clean($_GET);
  }
}
