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
    'hostname'  => 'ec2-34-233-112-169.compute-1.amazonaws.com',
    'port'      => 5432,
    'username'  => 'fnvywbodendjha',
    'password'  => 'fb8d7a5daa77d6753d14eb586e3b5a8423b2ade9a15d3802c2468d97dc6c3cfe',
    'database'  => 'dcontmckhtr3n'
  ]
];

return json_decode(json_encode($config));