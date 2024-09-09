---- base de données: 'agenceimmo'
--
create database if not exists agenceimmo default character set utf8 collate utf8_general_ci;
use agenceimmo;
-- --------------------------------------------------------
-- creation des tables

set foreign_key_checks =0;

-- table profil
drop table if exists profil;
create table profil (
	pro_id int not null auto_increment primary key,
	pro_nom varchar(100)	
)engine=innodb;

-- table client
drop table if exists client;
create table client (
	cli_id int not null auto_increment primary key,
	cli_login varchar(100) not null unique,
	cli_mdp varchar(100) not null,
	cli_nom varchar(50) ,
	cli_prenom varchar(50) ,
	cli_adresse varchar(500) ,
	cli_ville varchar(500) ,
	cli_cp varchar(5) ,
	cli_profil int not null
)engine=innodb;

-- table biens
drop table if exists biens;
create table biens (
	bie_id int not null auto_increment primary key,
	bie_description varchar(5000) not null,
	bie_adresse varchar(100) not null,
	bie_type varchar(10) not null,
	bie_prix int not null,
	bie_statut varchar(10) not null,
	bie_client int not null
)engine=innodb; 

set foreign_key_checks =1;

-- contraintes
alter table client add constraint cs1 foreign key (cli_profil) references profil(pro_id);
alter table biens add constraint cs2 foreign key (bie_client) references client(cli_id);

-- données profil
insert into profil values(null, 'Client');
insert into profil values(null, 'Admin');
-- Données client
insert into client values(null, 'a', 'a', 'Paul', 'Dupuis', '3 rue des Potiers', 'Avignon', '84140', 1);
insert into client values(null, 'admin', 'admin', 'Nicolas', 'flantier', '27 allée du marchand', 'sevran', '93270', 2);