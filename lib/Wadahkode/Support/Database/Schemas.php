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
    $this->bind     = isset($model->bind) ? $model->bind : null;
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
  protected function read(...$args)
  {
    $table    = "public." . $this->table;
    $bind     = (!empty($this->bind) && gettype($this->bind) === "string" && !empty($args))
      ? "WHERE {$this->bind}='{$args[0][0]}'"
      : "";
    
    if (!empty($this->bind) && gettype($this->bind) !== "string") {
      //
    }

    $column   = (gettype($this->column) === "array")
      ? implode(",", $this->column)
      : $this->column;
    $order    = !$this->order ? "" : "ORDER BY {$this->order}";
    $sort     = !$this->sort ? "" : strtoupper($this->sort);
    $limit    = !$this->limit ? "" : "LIMIT " . intval($this->limit);

    $query = trim("SELECT {$column} FROM {$table} {$bind} {$order} {$limit} {$sort}");
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