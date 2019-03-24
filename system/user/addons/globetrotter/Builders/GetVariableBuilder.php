<?php

namespace Mindpixel\Globetrotter\Builders;

use Mindpixel\Globetrotter\Contracts\Builders\VariableBuilder;
use Mindpixel\Globetrotter\Support\Format\RecursiveParse;

class GetVariableBuilder implements VariableBuilder
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
    // Create an instance of a flat array
    $variables = new RecursiveParse;
    // Set the variable namespace
    $variables->set_key_namespace('get');
    // Return the variables
    return $variables->flatten_nested_attributes($this->get_variables());
  }
}
