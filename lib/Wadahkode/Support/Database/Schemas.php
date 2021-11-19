<?php

namespace Wadahkode\Support\Database;

class Schemas extends DB
{
  protected $db = null;

  // first method calling
  public function __construct($model)
  {
    parent::__construct();

    if (!is_object($model)) {
      return false;
    }

    $this->table    = $model->table;
    $this->column   = $model->column;
    $this->order    = $model->order;
    $this->sort     = $model->sort;
    $this->limit    = $model->limit;
  }

  /**
   * Method for create
   * 
   * @param null
   */
  public function create()
  {}

  /**
   * Method for update
   * 
   * @param null
   */
  public function update()
  {}

  /**
   * Method for read
   * 
   * @param null
   */
  public function read()
  {
    $table = "public." . $this->table;
    $column = implode(",", $this->column);
    $order = $this->order;
    $sort = !$this->sort ? "" : strtoupper($this->sort);
    $limit = intval($this->limit);

    $query = trim("SELECT {$column} FROM {$table} ORDER BY {$order} LIMIT {$limit} {$sort}");
    // $statement = $this->db->query("SELECT \"id\",\"title\",\"content\",\"foto\",\"author\",\"createdAt\",\"updatedAt\" FROM tutorials ORDER BY id LIMIT 7");
    $statement = $this->db->query($query);
    $result = $statement->fetchAll(\PDO::FETCH_OBJ);

    return $result;
  }

  /**
   * Method for delete
   * 
   * @param null
   */
  public function delete()
  {}
}