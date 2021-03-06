<?php
/* 注册监听器 */
namespace yxmingy\ToxicHome\starter;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use yxmingy\ToxicHome\HomeManager;
abstract class ListenerManager extends PluginBase
{
  protected static $instance;
  protected static $namelist = 
  [
  "HomeManager"=>HomeManager::class,
  ];
  protected static $listeners = [];
  final protected static function register(Listener $listener):void
  {
    self::$instance->getServer()->getPluginManager()->registerEvents($listener,self::$instance);
  }
  final protected static function registerListeners():void
  {
    foreach(self::$namelist as $name)
    {
      self::register(self::$listeners[$name]=new $name());
    }
  }
  public static function getListener(string $name):Listener
  {
    return self::$listeners[$name];
  }
}
?>