<?php

declare(strict_types=1);

namespace ZhorifCraft451\SoundTemplate;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

use pocketmine\utils\TextFormat;

use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;

class Main extends PluginBase implements Listener {

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {

        switch($cmd->getName()){
            case "soundtest":
                if($sender instanceof Player){

                    if(count($args) == 1){

                        if($args[0] == 1){
                            $volume = mt_rand();
                            $sender->getLevel()->broadCastLevelEvent($sender, LevelEventPacket::EVENT_SOUND_ORB, (int) $volume);

                        }

                        if($args[0] == 2){
                            $volume = mt_rand();
                            $sender->getLevel()->broadcastLevelSoundEvent($sender, LevelSoundEventPacket::SOUND_RAID_HORN, (int) $volume);
                        }
                    }
                }
        }
    return true;
    }
}
