create database chp_pwn;
create user 'admin'@'localhost' identified by 'admin';
grant all on chp_pwn.* to 'admin'@'localhost';

use chp_pwn;

create table `users` (
  `username` varchar(64) default null,
  `password` varchar(64) default null
);

insert into users (`username`, `password`) values
  ('test00', 'chae7Koh4bei9thie7ieYeweiTheeth7'),
  ('test01', 'eeJ7giep9Eshoh7ye4eepheebahbeesu'),
  ('test02', 'wi3oebi7aip3aihuiPaeTie3sha3ahch'),
  ('test03', 'ko7iiphaech9Uz7ehei9Tai7aR3ziagh'),
  ('test04', 'EiWeijahteizahyai9eR3Pijochee7ei'),
  ('test05', 'ie7fiec9ioch4gohgh4soo9aiTae4eew'),
  ('test06', 'quio3Laicoogh7ooquiV7eet9Vepeng3'),
  ('test07', 'Hiy7Eephaish3thie3kiefee7bah7use'),
  ('test08', 'ahaihaiquoquaepiecaecieXoLia7aim'),
  ('test09', 'rache9bootieLee9boh7baiNohth9oos'),
  ('test0a', 'kayohngiMeichoh9aePheine7reeg9io'),
  ('test0b', 'Rievaey3ceeng3jaiJaiChadoo9CeiRu'),
  ('test0c', 'veNg3yim9nooweFaiv4Eixaeh3itohK3'),
  ('test0d', 'pi7fi3cheig7yeweeReirarah3gee4ju'),
  ('test0e', 'cahphai9Rouzienae9jooMeo7phaeboe'),
  ('test0f', 'mah7goi9Taeto7Eiquudae7gooxeuthe'),
  ('test10', 'aik7iekeikiezuPh7od9fiHoo3Maeghi'),
  ('test11', 'to9uiy3mai4seiY7em3Cae4jeenaiXei'),
  ('test12', 'ieb4aipoohaer7goo4eic3ook9aeCei7'),
  ('test13', 'oon4iefophoo9xooj4iebinoo9Chi4oh'),
  ('test14', 'JeF3pee9LiePa3areipayae4eir9aehi'),
  ('test15', 'Yoo9aec7ievei4xu3iex4eithoo9kie9'),
  ('test16', 'ahpekeicei3phai9Paed9wee4eeguuwo'),
  ('test17', 'oYixohs3ciz4ingohL7eet4ahLee4Vai'),
  ('test18', 'toic7Eeph9phai7Egoova4sohWo3Waog'),
  ('test19', 'ang7Haoy7eighu9Cigoh9uish4thaeki'),
  ('test1a', 'ioradouqu7uush7oce7aihee3oonuiro'),
  ('test1b', 'so9noo9udeiqu3ipeengei4quahnga4a'),
  ('test1c', 'cho7aejiud7ooTeeXei3eezahchieFio'),
  ('admin',  'seip9phaeghiishoo3equeow9miethoh')
;
