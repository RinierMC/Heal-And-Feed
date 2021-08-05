<?php

namespace Rinier\HealFeed;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase {
    
	public function onEnable(){
	    $this->saveDefaultConfig();
	    $this->getResource("config.yml");
      }
  
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) :bool {
        
        switch($cmd->getName()){
        case "heal":
         if($sender instanceof Player){
         $sender->sendMessage("Please use this command in game");
         if($sender->hasPermission("heal.command"));
          $sender->setHealth($sender->getMaxHealth());
          $sender->sendMessage($this->getConfig()->get("Heal-Message"));
        }
        break;
        
        case "feed":
        if($sender instanceof Player){
        $sender->sendMessage("Please use this command in game");
        if($sender->hasPermission("feed.command")){
         $sender->setFood(20);
         $sender->sendMessage($this->getConfig()->get("Feed-Message"));
               }
       }
     }
        return true;
   }    
}