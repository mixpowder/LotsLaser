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
     */
    public function __construct(Player $player){
        $this->level = $player->getLevel();
        $this->player = $player;
    }
    
    public function execute(){
        parent::shoot($this->level, $this->player, $this);
    }
    
    public function getDamage(): int{
        return 10;
    }
    
    public function getKnockback(): float{
        return 0.4;
    }
    
    public function getDistance(): int{
        return 20;
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
        $entity->addEffect(new EffectInstance(Effect::getEffect(19), 4 * 20, 5, true));
    }
}