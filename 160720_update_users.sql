Alter table `users` add column `phone_number` int(10) after `email`;
Alter table `users` add column `profile_picture` varchar(255)  after `phone_number`;
Alter table `users` add column `role` int(1) after `name`;