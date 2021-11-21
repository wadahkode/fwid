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
    'hostname'  => 'ec2-52-203-164-61.compute-1.amazonaws.com',
    'port'      => 5432,
    'username'  => 'heqteriifjiklb',
    'password'  => 'c9135232e2611ac468ccb6dc75bcb0f0b98b295beffd2ff269e40910e6a427d3',
    'database'  => 'd6i3hocgg85rf8'
  ]
];

return json_decode(json_encode($config));