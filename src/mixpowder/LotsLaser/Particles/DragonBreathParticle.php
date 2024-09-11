<?php

namespace mixpowder\LotsLaser\Particles;

use pocketmine\math\Vector3;
use pocketmine\world\particle\Particle;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\network\mcpe\protocol\types\ParticleIds;

class DragonBreathParticle implements Particle{

        public function encode(Vector3 $pos) : array{
		return [LevelEventPacket::standardParticle(ParticleIds::DRAGON_BREATH_TRAIL, 0, $pos)];
	}
}
