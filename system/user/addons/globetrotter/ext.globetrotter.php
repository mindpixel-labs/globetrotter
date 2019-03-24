<?php

use Mindpixel\Globetrotter\Support\GlobalVariables;

class Globetrotter_ext {

    /**
     * Name
     */
    public $name = 'Globetrotter';

    /**
     * Version
     */
    public $version = '1.0.0';

    /**
     * Description
     */
    public $description = 'An add-on for Expression Engine CMS 5.x that provides additional early parsed variables that can be used anywhere within your templates.';

    /**
     * Settings Exist
     */
    public $settings_exist = 'y';

    /**
     * Docs URL
     */
    public $docs_url  = 'https://github.com/mindpixel-labs/globetrotter/wiki';

    /**
     * Settings
     */
    public $settings = [];

    /**
     * Constructor
     *
     * @param   mixed   Settings array or empty string if none exist.
     */
    function __construct($settings = '')
    {
        $this->settings = $settings;
    }

    /**
     * Activate Extension
     *
     * This function enters the extension into the exp_extensions table
     *
     * @see https://ellislab.com/codeigniter/user-guide/database/index.html for
     * more information on the db class.
     *
     * @return void
     */
    function activate_extension()
    {
        // All extension hooks
        $hooks = [
          'template_fetch_template' => 'set_global_variables'
        ];

        foreach($hooks as $hook => $method) {
          $data = array(
            'class'     => __CLASS__,
            'method'    => $method,
            'hook'      => $hook,
            'settings'  => serialize($this->settings),
            'priority'  => 10,
            'version'   => $this->version,
            'enabled'   => 'y'
          );

          ee()->db->insert('extensions', $data);
        }
    }

    /**
     * Set Variables
     *
     * Sets early parsed global variables onto the ExpressionEngine Configuration Object
     *
     * @return void
     */
    public function set_global_variables()
    {
      (new GlobalVariables)->register();
    }

    /**
     * Settings
     *
     * Build the extension settings form
     *
     * @return void
     */
    public function settings()
    {
      $settings = [];

      $settings['getvariables'] = array('r', array('y' => "Yes", 'n' => "No"), 'y');

      $settings['postvariables'] = array('r', array('y' => "Yes", 'n' => "No"), 'y');

      $settings['mobilevariables'] = array('r', array('y' => "Yes", 'n' => "No"), 'y');

      $settings['googlevariables'] = array('r', array('y' => "Yes", 'n' => "No"), 'y');

      return $settings;
    }

    /**
     * Disable Extension
     *
     * This method removes information from the exp_extensions table
     *
     * @return void
     */
    public function disable_extension()
    {
        ee()->db->where('class', __CLASS__);
        ee()->db->delete('extensions');
    }

}
