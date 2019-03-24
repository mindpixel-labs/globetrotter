<?php

namespace Mindpixel\Globetrotter\Support\Format;

class RecursiveParse
{
  /**
   * Key Namespace
   * @var string
   */
  protected $_key_namespace;

  /**
   * Constructor
   *
   *
   * @return void
   */
  public function __construct()
  {

  }

  /**
   * Return the namespace for the array key
   *
   * @return string
   */
  public function get_key_namepsace()
  {
    return $this->_key_namespace;
  }

  /**
   * Return the namespace for the array key
   *
   * @param $namespace string
   * @return void
   */
  public function set_key_namespace($namespace)
  {
    $this->_key_namespace = $namespace;
  }

  /**
   * Array Flat
   *
   * Flatten multidimensional array by concatenating keys
   * @return array
   */
  public function flatten_nested_attributes(array $array, $prefix = '')
  {
      $result = array();

      foreach ($array as $key => $value)
      {
          $new_key = $prefix . (empty($prefix) ? '' : '_') . $key;

          if (is_array($value))
          {
              $result = array_merge($result, self::flatten_nested_attributes($value, $new_key));
          }
          else
          {
              $result[$this->get_key_namepsace() . ':' .$new_key] = $value;
          }
      }

      return $result;
  }
}
