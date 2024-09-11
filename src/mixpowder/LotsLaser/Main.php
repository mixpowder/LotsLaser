<?php

namespace mixpowder\LotsLaser;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemUseEvent;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{
    
    public function onEnable(): void{
        $this->getLogger()->notice("起動");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    /**
     * @param PlayerItemUseEvent $event
     */
    public function ontap(PlayerItemUseEvent $event){
       $player = $event->getPlayer();
        $itemname = $player->getInventory()->getItemInHand()->getCustomName();
        $class = "mixpowder\\LotsLaser\\Lasers\\$itemname";
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
