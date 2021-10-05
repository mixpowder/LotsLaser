<?php

namespace mixpowder\LotsLaser;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;

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
        $itemname = $player->getInventory()->getItemInHand()->getCustomName();
        $class = "mixpowder\\LotsLaser\\Laser\\$itemname";
        switch($itemname){
            case "RainbowLaser":
            case "DarkLaser":
            case "HolyLaser":
            case "GoldLaser":
            case "LaunchLaser":
            case "FireLaser":
                (new $class($player))->execute();
                break;
        }
    }
}
