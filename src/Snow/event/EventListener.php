<?php

namespace Snow\event;

use pocketmine\event\level\ChunkLoadEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\level\biome\Biome;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\math\Vector3;

class EventListener implements Listener {

    /**
     * @param ChunkLoadEvent $event
     */

    public function onChunkLoad(ChunkLoadEvent $event) {
        $chunk = $event->getChunk();
        for ($x = 0; $x < 16; ++$x) {
            for ($z = 0; $z < 16; ++$z) {
                $chunk->setBiomeId($x, $z, Biome::ICE_PLAINS);
            }
        }
    }

    /**
     * @param PlayerJoinEvent $event
     */

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $packet = new LevelEventPacket();
        $packet->evid = LevelEventPacket::EVENT_START_RAIN;
        $packet->position = null;
        $packet->data = 10000;
        $player->dataPacket($packet);
    }
}
