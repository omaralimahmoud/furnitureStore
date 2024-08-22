CREATE TABLE categories(
   id   INT UNSIGNED NOT NULL AUTO_INCREMENT,
   name  VARCHAR(255) NOT NULL,
   created_at DATETIME NOT NULL DEFAULT NOW(),
   
   PRIMARY KEY(id)
);


CREATE TABLE products(
   id   INT UNSIGNED NOT NULL AUTO_INCREMENT,
   name  VARCHAR(255) NOT NULL,
   description TEXT   NOT NULL,
   price    DECIMAL(8,2) NOT NULL,
   pieces_number SMALLINT NOT NULL,
   image  VARCHAR(255) NOT NULL,
   category_id INT UNSIGNED,
   created_at DATETIME NOT NULL DEFAULT NOW(),
   

   PRIMARY KEY(id),
   FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE SET NULL
);


CREATE TABLE  orders(
   id   INT UNSIGNED NOT NULL AUTO_INCREMENT,
   name  VARCHAR(255) NOT NULL,
   email  VARCHAR(255) NOT NULL ,
   phone VARCHAR(255)  NOT NULL,
   `adderess` VARCHAR(255),
   `status` ENUM('pending','approved','canceled') NOT NULL DEFAULT 'pending',
   created_at DATETIME NOT NULL DEFAULT NOW(),
   
   PRIMARY KEY(id)
);



CREATE TABLE  order_details(
   id   INT UNSIGNED NOT NULL AUTO_INCREMENT,
    order_id  INT UNSIGNED,
   product_id INT UNSIGNED,
   quantity  INT NOT NULL,
   
   PRIMARY KEY(id),
 FOREIGN KEY(order_id) REFERENCES orders(id) ON DELETE SET NULL,
 FOREIGN KEY(product_id) REFERENCES products(id) ON DELETE SET NULL

);



CREATE TABLE  admins(
   id   INT UNSIGNED NOT NULL AUTO_INCREMENT,
   name  VARCHAR(255) NOT NULL,
   email  VARCHAR(255) NOT NULL UNIQUE ,
   phone VARCHAR(255)  NOT NULL,
   `password` VARCHAR(255) NOT NULL,
    roles    ENUM('admin','superAdmin') NOT NULL DEFAULT 'admin',

   created_at DATETIME NOT NULL DEFAULT NOW(),
   
   PRIMARY KEY(id)
);



