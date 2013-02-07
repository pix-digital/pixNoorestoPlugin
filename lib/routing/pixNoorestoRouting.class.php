<?php

/**
 *
 * @package    pixNoorestoRouting
 * @subpackage plugin
 * @author     Nathanaël Martel <nm@pix-digital.com>
 */
class pixNoorestoRouting
{
    /**
     * Listens to the routing.load_configuration event.
     *
     * @param sfEvent An sfEvent instance
     * @static
     */
    static public function addRouteForFrontend(sfEvent $event)
    {
        $r = $event->getSubject();

        // append / prepend our routes
        /*$r->prependRoute('homepage', new sfRoute('/', array('module' => 'pixNooresto', 'action' => 'homepage')));
        $r->appendRoute('pix_nooresto_today', new sfRoute('/aujourdhui', array('module' => 'pixNooresto', 'action' => 'today')));
        $r->appendRoute('pix_nooresto_carte', new sfRoute('/la-carte', array('module' => 'pixNooresto', 'action' => 'card')));
        $r->appendRoute('pix_nooresto_plat', new sfRoute('/la-carte/:slug', array('module' => 'pixNooresto', 'action' => 'plat')));
        $r->appendRoute('pix_nooresto_event', new sfRoute('/agenda', array('module' => 'pixNooresto', 'action' => 'event')));
        $r->appendRoute('pix_nooresto_gallerie', new sfRoute('/gallerie-photo', array('module' => 'pixNooresto', 'action' => 'gallerie')));
        $r->appendRoute('pix_nooresto_gallerie_show', new sfRoute('/gallerie-photo/:slug', array('module' => 'pixNooresto', 'action' => 'gallerie')));
        $r->appendRoute('pix_nooresto_contact', new sfRoute('/contact', array('module' => 'pixNooresto', 'action' => 'contact')));*/

    }


}