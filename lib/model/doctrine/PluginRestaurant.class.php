<?php

/**
 * PluginRestaurant
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginRestaurant extends BaseRestaurant
{
	
	public function __toString() {
		return $this->nom_resto;
	}
	
	
  public function __isset($name)
  {
      return $this->contains($name);
  }

	public function bindInfos($datas) {
		
		foreach ($datas->attributes() as $key => $value) {
			$key = strtolower($key);
			if ($this->__isset($key))
				$this->$key = $value;
		}
		
		$this->save();
		
		return $this->data_version;
	}

	public function bindInfosResto($datas) {
		
		if (count($datas->InfosResto) > 0)
		{
			Doctrine_Core::getTable('InfosResto')->createQuery('c')->where('restaurant_id = ?', $this->id)->delete()->execute();
			foreach ($datas->InfosResto as $info_resto) {
				$InfosResto = new InfosResto();
				$InfosResto->restaurant_id = $this->id;
				
				foreach ($info_resto->attributes() as $key => $value) {
					$key = strtolower($key);
					if ($key == 'id') $key = 'nooresto_id';
					if ($InfosResto->__isset($key)) {
						$InfosResto->$key = $value;
					}
				}
				
				$InfosResto->save();
			}
		}
	}

	public function bindDaily($datas) {
		
		if (count($datas->Daily) > 0)
		{
			Doctrine_Core::getTable('Daily')->createQuery('c')->where('restaurant_id = ?', $this->id)->delete()->execute();
			foreach ($datas->Daily as $daily) {
				$Daily = new Daily();
				$Daily->restaurant_id = $this->id;
				
				foreach ($daily->attributes() as $key => $value) {
					$key = strtolower($key);
					str_replace('desc', 'description', $key);
					if ($key == 'id') $key = 'nooresto_id';
					if ($Daily->__isset($key)) {
						$Daily->$key = $value;
					}
				}
				
				$Daily->save();
			}
		}
	}

	public function bindCarte($datas) {
		
		if (count($datas->Carte) > 0)
		{
			Doctrine_Core::getTable('Carte')->createQuery('c')->where('restaurant_id = ?', $this->id)->delete()->execute();
			foreach ($datas->Carte as $carte) {
				$Carte = new Carte();
				$Carte->restaurant_id = $this->id;
				
				foreach ($carte->attributes() as $key => $value) {
					$key = strtolower($key);
					if ($key == 'id') $key = 'nooresto_id';
					if ($Carte->__isset($key)) {
						$Carte->$key = $value;
					}
				}
				
				$Carte->save();
			}
		}
	}

	public function bindTypeCat($datas, $copy_image = false) {
		
		$base_image_url = 'https://manager.nooresto.com/datas/cartes/typecat/';
		
		if (count($datas->TypeCat) > 0)
		{
			Doctrine_Core::getTable('TypeCat')->createQuery('c')->where('restaurant_id = ?', $this->id)->delete()->execute();
			foreach ($datas->TypeCat as $type_cat) {
				$TypeCat = new TypeCat();
				$TypeCat->restaurant_id = $this->id;
				
				foreach ($type_cat->attributes() as $key => $value) {
					$key = strtolower($key);
					if ($key == 'id') $key = 'nooresto_id';
					if ($TypeCat->__isset($key)) {
						$TypeCat->$key = $value;
					}
				}
				
				$TypeCat->save();
				
				if ($copy_image) {
					$src = str_replace('.png', '@2x.png', $TypeCat->image);
					$src = $base_image_url.str_replace('.jpg', '@2x.jpg', $src);
					$dest = sfConfig::get('sf_web_dir').'/uploads/typecat/'.$TypeCat->image;
					copy($src, $dest);
				}
			}
		}
	}

	public function bindCat($datas, $copy_image = false) {
		
		$base_image_url = 'https://manager.nooresto.com/datas/cartes/scat/';
		
		if (count($datas->Cat) > 0)
		{
			Doctrine_Core::getTable('Cat')->createQuery('c')->where('restaurant_id = ?', $this->id)->delete()->execute();
			foreach ($datas->Cat as $cat) {
				$Cat = new Cat();
				$Cat->restaurant_id = $this->id;
				
				foreach ($cat->attributes() as $key => $value) {
					$key = strtolower($key);
					if ($key == 'id') $key = 'nooresto_id';
					if ($Cat->__isset($key)) {
						$Cat->$key = $value;
					}
				}
				
				$Cat->save();
				
				if ($copy_image) {
					$src = str_replace('.png', '@2x.png', $Cat->image);
					$src = $base_image_url.str_replace('.jpg', '@2x.jpg', $src);
					$dest = sfConfig::get('sf_web_dir').'/uploads/cat/'.$Cat->image;
					copy($src, $dest);
				}
			}
		}
	}

	public function bindPlat($datas) {
		
		if (count($datas->Plat) > 0)
		{
			Doctrine_Core::getTable('Plat')->createQuery('c')->where('restaurant_id = ?', $this->id)->delete()->execute();
			foreach ($datas->Plat as $plat) {
				$Plat = new Plat();
				$Plat->restaurant_id = $this->id;
				
				foreach ($plat->attributes() as $key => $value) {
					$key = strtolower($key);
					if ($key == 'id') $key = 'nooresto_id';
					if ($Plat->__isset($key)) {
						$Plat->$key = $value;
					}
				}
				
				$Plat->save();
			}
		}
	}

	public function bindEvent($datas) {
		
		if (count($datas->Event) > 0)
		{
			Doctrine_Core::getTable('Event')->createQuery('c')->where('restaurant_id = ?', $this->id)->delete()->execute();
			foreach ($datas->Event as $event) {
				$Event = new Event();
				$Event->restaurant_id = $this->id;
				
				foreach ($event->attributes() as $key => $value) {
					$key = strtolower($key);
					if ($key == 'id') $key = 'nooresto_id';
					if ($Event->__isset($key)) {
						$Event->$key = $value;
					}
				}
				
				$Event->save();
			}
		}
	}

	public function bindFormule($datas) {
		
		if (count($datas->Formule) > 0)
		{
			Doctrine_Core::getTable('Formule')->createQuery('c')->where('restaurant_id = ?', $this->id)->delete()->execute();
			foreach ($datas->Formule as $formule) {
				$Formule = new Formule();
				$Formule->restaurant_id = $this->id;
				
				foreach ($formule->attributes() as $key => $value) {
					$key = strtolower($key);
					if ($key == 'id') $key = 'nooresto_id';
					if ($Formule->__isset($key)) {
						$Formule->$key = $value;
					}
				}
				
				$Formule->save();
			}
		}
	}

	public function bindGallery($datas, $copy_image = false) {
		
		$base_gallerie_xml_url = 'http://manager.nooresto.com/mobile/getphotos.php?rep=';
		
		if (count($datas->Gallery) > 0)
		{
			Doctrine_Core::getTable('Gallery')->createQuery('c')->where('restaurant_id = ?', $this->id)->delete()->execute();
			foreach ($datas->Gallery as $gallery) {
				$Gallery = new Gallery();
				$Gallery->restaurant_id = $this->id;
				
				foreach ($gallery->attributes() as $key => $value) {
					$key = strtolower($key);
					if ($key == 'id') $key = 'nooresto_id';
					if ($Gallery->__isset($key)) {
						$Gallery->$key = $value;
					}
				}
				
				$Gallery->save();
				
				if ($copy_image) {
					$base_gallerie_url = 'https://manager.nooresto.com/datas/galeries/'.$this->nooresto_id.'/'.$Gallery->file_galerie.'/normal@2x/';
          
					$dest = sfConfig::get('sf_web_dir').'/uploads/galeries/'.$this->slug;
					if (!file_exists($dest))
						mkdir($dest);
					
					$dest .= '/'.$Gallery->slug.'/';
					if (!file_exists($dest))
						mkdir($dest);
					
					$handle = curl_init($base_gallerie_xml_url.$this->nooresto_id.'/'.$Gallery->file_galerie);
					curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
					$page = curl_exec($handle);
					
					$curl_getinfo = curl_getinfo($handle);
					curl_close($handle);
					
					$datas_flux = new SimpleXMLElement($page);
					foreach ($datas_flux->File as $file) {
						copy($base_gallerie_url.$file['name'], $dest.$file['name']);
					}
				}
			}
		}
	}
	
	public function getCatFromType($type_cat_id) {
			$q = Doctrine_Core::getTable('Cat')->createQuery('c')
																		->where('restaurant_id = ?', $this->id)
																		->andWhere('type_cat = ?', $type_cat_id);
			return $q->execute();
	}
	
	public function getPlatFromType($type_cat_id) {
			$q = Doctrine_Core::getTable('Plat')->createQuery('c')
																		->where('restaurant_id = ?', $this->id)
																		->andWhere('top_cat_id = ?', $type_cat_id);
			return $q->execute();
	}
	
	public function getCatType($cat_type_slug) {
			$rs = Doctrine_Core::getTable('TypeCat')->createQuery('c')
																		->where('restaurant_id = ?', $this->id)
																		->andWhere('slug = ?', $cat_type_slug)
																		->execute();
			return $rs[0];
	}
	
	public function getCat($cat_slug) {
			$rs = Doctrine_Core::getTable('Cat')->createQuery('c')
																		->where('restaurant_id = ?', $this->id)
																		->andWhere('slug = ?', $cat_slug)
																		->execute();
			return $rs[0];
	}
	
	public function nextRestaurant() {
			$restaurant = Doctrine_Core::getTable('Restaurant')->createQuery('c')
																												 ->where('id > ?', $this->id)
																												 ->orderBy('id ASC')
																												 ->fetchOne();
			if ($restaurant instanceof Restaurant)
				return $restaurant;
				
			
			$restaurant = Doctrine_Core::getTable('Restaurant')->createQuery('c')
																												 ->orderBy('id ASC')
																												 ->fetchOne();
			
			return $restaurant;
	}
	
	public function prevRestaurant() {
			$restaurant = Doctrine_Core::getTable('Restaurant')->createQuery('c')
																												 ->where('id < ?', $this->id)
																												 ->orderBy('id DESC')
																												 ->fetchOne();
			if ($restaurant instanceof Restaurant)
				return $restaurant;
				
			
			$restaurant = Doctrine_Core::getTable('Restaurant')->createQuery('c')
																												 ->orderBy('id DESC')
																												 ->fetchOne();
			
			return $restaurant;
	}
	
	public function getFuturEvent() {
			return Doctrine_Core::getTable('Event')->createQuery('c')
																						 ->where('restaurant_id = ?', $this->id)
																						 ->addWhere('new_date_start > ?', date('Y-m-d'))
																						 ->orderBy('new_date_start DESC')
																						 ->execute();
		
	}
	
}

