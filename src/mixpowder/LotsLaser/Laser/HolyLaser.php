<?php

namespace mixpowder\LotsLaser\Laser;

use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\entity\Entity;

use mixpowder\LotsLaser\Particle\BalloonGasParticle;

class HolyLaser extends Laser{
    
    /**
     * @param Player $player
     * @param int $damage
     * @param float $knockback
     * @param int $distance
     */
    public function __construct(Player $player, int $damage, float $knockback, int $distance){
        $this->level = $player->getLevel();
        $this->player = $player;
        $this->damage = $damage;
        $this->knockback = $knockback;
        $this->distance = $distance;
    }
    
    public function execute(){
        parent::excute($this->level, $this->player, $this->damage, $this->knockback, $this->distance, $this);
    }
    
    /**
     * @param Vector3 $pos
     * @return BalloonGasParticle
     */
    public function particle(Vector3 $pos){
        return new BalloonGasParticle($pos);
    }
    
    /**
     * @param Level $level
     * @param Player $player
     * @param Entity $entity
     */
    public function specialEffect(Level $level, Player $player, Entity $entity){
        $player->setHealth($player->getHealth()+($this->damage/5));
    }
}