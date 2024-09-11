<?php

namespace mixpowder\LotsLaser\Lasers;

use pocketmine\player\Player;
use pocketmine\math\Vector3;
use pocketmine\entity\Entity;

use pocketmine\world\particle\PortalParticle;
use mixpowder\LotsLaser\Interfaces\ILazer;

class LaunchLaser extends Laser implements ILazer{
    
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
     * @return PortalParticle
     */
    public function getParticle(){
        return new PortalParticle();
    }
    
    /**
     * @param Entity $entity
     */
    public function specialEffect(Entity $entity){
        $entity->setMotion(new Vector3(0, 2, 0));
    }
}