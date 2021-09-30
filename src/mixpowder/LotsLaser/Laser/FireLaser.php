<?php

namespace mixpowder\LotsLaser\Laser;

use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\entity\Entity;

use pocketmine\level\particle\FlameParticle;

class FireLaser extends Laser{
    
    /**
     * @param Player $player
     */
    public function __construct(Player $player){
        $this->level = $player->getLevel();
        $this->player = $player;
    }
    
    public function execute(){
        parent::excute($this->level, $this->player, $this->getDamage(), $this->getKnockback(), $this->getDistance(), $this);
    }
    
    private function getDamage(): int{
        return 10;
    }
    
    private function getKnockback(): float{
        return 0.4;
    }
    
    private function getDistance(): int{
        return 20;
    }
    
    /**
     * @param Vector3 $pos
     * @return DragonBreathParticle
     */
    public function particle(Vector3 $pos){
        return new FlameParticle($pos);
    }
    
    /**
     * @param Level $level
     * @param Player $player
     * @param Entity $entity
     */
    public function specialEffect(Level $level, Player $player, Entity $entity){
        $entity->setOnFire(5);
    }
}