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
	cli_prenom varchar(50),
	cli_nom varchar(50) ,
	cli_adresse varchar(500) ,
	cli_ville varchar(500) ,
	cli_cp varchar(5),
	cli_profil int not null
)engine=innodb;

-- table biens
drop table if exists biens;
create table biens (
	bie_id int not null auto_increment primary key,
	bie_caracteristique int,
	bie_adresse varchar(500) not null,
	bie_type int not null,
	bie_prix int not null,
	bie_statut int,
	bie_client int not null
)engine=innodb; 

-- table caracteristique
drop table if exists caracteristique;
create table caracteristique (
	car_id int not null auto_increment primary key,
	car_libelle varchar(20)
)engine=innodb;


-- table type
drop table if exists type;
create table type(
	typ_id int not null auto_increment primary key,
	typ_libelle varchar(20)
)engine=innodb;

-- table status
drop table if exists status;
create table status (
	sta_id int not null auto_increment primary key,
	sta_libelle varchar(20)
)engine=innodb;

-- contraintes
alter table client add constraint cs1 foreign key (cli_profil) references profil(pro_id);
alter table biens add constraint cs2 foreign key (bie_client) references client(cli_id);

set foreign_key_checks =1;

-- données profil
insert into profil 
(pro_id, pro_nom) values
(null, 'Admin'),
(null, 'Client');
-- Données client
insert into client 
(cli_id, cli_login, cli_mdp, cli_prenom, cli_nom, cli_adresse, cli_ville, cli_cp, cli_profil ) values
(null, 'a', 'a', 'Paul', 'Dupuis', '3 rue des Potiers', 'Avignon', '84140', 1),
(null, 'admin', 'admin', 'Nicolas', 'flantier', '27 allée du marchand', 'sevran', '93270', 2);

--Données status
insert into status 
(sta_id, sta_libelle) values
(null, "En vente"),
(null, "En location");

--Données type
insert into type 
(typ_id, typ_libelle) values
(null, "Appartement"),
(null, "Maison"),
(null, "Terrain");

--Données caracteristique
insert into caracteristique 
(car_id, car_libelle) values
(null, "Studio"),
(null, "F2"),
(null, "F3"),
(null, "F4");

--Données biens
insert into biens 
(bie_id, bie_caracteristique, bie_adresse, bie_type, bie_prix, bie_statut, bie_client) values
(null, 2, "3 avenue de la porte de Choisy", 2, 450, 1, 1),
(null, 2, "55 rue de l'elysée", 1, 560, 1, 2);