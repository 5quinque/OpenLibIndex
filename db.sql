CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `subtitle` varchar(128) NOT NULL,
  `numbers_of_pages` int(11),
  `key` varchar(128),
  `publish_date` varchar(128),
  `by_statement` varchar(128),
  PRIMARY KEY (`id`)
);
CREATE TABLE `covers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `cover` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE `isbn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `isbn` varchar(32) NOT NULL,
  `format` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE `identifiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `identifiers` varchar(32) NOT NULL,
  `site` varchar(24) NOT NULL UNIQUE,
  PRIMARY KEY (`id`)
);
CREATE TABLE `author_index` (
  `bid` int(11) NOT NULL,
  `author_key` varchar(24) NOT NULL
);
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `key` varchar(24) NOT NULL UNIQUE,
  PRIMARY KEY (`id`)
);
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11),
  `subject` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
);
