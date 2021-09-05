<?php

namespace mixpowder\LotsLaser;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;

use mixpowder\LotsLaser\Laser\RainbowLaser;
use mixpowder\LotsLaser\Laser\DarkLaser;
use mixpowder\LotsLaser\Laser\HolyLaser;
use mixpowder\LotsLaser\Laser\GoldLaser;
use mixpowder\LotsLaser\Laser\LaunchLaser;

class Main extends PluginBase implements Listener{
    
    public function onEnable() {
        $this->getLogger()->notice("起動");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    /**
     * @param PlayerInteractEvent $event
     */
    public function ontap(PlayerInteractEvent $event){
        $player = $event->getPlayer();
        if($player->getInventory()->getItemInHand()->getCustomName() == "RainbowLaser"){
            (new RainbowLaser($player, 10, 0.4, 20))->execute();
        }elseif($player->getInventory()->getItemInHand()->getCustomName() == "DarkLaser"){
            (new DarkLaser($player, 10, 0.4, 100))->execute();
        }elseif($player->getInventory()->getItemInHand()->getCustomName() == "HolyLaser"){
            (new HolyLaser($player, 10, 0.4, 100))->execute();
        }elseif($player->getInventory()->getItemInHand()->getCustomName() == "GoldLaser"){
            (new GoldLaser($player, 10, 0.4, 10))->execute();   
        }elseif($player->getInventory()->getItemInHand()->getCustomName() == "LaunchLaser"){
            (new LaunchLaser($player, 10, 0.4, 10))->execute();   
        }
    }
}
