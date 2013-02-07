<?php
/**
 * page components.
 *
 * @package    pixNoorestoPlugin
 * @subpackage pixNooresto
 * @author     Nathanaël Martel <nm@pix-digital.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BasePixNoorestoComponents extends sfComponents
{
	
	public function executeDiaporama(sfWebRequest $request)
	{
	
		$diaporamaFolder = $this->folder;
		
		$media_list = array();
		
		if ($handle = opendir(sfConfig::get('sf_web_dir') . $diaporamaFolder)) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != ".." && $file != ".svn") {
					$media_list[] = $diaporamaFolder . '/' . $file;
				}
			}
			closedir($handle);
		}
	
		$this->visuels = $media_list;
	}
}
