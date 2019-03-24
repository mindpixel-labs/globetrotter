<?php

/*
|--------------------------------------------------------------------------
| Module Setup File
|--------------------------------------------------------------------------
|
| Provides descriptive data about add-on author, name, and version
| as well as other description data.
|
*/

$info = array(
      'author'         => 'Mindpixel',
      'author_url'     => '',
      'name'           => 'Globetrotter',
      'description'    => 'An add-on for Expression Engine CMS 5.x that provides additional early parsed variables that can be used anywhere within your templates.',
      'version'        => '1.0.0',
      'namespace'      => 'Mindpixel\Globetrotter',
      'settings_exist' => TRUE,
      'services.singletons' => [
        'Config' => function($addon)
        {
          $dependency = new Mindpixel\Globetrotter\Support\Config();
          return $dependency;
        }
      ]
);

return $info;
