
prompt 1

create table Touitos(
ID int not null,
pseudonyme varchar(25) not null,
email varchar(25) not null,
motPasse varchar(25) not null,
photo char not null,
statut varchar(100),
check (photo='O' or photo='N'),
primary key (ID)
)ENGINE=INNODB;

prompt 2

create table Suivre(
IDDemandeur int not null,
IDReceveur int not null,
demande char not null,
check (demande='E' or demande='V' or demande='R'),
primary key (IDDemandeur, IDReceveur),
foreign key (IDDemandeur) references Touitos (ID)
	on update cascade
	on delete cascade,
foreign key (IDDemandeur) references Touitos (ID)
	on update cascade
	on delete cascade
)ENGINE=INNODB;

prompt 3

create table Touites(
IDMsg int not null,
date_t date not null,
texte varchar(140) not null,
primary key (IDMsg)
)ENGINE=INNODB;

prompt 4

create table TouitesPublics(
IDMsg int not null,
IDAuteur int not null,
primary key (IDMsg),
foreign key (IDMsg) references Touites (IDMsg) 
	on update cascade
	on delete cascade,
foreign key (IDAuteur) references Touitos (ID)
	on update cascade
	on delete cascade
)ENGINE=INNODB;

prompt 5

create table Hashtags(
IDHashtag int not null,
titre varchar(26) not null,
check(titre like '#%'),
primary key (IDHashtag)
)ENGINE=INNODB;

prompt 6

create table Arobases(
IDArobase int not null,
Apseudonyme varchar(26) not null,
check(Apseudonyme like '@%'),
primary key (IDArobase)
)ENGINE=INNODB;

prompt 7

create table ContenuH(
IDMsg int not null,
IDHashtag int not null,
primary key (IDMsg,IDHashtag),
foreign key (IDMsg) references TouitesPublics (IDMsg)
	on update cascade
	on delete cascade,
foreign key (IDHashtag) references Hashtags (IDHashtag)
	on update cascade
	on delete cascade
)ENGINE=INNODB;

prompt 8

create table ContenuA(
IDMsg int not null,
IDArobase int not null,
primary key (IDMsg,IDArobase),
foreign key (IDMsg) references TouitesPublics (IDMsg)
	on update cascade
	on delete cascade,
foreign key (IDArobase) references Arobases (IDArobase)
	on update cascade
	on delete cascade
)ENGINE=INNODB;

prompt 9

create table TouitesNormaux(
IDMsg int not null,
primary key (IDMsg),
foreign key (IDMsg) references TouitesPublics (IDMsg)
	on update cascade
	on delete cascade
)ENGINE=INNODB;

prompt 10

create table TouitesReponses(
IDMsgRep int not null,
IDMsgSource int not null,
check(IDMsgSource != IDMsgRep),
primary key (IDMsgRep),
foreign key (IDMsgRep) references TouitesPublics (IDMsg)
	on update cascade
	on delete cascade,
foreign key (IDMsgSource) references TouitesPublics (IDMsg)
	on update cascade
	on delete cascade
)ENGINE=INNODB;

prompt 11

create table Retouites(
IDMsgRet int not null,
IDMsgSource int not null,
check(IDMsgRet != IDMsgSource),
primary key (IDMsgRet),
foreign key (IDMsgRet) references TouitesPublics (IDMsg)
	on update cascade
	on delete cascade,
foreign key (IDMsgSource) references TouitesPublics (IDMsg)
	on update cascade
	on delete cascade
)ENGINE=INNODB;

prompt 12

create table TouitesPrives(
IDMsg int not null,
IDAuteur int not null,
IDReceveur int not null,
IDMsgSource int,
check(IDMsgSource != IDMsg),
primary key (IDMsg),
foreign key (IDMsg) references Touites (IDMsg),
foreign key (IDAuteur) references Touitos (ID)
	on update cascade
	on delete cascade,
foreign key (IDReceveur) references Touitos (ID)
	on update cascade
	on delete cascade,
foreign key (IDMsgSource) references Touites (IDMsg)
	on update cascade
	on delete cascade
)ENGINE=INNODB;
