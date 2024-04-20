#
# Structure de la table 'tournoi'
#
CREATE TABLE tournoi (
   id int(11) auto_increment,
   nom varchar(50) NOT NULL,
   ville varchar(50) NOT NULL,
   date_tournoi date DEFAULT '0000-00-00' NOT NULL,
   PRIMARY KEY (id)
);

#
# Contenu de la table 'tournoi'
#
INSERT INTO `tournoi` (`id`, `nom`, `ville`, `date_tournoi`) VALUES ('1', 'Tournoi de football', 'Aulnay', '2022-04-30');
INSERT INTO `tournoi` (`id`, `nom`, `ville`, `date_tournoi`) VALUES ('2', 'Tournoi de football', 'Bondy', '2022-03-15');
INSERT INTO `tournoi` (`id`, `nom`, `ville`, `date_tournoi`) VALUES ('3', 'Tournoi de football', 'Paris', '2022-05-15');

#
# Structure de la table 'equipe'
#
CREATE TABLE equipe (
   id int(11) auto_increment ,
   nom varchar(50) NOT NULL,
   anneeCreation int(11) NOT NULL,
   id_tournoi int(11), 
   PRIMARY KEY (id),
   foreign key(id_tournoi) references  tournoi (id) 
);

#
# Contenu de la table 'equipe'
#
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('1', 'Club de Aulnay centre', '2003', '1');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('2', 'Club de Aulnay nord', '2010', '1');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('3', 'Club de Aulnay sud', '2015', '1');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('4', 'Club de Aulnay est', '2020', '1');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('5', 'Club de Aulnay ouest', '1990', '1');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('6', 'Club de Bondy centre', '2003', '2');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('7', 'Club de Bondy nord', '2010', '2');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('8', 'Club de Bondy sud', '2015', '2');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('9', 'Club de Bondy est', '2020', '2');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('10', 'Club de Bondy ouest', '1990', '2');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('11', 'Club de Paris centre', '2003', '3');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('12', 'Club de Paris nord', '2010', '3');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('13', 'Club de Paris sud', '2015', '3');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('14', 'Club de Paris est', '2020', '3');
INSERT INTO `equipe` (`id`, `nom`, `anneeCreation`, `id_tournoi`) VALUES ('15', 'Club de Paris ouest', '1990', '3');

#
# Structure de la table 'licence'
#
CREATE TABLE licence (
   id int(11) auto_increment ,
   numero varchar(50) NOT NULL,
   categorie varchar(50) NOT NULL,
   annee_licence int(4) NOT NULL,
   status_licence int(1), 
   PRIMARY KEY (id)
);

#
# Contenu de la table 'licence'
#
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('1', 'FOOT01A01', 'Football', '2020', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('2', 'FOOT01A02', 'Football', '2019', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('3', 'FOOT01A03', 'Football', '2018', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('4', 'FOOT01A04', 'Football', '2017', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('5', 'FOOT01A05', 'Football', '2020', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('6', 'FOOT01A06', 'Football', '2019', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('7', 'FOOT01A07', 'Football', '2018', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('8', 'FOOT01A08', 'Football', '2017', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('9', 'FOOT01A09', 'Football', '2020', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('10', 'FOOT01A10', 'Football', '2019', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('11', 'FOOT01A11', 'Football', '2018', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('12', 'FOOT01A12', 'Football', '2017', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('13', 'FOOT01A13', 'Football', '2020', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('14', 'FOOT01A14', 'Football', '2019', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('15', 'FOOT01A02', 'Football', '2018', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('16', 'FOOT01A02', 'Football', '2017', '0');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('17', 'VOLL01A01', 'Volley', '2020', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('18', 'VOLL01A02', 'Volley', '2019', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('19', 'VOLL01A03', 'Volley', '2018', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('20', 'HAND01A01', 'Hand', '2017', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('21', 'HAND01A02', 'Hand', '2020', '1');
INSERT INTO `licence` (`id`, `numero`, `categorie`, `annee_licence`, `status_licence`) VALUES ('22', 'HAND01A03', 'Hand', '2019', '1');

#
# Structure de la table 'joueur'
#
CREATE TABLE joueur (
   id int(11) auto_increment ,
   nom varchar(50) NOT NULL,
   prenom varchar(50) NOT NULL,
   date_naissance date DEFAULT '0000-00-00' NOT NULL,
   id_licence int(11), 
   PRIMARY KEY (id),
   foreign key(id_licence) references licence (id) 
);

#
# Contenu de la table 'joueur'
#
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('1', 'nom ', 'prenom', '2002-03-10', '1');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('2', 'nom ', 'prenom', '2002-04-15', '2');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('3', 'nom ', 'prenom', '2002-05-20', '3');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('4', 'nom ', 'prenom', '2002-06-25', '4');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('5', 'nom ', 'prenom', '2002-07-30', '5');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('6', 'nom ', 'prenom', '2002-08-05', '6');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('7', 'nom ', 'prenom', '2002-09-10', '7');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('8', 'nom ', 'prenom', '2002-10-15', '8');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('9', 'nom ', 'prenom', '2002-11-20', '9');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('10', 'nom ', 'prenom', '2002-12-25', '10');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('11', 'nom ', 'prenom', '2002-01-30', '11');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('12', 'nom ', 'prenom', '2002-02-05', '12');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('13', 'nom ', 'prenom', '2002-03-10', '13');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('14', 'nom ', 'prenom', '2002-04-15', '14');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('15', 'nom ', 'prenom', '2002-05-20', '15');
INSERT INTO `joueur` (`id`, `nom`, `prenom`, `date_naissance`, `id_licence`) VALUES ('16', 'nom ', 'prenom', '2002-06-30', '16');

#
# Structure de la table 'match'
#
CREATE TABLE matchs (
   id int(11) auto_increment ,
   date_match date DEFAULT '0000-00-00' NOT NULL,
   id_tournoi int(11),
   id_equipe1 int(11), 
   id_equipe2 int(11),
   score1 int(11),
   score2 int(11),
   tir_but int(1),
   score3 int(11),
   score4 int(11),
   id_vainqueur int(11),
   PRIMARY KEY (id),
   foreign key(id_tournoi) references tournoi (id), 
   foreign key(id_equipe1) references equipe (id),
   foreign key(id_equipe2) references equipe (id), 
   foreign key(id_vainqueur) references equipe (id)
);

#
# Contenu de la table 'match'
#
INSERT INTO `matchs` (`id`, `date_match`, `id_tournoi`, `id_equipe1`, `id_equipe2`, `score1`, `score2`, `tir_but`, `score3`, `score4`, `id_vainqueur`) VALUES ('1', '2022-03-27', '1', '1', '2', '1', '0', '0', NULL, NULL, '1');
INSERT INTO `matchs` (`id`, `date_match`, `id_tournoi`, `id_equipe1`, `id_equipe2`, `score1`, `score2`, `tir_but`, `score3`, `score4`, `id_vainqueur`) VALUES ('2', '2022-03-27', '1', '1', '3', '0', '1', '0', NULL, NULL, '3');
INSERT INTO `matchs` (`id`, `date_match`, `id_tournoi`, `id_equipe1`, `id_equipe2`, `score1`, `score2`, `tir_but`, `score3`, `score4`, `id_vainqueur`) VALUES ('3', '2022-03-27', '1', '1', '4', '1', '0', '0', NULL, NULL, '1');
INSERT INTO `matchs` (`id`, `date_match`, `id_tournoi`, `id_equipe1`, `id_equipe2`, `score1`, `score2`, `tir_but`, `score3`, `score4`, `id_vainqueur`) VALUES ('4', '2022-03-27', '1', '1', '5', '0', '1', '0', NULL, NULL, '5');
INSERT INTO `matchs` (`id`, `date_match`, `id_tournoi`, `id_equipe1`, `id_equipe2`, `score1`, `score2`, `tir_but`, `score3`, `score4`, `id_vainqueur`) VALUES ('5', '2022-03-27', '1', '2', '3', '1', '0', '0', NULL, NULL, '1');
INSERT INTO `matchs` (`id`, `date_match`, `id_tournoi`, `id_equipe1`, `id_equipe2`, `score1`, `score2`, `tir_but`, `score3`, `score4`, `id_vainqueur`) VALUES ('6', '2022-03-27', '1', '2', '4', '0', '1', '0', NULL, NULL, '4');
INSERT INTO `matchs` (`id`, `date_match`, `id_tournoi`, `id_equipe1`, `id_equipe2`, `score1`, `score2`, `tir_but`, `score3`, `score4`, `id_vainqueur`) VALUES ('7', '2022-03-27', '1', '2', '5', '1', '0', '0', NULL, NULL, '2');
INSERT INTO `matchs` (`id`, `date_match`, `id_tournoi`, `id_equipe1`, `id_equipe2`, `score1`, `score2`, `tir_but`, `score3`, `score4`, `id_vainqueur`) VALUES ('8', '2022-03-27', '1', '3', '4', '0', '1', '0', NULL, NULL, '4');
INSERT INTO `matchs` (`id`, `date_match`, `id_tournoi`, `id_equipe1`, `id_equipe2`, `score1`, `score2`, `tir_but`, `score3`, `score4`, `id_vainqueur`) VALUES ('9', '2022-03-27', '1', '3', '5', '1', '0', '0', NULL, NULL, '3');
INSERT INTO `matchs` (`id`, `date_match`, `id_tournoi`, `id_equipe1`, `id_equipe2`, `score1`, `score2`, `tir_but`, `score3`, `score4`, `id_vainqueur`) VALUES ('10', '2022-03-27', '1', '4', '5', '0', '1', '0', NULL, NULL, '5');

#
# Structure de la table 'classement'
#
CREATE TABLE classement (
   id int(11) auto_increment ,
   id_tournoi int(11),
   date_creation date DEFAULT '0000-00-00' NOT NULL,
   place1 int(11), 
   place2 int(11), 
   place3 int(11), 
   place4 int(11), 
   place5 int(11), 
   PRIMARY KEY (id),
   foreign key(id_tournoi) references tournoi (id), 
   foreign key(place1) references equipe (id),
   foreign key(place2) references equipe (id), 
   foreign key(place3) references equipe (id),
   foreign key(place4) references equipe (id),
   foreign key(place5) references equipe (id)
);

#
# Structure de la table 'classement'
#
INSERT INTO `classement` (`id`, `id_tournoi`, `date_creation`, `place1`, `place2`, `place3`, `place4`, `place5`) VALUES ('1', '1', '2022-03-28', '1', '3', '4', '5', '2');
