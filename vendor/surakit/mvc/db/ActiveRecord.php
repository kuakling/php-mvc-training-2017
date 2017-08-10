<?php
namespace mvc\db;

use Mvc;
use mvc\db\Query;
/**
 *
 */
class ActiveRecord
{

  public static $class;

  private $_attributes = [];
  private $_oldAttributes;

  public $isNewRecord = true;

  public function __get($name)
  {
    if (isset($this->_attributes[$name]) || array_key_exists($name, $this->_attributes)) {
      return $this->_attributes[$name];
    }
    return null;
  }

  public function __set($name, $value)
  {
    /*if ($this->hasAttribute($name)) {
        $this->_attributes[$name] = $value;
    } else {
        parent::__set($name, $value);
    }*/

    $this->_attributes[$name] = $value;
  }

  public function __unset($name)
  {
    unset($this->_attributes[$name]);
  }

  public function __isset($name)
  {
    try {
      return $this->__get($name) !== null;
    } catch (\Exception $e) {
      return false;
    }
  }

  public function hasAttribute($name)
  {
    return isset($this->_attributes[$name]) || in_array($name, $this->attributes());
  }

  public function setAttribute($name, $value)
  {
    $this->_attributes[$name] = $value;
  }

  public static function getDb()
  {
    return Mvc::$app->getDb();
  }

  public static function find()
  {
    static::$class = new static();

    $class = static::$class;
    $class->queryClass = new Query();
    $class->isNewRecord = false;
    $class->queryClass->select = "*";
    $class->queryClass->sqlCmd['select'] = "*";
    $class->queryClass->from = static::tableName();
    $class->queryClass->sqlCmd['from'] = static::tableName();


    return $class;
  }

  public function where($condition = null)
  {
    $this->queryClass->where = ' WHERE '.$condition;
    $this->queryClass->sqlCmd['where'] = ' WHERE '.$condition;

    return static::$class;
  }

  public function andWhere($condition = null)
  {
    if($condition){
      if(!empty($this->queryClass->where)){
        $this->queryClass->where .= ' AND '.$condition;
        $this->queryClass->sqlCmd['where'] .= ' AND '.$condition;
      }else{
        $this->queryClass->where = ' WHERE '.$condition;
        $this->queryClass->sqlCmd['where'] = ' WHERE '.$condition;
      }
    }

    return static::$class;
  }

  public function orWhere($condition = null)
  {
    if($condition){
      if(!empty($this->queryClass->where)){
        $this->queryClass->where .= ' OR '.$condition;
        $this->queryClass->sqlCmd['where'] .= ' OR '.$condition;
      }else{
        $this->queryClass->where = ' WHERE '.$condition;
        $this->queryClass->sqlCmd['where'] = ' WHERE '.$condition;
      }
    }

    return static::$class;
  }

  public function addParams($params = [])
  {
    $this->queryClass->params = array_merge($this->queryClass->params, $params);

    return static::$class;
  }

  private function setSqlCommand($key, $value = null)
  {
    $this->queryClass->sqlCmd[$key] = $value;
  }

  public function limit($num)
  {
    $this->setSqlCommand('limit', ' LIMIT '.$num);

    return static::$class;
  }

  public function offset($num)
  {
    $this->setSqlCommand('offset', ' OFFSET '.$num);

    return static::$class;
  }

  public function join($table)
  {
    $this->setSqlCommand('join', ' JOIN '.$table);

    return static::$class;
  }

  public function on($fieldLeft, $fieldRight)
  {
    $this->setSqlCommand('on', " ON $fieldLeft = $fieldRight");

    return static::$class;
  }

  public function groupBy($field)
  {
    $this->setSqlCommand('groupBy', " GROUP BY $field");

    return static::$class;
  }

  public function orderBy($field)
  {
    $this->setSqlCommand('orderBy', " ORDER BY $field");

    return static::$class;
  }

  public function all()
  {

    $datas = $this->queryClass->executeCommand()->fetchAll();
    /*unset($this->conn);
    unset($this->select);
    unset($this->sql);
    unset($this->condition);*/
    $result = [];
    foreach ($datas as $key => $data) {
      $a = new $this;
      $a->_attributes = (array)$data;
      $a->_oldAttributes = (array)$data;
      $result[] = $a;
      unset($a);
    }

    return $result;
  }

  public function one()
  {
    $data = $this->queryClass->executeCommand()->fetch();
    $this->_attributes = (array)$data;
    $this->_oldAttributes = (array)$data;

    return $this;
  }

  public function save()
  {
    $attributes = $this->_attributes;
    $queryClass = new Query();
    $sql = $this->isNewRecord ? 'INSERT INTO ' : 'UPDATE ';
    $sql .= '`'.static::tableName().'`';
    if($this->isNewRecord){
      $sql .= ' (`'.implode(array_keys($attributes), '`, `').'`) VALUES ("'.implode('", "', $attributes).'")';
    }else{
      $sql .= ' SET ';
      $v = [];
      foreach ($attributes as $key => $value) {
        $v[] = '`'.$key.'` = "'.$value.'"';
      }
      $sql .= implode(", ", $v);
      $sql .= ' WHERE `id` = '.$attributes['id'];
    }
    // echo $sql; exit();
    $queryClass->sqlCmd = $sql;
    $data = $queryClass->saveCommand();
  }

  public function delete()
  {
    $queryClass = new Query();
    $sql = 'DELETE FROM `'.static::tableName().'` WHERE `id` = '.$this->_attributes['id'];
    // echo $sql; exit();
    $queryClass->sqlCmd = $sql;
    $data = $queryClass->deleteCommand();
  }

  public static function getTableSchema()
  {
    $queryClass = new Query();
    $sql = "DESCRIBE ".static::tableName();
    $queryClass->sqlCmd = $sql;
    $tableSchema = $queryClass->tableSchema();


    return $tableSchema;
  }

  public function load($arr){
    $tableSchema = $this->getTableSchema();
    foreach ($arr as $key => $value) {
      if(in_array($key, $tableSchema)){
        $this->$key = $value;
      }
    }
    return true;
  }

  public function formName()
  {
    $reflect = new \ReflectionClass($this);
    return $reflect->getShortName();
  }
}

 ?>
