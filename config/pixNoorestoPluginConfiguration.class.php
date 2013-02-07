<?php

/**
 * pixNoorestoPlugin configuration.
 * 
 * @package    pixNoorestoPlugin
 * @subpackage config
 * @author     Nathanaël Martel <nm@pix-associates.com>
 */
class pixNoorestoPluginConfiguration extends sfPluginConfiguration
{
  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
  	$this->dispatcher->connect('routing.load_configuration', array('pixNoorestoRouting', 'addRouteForFrontend'));
  }
}
