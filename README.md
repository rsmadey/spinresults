# spinresults

#mysql table

CREATE TABLE player (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(32) NOT NULL,
	`credits` int(10) unsigned DEFAULT 0,
	`lifetime_spins` int(10) unsigned DEFAULT 0,
	`salt` varchar(32) NOT NULL
	PRIMARY KEY (`id`)
)

#starting rows for testing

INSERT INTO player
	(name, credits,lifetime_spins,salt)
VALUES
	('jim',12,45,MD5('jimsalt')),
	('tiffany',73,23,MD5('tiffanysalt')),
	('joel',63,23,MD5('joelsalt')),
	('paul',23,43,MD5('paulsalt')),
	('allen',34,23,MD5('allensalt'));


#created table should look like this
+----+---------+---------+----------------+----------------------------------+
| id | name    | credits | lifetime_spins | salt                             |
+----+---------+---------+----------------+----------------------------------+
|  1 | jim     |      12 |             45 | bd350a8154004aedec23e42727a7e6b3 |
|  2 | tiffany |      73 |             23 | 984e09e5ba8b4e600f527e2b24845014 |
|  3 | joel    |      63 |             23 | 0ea4de364a827d4a5a4cbebf468cf2d8 |
|  4 | paul    |      23 |             43 | 7bee8880a13cc1cae24cf4a955ab2d80 |
|  5 | allen   |      34 |             23 | ee05f2babfc55b819d8c10c9cd5273a1 |
+----+---------+---------+----------------+----------------------------------+

