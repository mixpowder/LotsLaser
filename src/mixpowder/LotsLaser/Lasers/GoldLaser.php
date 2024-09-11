<?php

namespace mixpowder\LotsLaser\Lasers;

use pocketmine\player\Player;
use pocketmine\entity\Entity;
use pocketmine\item\Item;

use pocketmine\world\particle\DustParticle;

use mixpowder\LotsLaser\Interfaces\ILazer;

class GoldLaser extends Laser implements ILazer{
    
    /**
     * @param Player $player
     */
    public function __construct(Player $player){
        $this->world = $player->getWorld();
        $this->player = $player;
    }
    
    public function execute(){
        parent::shoot($this->world, $this->player, $this);
    }

    /**
     * @return int
     */    
    public function getDamage(): int{
        return 10;
    }

    /**
     * @return float
     */    
    public function getKnockback(): float{
        return 0.4;
    }

    /**
     * @return int
     */    
    public function getDistance(): int{
        return 20;
    }
    
    /**
     * @return DustParticle
     */
    public function getParticle(){
        return new DustParticle(250, 215, 0);
    }
    
    /**
     * @param Entity $entity
     */
    public function specialEffect(Entity $entity){
        $this->world->dropItem(new Vector3($entity->getLocation()->getX() ,$entity->getLocation()->getY() ,$entity->getLocation()->getZ()), Item::get(41,0));
    }
}