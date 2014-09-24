DROP TABLE IF EXISTS news;
DROP TABLE IF EXISTS ask;
DROP TABLE IF EXISTS kww;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS articles;
DROP TABLE IF EXISTS menu;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS main;
DROP TABLE IF EXISTS config;
DROP TABLE IF EXISTS team;

CREATE TABLE news (
  id int auto_increment,
  title varchar(100),
  shortcontent text,
  longcontent text,
  created datetime,
  active boolean,
  primary key(id)
);

CREATE TABLE ask (
  id int auto_increment,
  name varchar(40),
  ip varchar(45),
  created datetime,
  answered datetime,
  question text,
  answer text,
  wait boolean,
  primary key(id)
);

CREATE TABLE categories (
  id int auto_increment,
  name varchar(50),
  content text,
  primary key(id)
);

CREATE TABLE articles (
  id int auto_increment,
  title varchar(60),
  shortcontent text,
  longcontent text,
  category int,
  primary key(id)
);

CREATE TABLE menu (
  id int not null auto_increment,
  url varchar(100),
  name varchar(50),
  active boolean,
  position int,
  protected boolean,
  submenu int,
  primary key(id)
);

CREATE TABLE users (
	id int not null auto_increment,
	username varchar(20) not null,
	password varchar(32) not null,
	primary key(id)
);

CREATE TABLE main (
	id int not null auto_increment,
	title varchar(100) not null,
	source varchar(15) not null,
	sourceid int not null,
	active boolean,
	protected boolean,
	leftpanel boolean,
	showlinks boolean,
	showcontent boolean,
	position int not null,
	primary key(id)
);

CREATE TABLE config (
	id int not null auto_increment,
	name varchar(32),
	val text,
	primary key(id)
);

CREATE TABLE team (
	id int not null auto_increment,
	name varchar(50),
	image varchar(20),
	content text,
	email varchar(100),
	phone varchar(15),
	primary key(id)
);

INSERT INTO menu (url, name, active, position, protected, submenu) VALUES ('','Strona główna',1,1,1,0);
INSERT INTO menu (url, name, active, position, protected, submenu) VALUES ('news','Aktualności',1,2,1,0);
INSERT INTO menu (url, name, active, position, protected, submenu) VALUES ('ask','Pytania',1,3,1,0);
INSERT INTO menu (url, name, active, position, protected, submenu) VALUES ('categories','Artykuły',1,4,1,-1);
INSERT INTO menu (url, name, active, position, protected, submenu) VALUES ('contact','Kontakt',1,5,1,0);
INSERT INTO menu (url, name, active, position, protected, submenu) VALUES ('team','Zespół',1,6,1,0);

INSERT INTO users (username, password) VALUES ('admin', MD5('admingm19mp91'));

INSERT INTO main (source, sourceid,title,active, protected, leftpanel, showlinks, showcontent, position) VALUES ('news', 0,'Najświeższy news',1,1,1,0,1,1);
INSERT INTO main (source, sourceid,title,active, protected, leftpanel, showlinks, showcontent, position) VALUES ('ask',0, 'Najnowsze pytanie',1,1,1,0,1,2);

INSERT INTO config (name, val) VALUES ('header', 'Naglowek');
INSERT INTO config (name, val) VALUES ('subheader', 'Naglowek drugiego poziomu');
INSERT INTO config (name, val) VALUES ('contactContent', 'Dane kontaktowe');
INSERT INTO config (name, val) VALUES ('email', 'adres e-mail');
INSERT INTO config (name, val) VALUES ('phone', 'numer telefonu');
INSERT INTO config (name, val) VALUES ('mainContent', 'Tresc strony glownej');
INSERT INTO config (name, val) VALUES ('teamContent', 'Opis zespołu');
INSERT INTO config (name, val) VALUES ('shortContent', 'bla bla');
