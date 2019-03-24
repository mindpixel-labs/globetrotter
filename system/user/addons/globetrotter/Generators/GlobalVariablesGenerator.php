<?php

namespace Mindpixel\Globetrotter\Generators;

use Mindpixel\Globetrotter\Contracts\Builders\VariableBuilder;

class GlobalVariablesGenerator
{
  /**
  * Generate The Variables Array
  *
  * Returns an array of parsed variables
  * @return array
  */
  public function generate()
  {

    // Assign variable classes from the config file
    $classes = ee('globetrotter:Config')->get('variables');

    // Fetch the settings from the extension table
    $settings = ee()->db->select('settings')
                    ->from('exp_extensions')
                    ->where('class', 'Globetrotter_ext')
                    ->get()->result_array()[0]['settings'];
  
  // Unserialize the settings
  $settings = unserialize($settings);

    // Global variables array to return
    $global_variables = [];

    foreach($classes as $class) {
      if(class_exists($class)) {
        $short_name = strtolower((new \ReflectionClass($class))->getShortName());
        // Check settings to see if variable building is enabled
        if ($settings[$short_name] === 'y') {
          // Build the variables
          $variables = $this->runClassBuilder(new $class);
          // Add to the global variables array
          $global_variables = array_merge($global_variables, $variables);
        }
      }
    }

    return $global_variables;
  }

  /**
   * Run the builder method on the class instance
   * @return array
   */
  public function runClassBuilder(VariableBuilder $builder)
  {
    return $builder->build();
  }
}
