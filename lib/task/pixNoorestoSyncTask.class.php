<?php

class noorestoSyncTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));
    $this->namespace        = 'pix';
    $this->name             = 'nooresto-sync';
    $this->briefDescription = 'Synchronise datas with Nooresto';

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));
    
    $this->detailedDescription = <<<EOF
The [noorestoSync|INFO] task does things.
Call it with:

  [php symfony noorestoSync|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    
    sfTask::log('Début de synchronisation ['.date('d/m/Y H:i:s').']');
    $begin = time();
    
    $base_url = 'https://manager.nooresto.com/mobile/getdata.php?userid=';
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginGalleryTable.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginGallery.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginFormuleTable.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginFormule.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginEventTable.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginEvent.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginPlatTable.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginPlat.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginCatTable.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginCat.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginTypeCatTable.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginTypeCat.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginCarteTable.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginCarte.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginDailyTable.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginDaily.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginInfosRestoTable.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginInfosResto.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginRestaurantTable.class.php');
    require_once('plugins/pixNoorestoPlugin/lib/model/doctrine/PluginRestaurant.class.php');
    
    $restaurants = Doctrine_Core::getTable('Restaurant')->createQuery('c')->orderBy('updated_at ASC')->execute();
    foreach ($restaurants as $restaurant)
    {	
    	sfTask::log('Restaurant : '.$restaurant->id.' '.$restaurant->nom_resto);
    	$flux = $this->getFlux($base_url.$restaurant->nooresto_id);
    	$datas_flux = new SimpleXMLElement($flux);
    	$restaurant->bindInfos($datas_flux->Infos[0]);
    	$restaurant->bindInfosResto($datas_flux);
    	$restaurant->bindDaily($datas_flux);
    	$restaurant->bindCarte($datas_flux);
    	$restaurant->bindTypeCat($datas_flux, false);
    	$restaurant->bindCat($datas_flux, false);
    	$restaurant->bindPlat($datas_flux);
    	$restaurant->bindEvent($datas_flux);
    	$restaurant->bindFormule($datas_flux);
    	$restaurant->bindGallery($datas_flux, false);
    	
    	//$restaurant->bindTypeCat($datas_flux, true);
    	//$restaurant->bindCat($datas_flux, true);
    	//$restaurant->bindGallery($datas_flux, true);
    }
    
    $elapsed_time = time() - $begin;
    sfTask::log('Fin de synchronisation ['.date('d/m/Y H:i:s').']');
    sfTask::log('Temps écoulé (secondes) :'.$elapsed_time);
    
  }
  
  public function getFlux($url) {
  	
  	$handle = curl_init($url);
  	curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
  	$page = curl_exec($handle);
  		      
  	$curl_getinfo = curl_getinfo($handle);
  	curl_close($handle);
  	
  	return $page;
  }
}
