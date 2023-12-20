create database dbcrud_modal;

use dbcrud_modal;

CREATE TABLE `tmhs` (
  `id` int(11) NOT NULL auto_increment,
  `nim` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);