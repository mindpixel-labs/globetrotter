<?php

namespace Mindpixel\Globetrotter\Contracts\Builders;

interface VariableBuilder
{
  /**
   * Return the classes variables
   * @return array
   */
  public function get_variables();

  /**
   * Define the build method for which a class
   * creates it's variables
   * @return array
   */
  public function build();
}
