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
  public function create(array $args=[])
  {
    $table = "public." . $this->table;
    $id = $args["id"];
    $title = $args["title"];
    $content = $args["content"];
    $foto = $args["foto"];
    $author = $args["author"];
    $labels = $args["labels"];
    $description = $args["description"];
    $createdAt = $args["createdAt"];
    $updatedAt = $args["updatedAt"];

    $check = $this->db->query("SELECT id,title FROM {$table} WHERE title='{$title}'");
    $query = $this->db->prepare("INSERT INTO {$table} VALUES (
      :uuid,
      :title,
      :content,
      :foto,
      :author,
      :labels,
      :description,
      :createdAt,
      :updatedAt
    ) RETURNING *");
    $query->bindParam(":uuid", $id);
    $query->bindParam(":title", $title);
    $query->bindParam(":content", $content);
    $query->bindParam(":foto", $foto);
    $query->bindParam(":author", $author);
    $query->bindParam(":labels", $labels);
    $query->bindParam(":description", $description);
    $query->bindParam(":createdAt", $createdAt);
    $query->bindParam(":updatedAt", $updatedAt);

    return $check->rowCount() >= 1 ? [
      "success" => false,
      "error"   => [
        "type"  => "READY",
        "message" => "post sudah ada."
      ]
    ] : $query->execute();
  }

  /**
   * Method for update
   * 
   * @param null
   */
  public function update(array $args=[])
  {
    $table = "public." . $this->table;
    $id = $args["id"];
    $title = $args["title"];
    $content = $args["content"];
    $foto = $args["foto"];
    $author = $args["author"];
    $labels = $args["labels"];
    $description = $args["description"];
    $createdAt = $args["createdAt"];
    $updatedAt = $args["updatedAt"];

    // $check = $this->db->query("SELECT id,title FROM {$table} WHERE title='{$title}'");
    $query = $this->db->prepare("UPDATE {$table} SET 
      id=:uuid,
      title=:title,
      content=:content,
      foto=:foto,
      author=:author,
      labels=:labels,
      description=:description,
      \"createdAt\"=:createdAt,
      \"updatedAt\"=:updatedAt
    WHERE title='{$title}'
    RETURNING *");
    $query->bindParam(":uuid", $id);
    $query->bindParam(":title", $title);
    $query->bindParam(":content", $content);
    $query->bindParam(":foto", $foto);
    $query->bindParam(":author", $author);
    $query->bindParam(":labels", $labels);
    $query->bindParam(":description", $description);
    $query->bindParam(":createdAt", $createdAt);
    $query->bindParam(":updatedAt", $updatedAt);

    return !$query->execute() ? [
      "success"   => false,
      "error"     => [
        "type"    => "FAILED",
        "message" => "gagal memperbarui."
      ]
    ] : true;

    // return $check->rowCount() >= 1 ? [
    //   "success" => false,
    //   "error"   => [
    //     "type"  => "READY",
    //     "message" => "post sudah ada."
    //   ]
    // ] : $query->execute();
  }

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
  public function delete($name, $value)
  {
    $table = "public." . $this->table;
    $bind = "WHERE {$name}='{$value}' RETURNING *";

    $sql = trim("DELETE FROM {$table} {$bind}");
    $statement = $this->db->query($sql);

    return $statement;
  }
}