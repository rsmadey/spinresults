# spinresults

#mysql table

CREATE TABLE Player (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(32) NOT NULL,
	`credits` int(10) unsigned DEFAULT 0,
	`lifetime_spins` int(10) unsigned DEFAULT 0,
	`salt` varchar(32) NOT NULL
)PRIMARY KEY (`id`)
