<?php

namespace Mindpixel\Globetrotter\Variables;

use Mindpixel\Globetrotter\Builders\PostVariableBuilder;

class PostVariables extends PostVariableBuilder
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
    return ee('Security/XSS')->clean($_POST);
  }
}
