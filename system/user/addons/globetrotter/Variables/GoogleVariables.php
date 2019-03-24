<?php

namespace Mindpixel\Globetrotter\Variables;

use Mindpixel\Globetrotter\Builders\StandardVariableBuilder;

class GoogleVariables extends StandardVariableBuilder
{
  /**
   * Variables
   *
   * Variables that this class provides
   * @var array
   */
  protected $_variables = [
    'google:gclid' => 'get_click_identifier',
    'google:gacid' => 'get_campaign_identifier'
  ];

  /**
   * Construct class properties
   */
  public function __construct()
  {
  }

  /**
   * Return the variables
   * @return mixed
   */
  public function get_variables()
  {
    return $this->_variables;
  }

  /**
  * Get Google Click Identifier
  *
  * {google:gclid}
  *
  * Returns a Google GCLID from either the query string or a cookie
  * @return string
  */
  public function get_click_identifier()
  {
    $value = '(empty)';

    if(isset($_GET['gclid'])) {
      $value = ee('Security/XSS')->clean($_GET['gclid']);
    } elseif(isset($_COOKIE['gclid'])) {
      $value = ee('Security/XSS')->clean($_COOKIE['gclid']);
    }

    return $value;
  }

  /**
  * Get Google Campaign Identifier
  *
  * {google:gacid}
  *
  * Returns a Google CID from a cookie
  * @return string
  */
  public function get_campaign_identifier()
  {
    $value = '';

    if(isset($_COOKIE['gacid'])) {
      $value = ee('Security/XSS')->clean($_COOKIE['gacid']);
    }

    return $value;
  }
}
