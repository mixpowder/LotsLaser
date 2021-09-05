<?php

namespace mixpowder\LotsLaser\Laser;

use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\level\particle\DustParticle;

class GoldLaser extends Laser{
    
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
     */
    public function particle(Vector3 $pos){
        return new DustParticle($pos, 250,215,0);
    }
    
    /**
     * @param Level $level
     * @param Player $player
     * @param Entity $entity
     */
    public function specialEffect(Level $level, Player $player, Entity $entity){
        $level->dropItem(new Vector3($entity->x,$entity->y,$entity->z),Item::get(41,0));
    }
}