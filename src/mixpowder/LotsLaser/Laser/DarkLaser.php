<?php

namespace mixpowder\LotsLaser\Laser;

use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\entity\Entity;

use mixpowder\LotsLaser\Particle\DragonBreathParticle;

use pocketmine\entity\EffectInstance;
use pocketmine\entity\Effect;

class DarkLaser extends Laser{
    
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
     * @return DragonBreathParticle
     */
    public function particle(Vector3 $pos){
        return new DragonBreathParticle($pos);
    }
    
    /**
     * @param Level $level
     * @param Player $player
     * @param Entity $entity
     */
    public function specialEffect(Level $level, Player $player, Entity $entity){
        $entity->addEffect(new EffectInstance(Effect::getEffect(19),4*20,5,true));
    }
}