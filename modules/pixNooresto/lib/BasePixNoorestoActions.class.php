<?php

/**
 * page actions.
 *
 * @package    pixNoorestoPlugin
 * @subpackage pixNooresto
 * @author     Nathanaël Martel <nm@pix-digital.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BasePixNoorestoActions extends sfActions
{
	
		public function executeHomepage(sfWebRequest $request)
		{
			$this->restaurant = Doctrine_Core::getTable('Restaurant')->findOneByNoorestoId(sfConfig::get('app_entity_id'));
	  }
	    
    public function executeToday(sfWebRequest $request)
    {
    	$this->restaurant = Doctrine_Core::getTable('Restaurant')->findOneByNoorestoId(sfConfig::get('app_entity_id'));
    }

    public function executeCard(sfWebRequest $request)
    {
    	$restaurant = Doctrine_Core::getTable('Restaurant')->findOneByNoorestoId(sfConfig::get('app_entity_id'));
    	$this->types = $restaurant->TypeCat;
    	$this->restaurant = $restaurant;
    }

    public function executePlat(sfWebRequest $request)
    {
    	$restaurant = Doctrine_Core::getTable('Restaurant')->findOneByNoorestoId(sfConfig::get('app_entity_id'));
    	$cat = $restaurant->getCat($request->getParameter('slug'));
    	$this->plats = $restaurant->getPlatFromType($cat->nooresto_id);
    	$this->type = Doctrine_Core::getTable('TypeCat')->findOneByNoorestoId($cat->type_cat);
    	$this->cat = $cat;
    	$this->restaurant = $restaurant;
    }

    public function executeEvent(sfWebRequest $request)
    {
    	$restaurant = Doctrine_Core::getTable('Restaurant')->findOneByNoorestoId(sfConfig::get('app_entity_id'));
    	$this->events = $restaurant->getFuturEvent();
    	$this->restaurant = $restaurant;
    }

    public function executeGallerie(sfWebRequest $request)
    {
    	$this->restaurant = Doctrine_Core::getTable('Restaurant')->findOneByNoorestoId(sfConfig::get('app_entity_id'));
    }

    public function executeContact(sfWebRequest $request)
    {
    	$this->restaurant = Doctrine_Core::getTable('Restaurant')->findOneByNoorestoId(sfConfig::get('app_entity_id'));
    }

    protected function loadMetas($params = array()){

        if(empty($params)){
			return;
		}

		$response = $this->getResponse();

		if(array_key_exists('title', $params)){
			$response->setTitle(sfConfig::get('app_pixPage_metas_default_title').$params['title']);
		}

		if(array_key_exists('description', $params)){
			$response->addMeta('description', sfConfig::get('app_pixPage_metas_default_description').$params['description']);
		}

		if(array_key_exists('keywords', $params)){
			$response->addMeta('keywords', sfConfig::get('app_pixPage_metas_default_keywords').strtolower($params['keywords']));
		}
	}
}
