<?php

/**
 * Configuration of connection to database
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 * @since version 0.0.1
 */
$config = [
  /**
   * Jika aplikasi masih dalam pengembangan dilocalhost mesin komputer
   * Silahkan isi bagian konfigurasi ini.
   */
  "development" => [
    'hostname'  => 'localhost',
    'port'      => 5432,
    'username'  => 'root',
    'password'  => 'admin',
    'database'  => 'forumtech'
  ],

  /**
   * Jika aplikasi telah selesai diproduksi sesuaikan dengan konfigurasi
   * yang berada dilayanan hosting yang kalian pakai.
   */
  "productiont" => [
    'hostname'  => '',
    'port'      => 5432,
    'username'  => '',
    'password'  => '',
    'database'  => ''
  ]
];

return json_decode(json_encode($config));