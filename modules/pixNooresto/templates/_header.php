
      <div class="mobile">
        <a href="<?php echo $restaurant->googleplay?>" class="googleplay" target="_blank" ></a>
        <a href="http://itunes.apple.com/fr/app/id<?php echo $restaurant->appstore_id?>" class="appstore" target="_blank" ></a>
        <div class="clear"></div>
      </div>


      <div class="header">
        <header>
          <a href="<?php echo url_for('homepage') ?>" class="logo"><img src="/media/<?php echo $restaurant->slug?>/logo.png" alt="<?php echo $restaurant->nom_resto?>" /></a>
          
          <div class="nav">
          	<nav>
          		<ul>
          			<li><a href="<?php echo url_for('@homepage') ?>" class="<?php echo ($sf_request->getParameter('action') == 'homepage')?'active':'';?>">Le Restaurant<span class="fleche"></span></a></li>
          			<li><a href="<?php echo url_for('@pix_nooresto_today') ?>" class="<?php echo ($sf_request->getParameter('action') == 'today')?'active':'';?>">Aujourd'hui<span class="fleche"></span></a></li>
          			<li><a href="<?php echo url_for('@pix_nooresto_carte') ?>" class="<?php echo (($sf_request->getParameter('action') == 'card') || ($sf_request->getParameter('action') == 'plat'))?'active':'';?>">La Carte<span class="fleche"></span></a></li>
          			<li><a href="<?php echo url_for('@pix_nooresto_event') ?>" class="<?php echo ($sf_request->getParameter('action') == 'event')?'active':'';?>">Agenda<span class="fleche"></span></a></li>
          			<li><a href="<?php echo url_for('@pix_nooresto_gallerie') ?>" class="<?php echo ($sf_request->getParameter('action') == 'gallerie')?'active':'';?>">Galerie Photo<span class="fleche"></span></a></li>
          			<li><a href="<?php echo url_for('@pix_nooresto_contact') ?>" class="<?php echo ($sf_request->getParameter('action') == 'contact')?'active':'';?>">Contact<span class="fleche"></span></a></li>
          		</ul>
          	</nav>
          </div>
          
          <div class="qrcode"><img src="/media/<?php echo $restaurant->slug?>/qr-code.png" alt="<?php echo $restaurant->nom_resto?>" /></div>
          
          <a href="<?php echo $restaurant->googleplay?>" class="googleplay" target="_blank" ></a>
          
          <a href="http://itunes.apple.com/fr/app/id<?php echo $restaurant->appstore_id?>" class="appstore" target="_blank" ></a>
          
          <a href="http://www.pix-digital.com/" id="pix" title="réalisation Pix &amp; Associates / Digital" target="_blank"></a>
          
        </header>
      </div>