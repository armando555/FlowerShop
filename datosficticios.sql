INSERT INTO `flowers` (`id`,`name`,`spice`,`amountPerFlower`,`color`,`description`,`price`,`urlImg`,`created_at`,`updated_at`)
VALUES
  (1,"Libby Stephens","volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean",19,"posuere cubilia Curae Donec tincidunt. Donec vitae erat vel pede","ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt",71196,"nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat","2021-02-12 06:57:53","2022-05-08 23:25:41"),
  (2,"Zeus Knowles","nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae",16,"porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris","auctor odio a purus. Duis elementum, dui quis accumsan convallis,",98007,"sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero","2022-05-10 09:55:23","2021-01-09 15:15:02"),
  (3,"Rudyard Malone","Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper,",1,"scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu","montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque",34601,"eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed","2022-04-10 16:55:26","2020-12-22 13:37:59"),
  (4,"Athena Benjamin","neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis.",14,"feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum","eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus",27286,"fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh","2021-07-25 14:11:19","2020-10-16 14:50:30"),
  (5,"Derek Jordan","aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend",13,"tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam","ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum",71055,"lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis","2022-04-14 10:10:42","2022-07-31 06:48:06");



INSERT INTO `combos` (`id`,`name`,`bouquetType`,`rate`,`price`,`urlImg`,`created_at`,`updated_at`)
VALUES
  (1,"Serina Shelton","ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate,",3,2,"diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae,","2021-03-06 20:16:16","2022-06-11 15:33:22"),
  (2,"Tad Rogers","ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum",5,3,"interdum enim non nisi. Aenean eget metus. In nec orci.","2020-12-21 13:45:55","2020-12-08 21:57:54"),
  (3,"Arthur Malone","pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque",4,5,"ipsum sodales purus, in molestie tortor nibh sit amet orci.","2020-11-06 15:59:45","2022-03-28 03:36:46"),
  (4,"Kyle Clements","justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate,",21,10,"scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada","2021-05-02 13:55:32","2022-08-12 13:10:50"),
  (5,"Jack Stone","eu tempor erat neque non quam. Pellentesque habitant morbi tristique",5,1,"libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis","2022-07-25 14:29:21","2021-05-04 16:43:26");


  INSERT INTO `bouquets` (`id`,`name`,`bouquetType`,`rate`,`price`,`urlImg`,`created_at`,`updated_at`)
VALUES
  (1,"Serina Shelton","ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate,",3,2,"diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae,","2021-03-06 20:16:16","2022-06-11 15:33:22"),
  (2,"Tad Rogers","ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum",5,3,"interdum enim non nisi. Aenean eget metus. In nec orci.","2020-12-21 13:45:55","2020-12-08 21:57:54"),
  (3,"Arthur Malone","pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque",4,5,"ipsum sodales purus, in molestie tortor nibh sit amet orci.","2020-11-06 15:59:45","2022-03-28 03:36:46"),
  (4,"Kyle Clements","justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate,",21,10,"scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada","2021-05-02 13:55:32","2022-08-12 13:10:50"),
  (5,"Jack Stone","eu tempor erat neque non quam. Pellentesque habitant morbi tristique",5,1,"libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis","2022-07-25 14:29:21","2021-05-04 16:43:26");

  INSERT INTO `candies` (`id`,`name`,`price`,`urlImg`,`created_at`,`updated_at`)
VALUES
  (1,"Serina Shelton",2,"diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae,","2021-03-06 20:16:16","2022-06-11 15:33:22"),
  (2,"Tad Rogers",3,"interdum enim non nisi. Aenean eget metus. In nec orci.","2020-12-21 13:45:55","2020-12-08 21:57:54"),
  (3,"Arthur Malone",5,"ipsum sodales purus, in molestie tortor nibh sit amet orci.","2020-11-06 15:59:45","2022-03-28 03:36:46"),
  (4,"Kyle Clements",10,"scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada","2021-05-02 13:55:32","2022-08-12 13:10:50"),
  (5,"Jack Stone",1,"libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis","2022-07-25 14:29:21","2021-05-04 16:43:26");


  INSERT INTO `bouquet_candies` (`id`,`bouquet_id`,`candy_id`,`created_at`,`updated_at`)
VALUES
  (1,2,0,"2021-03-06 20:16:16","2022-06-11 15:33:22"),
  (2,3,3,"2020-12-21 13:45:55","2020-12-08 21:57:54"),
  (3,1,3,"2020-11-06 15:59:45","2022-03-28 03:36:46"),
  (4,1,5,"2021-05-02 13:55:32","2022-08-12 13:10:50"),
  (5,2,5,"2022-07-25 14:29:21","2021-05-04 16:43:26");


  INSERT INTO `bouquet_flowers` (`id`,`flower_id`,`bouquet_id`,`created_at`,`updated_at`)
VALUES
  (1,2,0,"2021-03-06 20:16:16","2022-06-11 15:33:22"),
  (2,3,3,"2020-12-21 13:45:55","2020-12-08 21:57:54"),
  (3,1,3,"2020-11-06 15:59:45","2022-03-28 03:36:46"),
  (4,1,5,"2021-05-02 13:55:32","2022-08-12 13:10:50"),
  (5,2,5,"2022-07-25 14:29:21","2021-05-04 16:43:26");

  INSERT INTO `combo_flowers` (`id`,`flower_id`,`combo_id`,`created_at`,`updated_at`)
VALUES
  (1,2,0,"2021-03-06 20:16:16","2022-06-11 15:33:22"),
  (2,3,3,"2020-12-21 13:45:55","2020-12-08 21:57:54"),
  (3,1,3,"2020-11-06 15:59:45","2022-03-28 03:36:46"),
  (4,1,5,"2021-05-02 13:55:32","2022-08-12 13:10:50"),
  (5,2,5,"2022-07-25 14:29:21","2021-05-04 16:43:26");


  INSERT INTO `combo_candies` (`id`,`candy_id`,`combo_id`,`created_at`,`updated_at`)
VALUES
  (1,2,0,"2021-03-06 20:16:16","2022-06-11 15:33:22"),
  (2,3,3,"2020-12-21 13:45:55","2020-12-08 21:57:54"),
  (3,1,3,"2020-11-06 15:59:45","2022-03-28 03:36:46"),
  (4,1,5,"2021-05-02 13:55:32","2022-08-12 13:10:50"),
  (5,2,5,"2022-07-25 14:29:21","2021-05-04 16:43:26");
