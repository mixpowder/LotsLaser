<?php


namespace mixpowder\LotsLaser\Particle;

use pocketmine\math\Vector3;
use pocketmine\level\particle\GenericParticle;
use pocketmine\level\particle\Particle;

class DragonBreathParticle extends GenericParticle{
    
	public function __construct(Vector3 $pos){
		parent::__construct($pos, Particle::TYPE_DRAGON_BREATH_TRAIL);
	}
}
