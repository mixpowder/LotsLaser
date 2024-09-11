<?php

namespace mixpowder\LotsLaser\Lasers;

use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\World;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\entity\Living;

class Laser {
    
    /**
     * @param World $world
     * @param Player $player
     * @param int $damage
     * @param float $knockback
     * @param int $distance
     * @param type $class
     */
    public function shoot(World $world, Player $player, $class){
        $sin = -sin($player->getLocation()->getYaw() / 180 * M_PI) * 2;
        $cos = cos($player->getLocation()->getYaw() / 180 * M_PI) * 2;
        $tan = tan($player->getLocation()->getPitch() / 180 * M_PI) * 2;
        $x = $player->getLocation()->getX();
        $y = $player->getLocation()->getY() + 1;
        $z = $player->getLocation()->getZ();
        $entities = [];
        foreach($world->getEntities() as $entity){
            if($entity instanceof Living && $player->getName() != $entity->getName()){
                $entities[] = $entity;
            }
        }
        
         for($i = 1; $i < $class->getDistance(); $i++){
            $pos = new Vector3((($sin * $i) + $sin) + $x, $y - $tan * $i, (($cos * $i) + $cos) + $z);
            $world->addParticle($pos, $class->getParticle());
            $count = count($entities);
            for($n = 0; $n < $count; $n++){
                if($entities[$n]->getPosition()->distance($pos) < 2.5){
                    $event = new EntityDamageByEntityEvent($player, $entities[$n], EntityDamageEvent::CAUSE_PROJECTILE, $class->getDamage(), [], $class->getKnockback());
                    $entities[$n]->attack($event);
                    $class->specialEffect($entities[$n]);
                    unset($entities[$n]);
                }
            }
            if(!(count($entities) == $count)){
                $entities = array_values($entities);
            }
         }
    }
}