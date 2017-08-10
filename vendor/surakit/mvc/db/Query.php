<?php
namespace mvc\db;

use Mvc;

/**
 *
 */
class Query
{
    public $select;

    public $from;

    public $sqlCmd = [];

    public $params = [];

    public function getDb($db = null)
    {
        if ($db === null) {
            $db = Mvc::$app->getDb();
        }

        return $db;
    }

    public function executeCommand($db = null)
    {
        if ($db === null) {
            $db = Mvc::$app->getDb();
        }
        $sqlCmdOrder = [
            'join',
            'on',
            'where',
            'groupBy',
            'orderBy',
            'limit',
            'offset'
        ];
        $sql = "SELECT ".$this->select." FROM ".$this->from;
        foreach ($sqlCmdOrder as $key => $cmd) {
            if(isset($this->sqlCmd[$cmd]))
            $sql .= $this->sqlCmd[$cmd];
        }
        //echo $sql."<br />";
        $exec = $db->createCommand($sql, $this->params);
        return $exec;
    }

    public function saveCommand($db = null)
    {
      if ($db === null) {
          $db = Mvc::$app->getDb();
      }
      $exec = $db->createCommand($this->sqlCmd, $this->params);
      return $exec;
    }

    public function deleteCommand($db = null)
    {
      if ($db === null) {
          $db = Mvc::$app->getDb();
      }
      $exec = $db->createCommand($this->sqlCmd, $this->params);
      return $exec;
    }

    public function tableSchema($db = null)
    {
      if ($db === null) {
          $db = Mvc::$app->getDb();
      }
      $exec = $db->createCommand($this->sqlCmd, $this->params);
      return $exec->fetchAll(\PDO::FETCH_COLUMN);
    }

}

 ?>
