<?php

namespace Wadahkode\Support\Database;

/**
 * Class Connection
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 */
class Connection
{
  /**
   * @access private
   */
  private $dsn = "";

  /**
   * @access private
   */
  private $config = null;

  // First method for calling
  public function __construct()
  {
    if (APP_PRODUCTION !== FALSE && file_exists(APP_CONFIG_DIR . "database.heroku" . PHP_EXT)) {
      $this->config = require(APP_CONFIG_DIR . 'database.heroku' . PHP_EXT);
    } else {
      $this->config = require(APP_CONFIG_DIR . 'database' . PHP_EXT);
    }

    return $this->setConnection();
  }

  /**
   * Method for setup connection database
   * 
   * @access protected
   */
  protected function setConnection()
  {
    $this->dsn = (defined('APP_PRODUCTION') && APP_PRODUCTION !== false)
      ? "pgsql:host={$this->config->productiont->hostname};port={$this->config->productiont->port};dbname={$this->config->productiont->database}"
      : "pgsql:host={$this->config->development->hostname};port={$this->config->development->port};dbname={$this->config->development->database}";

    $this->db = new \PDO(
      $this->dsn,
      (defined('APP_PRODUCTION') && APP_PRODUCTION !== false) ? $this->config->productiont->username : $this->config->development->username,
      (defined('APP_PRODUCTION') && APP_PRODUCTION !== false) ? $this->config->productiont->password : $this->config->development->password
    );

    return $this;
  }
}