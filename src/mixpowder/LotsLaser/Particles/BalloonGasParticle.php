<?php

namespace mixpowder\LotsLaser\Particles;

use pocketmine\math\Vector3;
use pocketmine\world\particle\Particle;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\network\mcpe\protocol\types\ParticleIds;

class BalloonGasParticle implements Particle{

        public function encode(Vector3 $pos) : array{
		return [LevelEventPacket::standardParticle(ParticleIds::BALLOON_GAS, 0, $pos)];
	}
}
