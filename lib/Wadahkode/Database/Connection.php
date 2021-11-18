<?php

namespace Wadahkode\Database;

/**
 * Class Connection
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 */
abstract class Connection
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
    $this->config = require(APP_CONFIG_DIR . 'database' . PHP_EXT);
  }

  /**
   * Method for setup connection database
   * 
   * @access public
   */
  public function setConnection()
  {
    $this->dsn = (defined('APP_PRODUCTION') && APP_PRODUCTION !== false)
      ? "pgsql:host={$this->config->productiont->hostname};port={$this->config->productiont->port};dbname={$this->config->productiont->database}"
      : "pgsql:host={$this->config->development->hostname};port={$this->config->development->port};dbname={$this->config->development->database}";

    return new \PDO(
      $this->dsn,
      (defined('APP_PRODUCTION') && APP_PRODUCTION !== false) ? $this->config->productiont->username : $this->config->development->username,
      (defined('APP_PRODUCTION') && APP_PRODUCTION !== false) ? $this->config->productiont->password : $this->config->development->password
    );
  }
}