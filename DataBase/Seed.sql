INSERT INTO categories(name)
VALUES 
('Laptops'),
('Mobile'),
('PCs');

INSERT INTO products(name,description,price,pieces_number,image,category_id)
VALUES 
('Lenovo','this is dumy description four product',1000.99,10,'1.png',1),
('Hp','this is dumy description four product',10000.99,10,'2.png',1),
('Dell','this is dumy description four product',2000.99,10,'3.png',1),
('Sumsung','this is dumy description four product',1000,11,'4.png',1),
('Oppo ','this is dumy description four product',4000,20,'5.png',2),
('Apple','this is dumy description four product',100,30,'6.png',2),
('Infinix','this is dumy description four product',10,70,'7.png',2),
('PCs 123','this is dumy description four product',200,100,'8.png',3),
('PCs 125','this is dumy description four product',400,40,'9.png',3),
('PCs 126','this is dumy description four product',5000,50,'10.png',3);

INSERT INTO admins(name,email,phone,`password`)
VALUES 
('omar','omar@gmail.com','01159449308','$2y$10$gOfQiXuezF2rufJbrZgIOOMxyELAv/U6QFTDpkpsVeLNSUiw3CjO.');




