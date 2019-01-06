<?php

namespace Snow;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\MainLogger;
use pocketmine\utils\TextFormat;
use Snow\event\EventListener;

class Snow extends PluginBase {

    public function onEnable() {
        MainLogger::getLogger()->info(TextFormat::GREEN . "Snow plugini aktif edildi.");
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }
}