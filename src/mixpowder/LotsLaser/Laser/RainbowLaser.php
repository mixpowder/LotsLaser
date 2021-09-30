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