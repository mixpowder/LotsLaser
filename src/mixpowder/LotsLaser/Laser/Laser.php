<?php

namespace mixpowder\LotsLaser\Laser;

use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\level\Level;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\entity\object\ItemEntity;

class Laser {
    
    /**
     * @param Level $level
     * @param Player $player
     * @param int $damage
     * @param float $knockback
     * @param int $distance
     * @param type $class
     */
    public function excute(Level $level, Player $player, int $damage, float $knockback, int $distance, $class){
        $sin = -sin($player->yaw / 180 * M_PI) * 2;
        $cos = cos($player->yaw / 180 * M_PI) * 2;
        $tan = tan($player->pitch / 180 * M_PI) * 2;
        $x = $player->getX();
        $y = $player->getY() + 1;
        $z = $player->getZ();
        $entities = [];
        foreach($level->getEntities() as $entity){
            if(!($entity instanceof ItemEntity) && $player->getName() != $entity->getName()){
                $entities[] = $entity;
            }
        }
        
         for($i = 1; $i < $distance; $i++){
            $pos = new Vector3((($sin * $i) + $sin) + $x,$y - $tan * $i,(($cos * $i) + $cos) + $z);
            $level->addParticle($class->particle($pos));
            $count = count($entities);
            for($n = 0; $n < $count; $n++){
                if($entities[$n]->distance($pos) < 2.5){
                    $event = new EntityDamageByEntityEvent($player, $entities[$n], EntityDamageEvent::CAUSE_PROJECTILE, $damage, [], $knockback);
                    $entities[$n]->attack($event);
                    $class->specialEffect($level, $player, $entities[$n]);
                    unset($entities[$n]);
                }
            }
            if(!(count($entities) == $count)){
                $entities = array_values($entities);
            }
         }
    }
}