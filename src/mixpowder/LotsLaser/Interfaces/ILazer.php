<?php

namespace mixpowder\LotsLaser\Interfaces;

use pocketmine\player\Player;
use pocketmine\entity\Entity;

interface ILazer{
    
    public function __construct(Player $player);
    public function execute();
    public function getDamage(): int;
    public function getKnockback(): float;
    public function getDistance(): int;
    public function getParticle();
    public function specialEffect(Entity $entity);
    
}
