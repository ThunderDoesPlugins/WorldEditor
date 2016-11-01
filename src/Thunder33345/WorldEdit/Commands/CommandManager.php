<?php
/** Created By Thunder33345 **/
namespace Thunder33345\WorldEdit\Commands;

use Thunder33345\WorldEdit\ObjectGetter;

class CommandManager
{
  use ObjectGetter;
  public static $commands =
    [
      #'help' => ["//help", "Show help pages", "//help", [], ""],
      #'commands' => ["//commands", "Return a list of commands", "//commands", []],
      #'info' => ["//info", "Show plugin information", "//info", []],
      'pos1' => ["//pos1", "Set world edit pos1", '//pos1 [<x> <y> <z> <world>]', ['1', ' 1', '/1', '/ 1', 'pos1', ' pos1', '/pos1', ' / pos1'], "we.pos1"],
      'pos2' => ["//pos2", "Set world edit pos2", '//pos2 [<x> <y> <z> <world>]', ['2', ' 2', '/2', '/ 2', 'pos2', ' pos2', '/pos2', ' / pos2'], "we.pos2"],
      'pos' => ["//pos", "Show the pos you have set", '//pos [<name>]', ['showpos', '/showpos', '/pos'], ["we.pos", "we.pos.other"]],
    ];
  static private $instance;
  private static $format = [
    "name" => ["0 Command", "1 Description", "2 Args", ["3 Aliases"], '4 permNode']
  ];

  public function __construct()
  {
    self::$instance = $this;
    $this->registerAllCommands();
  }

  static public function getInstance()
  {
    return self::$instance;
  }

  private function registerAllCommands()
  {
    $cmd = self::$commands['pos1'];
    $this->getServer()->getCommandMap()->register('wepos1', new Pos1Command('pos1', $cmd[1], $cmd[2], $cmd[3]));
    $cmd = self::$commands['pos2'];
    $this->getServer()->getCommandMap()->register('wepos2', new Pos2Command('pos2', $cmd[1], $cmd[2], $cmd[3]));
    // print_r(self::$commands);
  }

  public function getAllCommands()
  {
    return self::$commands;
  }
}