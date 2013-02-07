
        <div class="actions">
          <ul>
            <li class="action-close"><a href="http://<?php echo sfConfig::get('app_url_entity_portail')?>" title="Nice Restaurant"></a></li>
            <li class="social-twitter"><a href="http://twitter.com/share?text=<?php echo str_replace(' ', '%20', $restaurant->nom_resto.' Restaurant à Nice')?>&url=http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" target="_blank"></a></li>
            <li class="social-facebook"><a href="http://www.facebook.com/sharer.php?u=http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>&t=<?php echo str_replace(' ', '%20', $restaurant->nom_resto.' Restaurant à Nice')?>" target="_blank"></a></li>
            <li class="action-next"><a href="http://<?php echo $restaurant->prevRestaurant()->url ?>" title="Nice Restaurant : <?php echo $restaurant->prevRestaurant()->nom_resto ?>"></a></li>
            <li class="action-prev"><a href="http://<?php echo $restaurant->nextRestaurant()->url ?>" title="Nice Restaurant : <?php echo $restaurant->nextRestaurant()->nom_resto ?>"></a></li>
          </ul>
        </div>
        
        