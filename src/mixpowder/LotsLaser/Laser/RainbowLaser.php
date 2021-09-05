<?php

namespace mixpowder\LotsLaser\Laser;

use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\entity\Entity;

use pocketmine\level\particle\DustParticle;
use pocketmine\level\particle\HugeExplodeParticle;

class RainbowLaser extends Laser{
    
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
     * @return DustParticle
     */
    public function particle(Vector3 $pos){
        return new DustParticle($pos, rand(0, 255), rand(0, 255), rand(0, 255));
    }
    
    /**
     * @param Level $level
     * @param Player $player
     * @param Entity $entity
     */
    public function specialEffect(Level $level, Player $player, Entity $entity){
        $level->addParticle(new HugeExplodeParticle(new Vector3($entity->x, $entity->y + 1, $entity->z)));
    }
}