<?php

namespace Mindpixel\Globetrotter\Builders;

use Mindpixel\Globetrotter\Contracts\Builders\VariableBuilder;

class StandardVariableBuilder implements VariableBuilder
{
  /**
   * Return the classes variables
   * @return array
   */
  public function get_variables()
  {
    return $this->_variables;
  }

  /**
   * Build
   *
   * A method for building the return data
   * @var array
   */
  public function build() {

    // Global variables array to return
    $variables = [];

    foreach ($this->get_variables() as $variable => $method) {
      if(method_exists($this, $method)) {
        $variables[$variable] = $this->$method();
      }
    }

    return $variables;

  }
}
