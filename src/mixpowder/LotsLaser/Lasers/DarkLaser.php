<?php

namespace mixpowder\LotsLaser\Lasers;

use pocketmine\player\Player;
use pocketmine\entity\Entity;

use mixpowder\LotsLaser\Particles\DragonBreathParticle;
use pocketmine\entity\EffectInstance;
use pocketmine\entity\Effect;

use mixpowder\LotsLaser\Interfaces\ILazer;

class DarkLaser extends Laser implements ILazer{
    
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
     * @return DragonBreathParticle
     */
    public function getParticle(){
        return new DragonBreathParticle();
    }
    
    /**
     * @param Entity $entity
     */
    public function specialEffect(Entity $entity){
        $entity->addEffect(new EffectInstance(Effect::getEffect(19), 4 * 20, 5, true));
    }
}