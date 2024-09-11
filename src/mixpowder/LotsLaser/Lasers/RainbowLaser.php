<?php

namespace mixpowder\LotsLaser\Lasers;

use pocketmine\player\Player;
use pocketmine\math\Vector3;
use pocketmine\entity\Entity;

use pocketmine\world\particle\DustParticle;
use pocketmine\world\particle\HugeExplodeParticle;
use mixpowder\LotsLaser\Interfaces\ILazer;

class RainbowLaser extends Laser implements ILazer{
    
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
        return new DustParticle(rand(0, 255), rand(0, 255), rand(0, 255));
    }
    
    /**
     * @param Entity $entity
     */
    public function specialEffect(Entity $entity){
        $this->world->addParticle(new HugeExplodeParticle(new Vector3($entity->getLocation()->getX(), $entity->getLocation()->getY() + 1, $entity->getLocation()->getZ())));
    }
}