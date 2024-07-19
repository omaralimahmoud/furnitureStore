INSERT INTO categories(name)
VALUES 
('Laptops'),
('Mobile'),
('PCs');

INSERT INTO products(name,description,price,pieces_number,image,category_id)
VALUES 
('Lenovo','this is dumy description four product',1000.99,10,'1.jpg',1),
('Hp','this is dumy description four product',10000.99,10,'2.jpg',1),
('Dell','this is dumy description four product',2000.99,10,'3.jpg',1),
('Sumsung','this is dumy description four product',1000,11,'4.jpg',1),
('Oppo ','this is dumy description four product',4000,20,'5.jpg',2),
('Apple','this is dumy description four product',100,30,'6.jpg',2),
('Infinix','this is dumy description four product',10,70,'7.jpg',2),
('PCs 123','this is dumy description four product',200,100,'8.jpg',3),
('PCs 125','this is dumy description four product',400,40,'9.jpg',3),
('PCs 126','this is dumy description four product',5000,50,'10.jpg',3);

INSERT INTO admins(name,email,phone,`password`)
VALUES 
('omar','omar@gmail.com','01159449308','$2y$10$gOfQiXuezF2rufJbrZgIOOMxyELAv/U6QFTDpkpsVeLNSUiw3CjO.');




