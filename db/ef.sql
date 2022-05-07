CREATE DATABASE ef;
USE ef;

CREATE TABLE products(
	prod_code INT AUTO_INCREMENT PRIMARY KEY,
	prod_name VARCHAR(50),
	marked_price FLOAT,
	offer_price FLOAT,
	color VARCHAR(20),
	description VARCHAR(500),
	tags VARCHAR(200),
	out_of_stock BIT DEFAULT 0,
	added_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	is_deleted BIT DEFAULT 0
);

CREATE TABLE users(
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	fname VARCHAR(20),
	lname VARCHAR(20),
	phone VARCHAR(20),
	address VARCHAR(50),
	email VARCHAR(50),
	PASSWORD CHAR(32),
	role VARCHAR(10) DEFAULT "customer",
	reg_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	is_blocked BIT DEFAULT 0
);

CREATE TABLE orders(
	order_id INT AUTO_INCREMENT PRIMARY KEY,
	prod_code INT,
	FOREIGN KEY(prod_code) REFERENCES products(prod_code) ON UPDATE CASCADE ON DELETE CASCADE,
	user_id INT,
	FOREIGN KEY(user_id) REFERENCES users(user_id) ON UPDATE CASCADE ON DELETE CASCADE,
	qty INT,
	size VARCHAR(11),
	order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	bill_no INT DEFAULT 0,
	remarks VARCHAR(50) DEFAULT "",
	is_ordered BIT DEFAULT 0 AFTER remarks,
	is_delivered BIT DEFAULT 0
);

CREATE TABLE reviews(
	review_id INT AUTO_INCREMENT PRIMARY KEY,
	prod_code INT,
	FOREIGN KEY(prod_code) REFERENCES products(prod_code) ON UPDATE CASCADE ON DELETE CASCADE,
	user_id INT,
	FOREIGN KEY(user_id) REFERENCES users(user_id) ON UPDATE CASCADE ON DELETE CASCADE,
	review VARCHAR(100),
	rating INT DEFAULT 5,
	review_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	is_deleted BIT DEFAULT 0
);

-- inserting data into users table
INSERT INTO users (fname,lname,phone,address,email,PASSWORD,role) VALUES("Admin","EF","9860081869","Kalopul, Kathmandu","info@efhub.com.np","161ebd7d45089b3446ee4e0d86dbcf92","admin");
INSERT INTO users (fname,lname,phone,address,email,PASSWORD) VALUES("Manoj","Basnet","9843242332","Kalopul, Kathmandu","basnetm02@gmail.com","161ebd7d45089b3446ee4e0d86dbcf92");

-- inserting data into products table
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Black Run Hoodie",1800,1500,"Black","Premium quality black colored hoodie for winter season.","men,women,unisex,hoodie,tops,sweatshirt,black");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Plain Black Drop Shoulder T-shirt Women",800,500,"Black","Premium quality black colored tshirt for women.","women,t-shirt,tops,black");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("White Drop Shoulder T-shirt Men",1200,800,"White","Premium quality white colored drop shoulder tshirt for men.","men,unisex,t-shirt,tops");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Sports Bra",700,400,"Multi-Color","Premium quality sports bra to wear as an inner layer piece.","women,bra,sports-bra,tops");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Hand-Knitted Woolen Gloves",900,500,"Multi-Color","Premium quality, hand-knitted woolen gloves available in multiple color. For a specific color, please let us know.","men,women,unisex,gloves,winter,cold,warm");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("White Striped Shirt",1200,600,"White","Premium quality white colored unisex shirt.","men,women,unisex,shirt,tops,white,striped");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Blue Men's Denim Jacket",2400,2000,"Blue","Premium quality blue denim jacket for men.","men,jacket,denim,tops");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Washed Out Denim Jacket",2800,2300,"Blue-Gray","Premium quality washed out unisex denim jacket, now available in Everest Fashion Hub.","men,women,unisex,denim,jacket,jeans,blue,washed");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Premium Dotted Tie",500,300,"Multi-Color","Premium quality dotted tie for gentlemen available in different colors.","men,tie,gentlemen,suit,coat,blue");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Red Women's Leather Gloves",1500,900,"Red","Premium quality red colored leather gloves for women for winter season.","men,gloves,warm,winter");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Hand-Knitted Woolen Sweater",1800,1550,"Multi-Color","Premium quality hand-knitted woolen sweater for both men and women available in multiple colors.","men,women,unisex,tops,hand-knitted,woolen,sweater,winter,sweatshirt");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Women's Full-Sleeved Cropped Top Sweatshirt",2100,1900,"Lavender","Premium quality lavender colored full sleeved cropped top sweatshirt.","women,tops,hoodie,lavender,sweatshirt");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Women's Trouble Hoodie",1800,1500,"Pink","Premium quality pink colored hoodie for women.","women,hoodie,tops,sweatshirt,pink");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Love Yourself Hoodie",1800,1500,"Blue","Premium quality blue colored hoodie for winter season.","men,women,unisex,hoodie,tops,sweatshirt");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Premium Quality Black Leather Shoes",3200,2800,"Black","Premium quality black leather shoes for men, made up of crocodile's skin.","men,shoes,leather,black,dress,gentle,formal,suit");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Unisex Charcoal T-shirt",800,500,"Charcoal-Black","Charcoal black unisex tshirt, now available.","men,women,unisex,tops,shirt,t-shirt");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Blue Dragon Printed Kimono",3200,2500,"Blue","Premium quality blue dragon printed kimono for men is now available in Everet Fasion Hub.","men,kimono,blue,chinese,dress,cultural");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("White Plain T-shirt",900,450,"White","White plain tshirt now available for affordable price.","men,women,unisex,t-shirt,tops,white,plain");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Pink Drop Shoulder T-shirt",1200,900,"Pink","Premium quality pink colored drop shoulder unisex tshirt, now available.","men,women,unisex,t-shirt,pink,summer,tops,sweatshirt");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Gold Gentlemen Tie",800,500,"Multi-Color","Premium quality gentlemen tie, now available in multiple colors.","men,gentlemen,dress,suit,gold");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("White Plain Hoodie",1800,1500,"White","Premium quality white colored hoodie for winter season.","men,women,unisex,hoodie,tops,sweatshirt,white");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Gray Plain Hoodie",1800,1500,"Gray","Premium quality gray colored hoodie for winter season.","men,women,unisex,hoodie,tops,sweatshirt");
INSERT INTO products (prod_name,marked_price,offer_price,color,description,tags) VALUES ("Men's Plain Green Kimono",3800,3200,"Green","Premium quality green plain kimono, winter wearable, now available.","men,kimono,chinese,cultural,dress");

-- inserting data into the orders table
INSERT INTO orders (prod_code,user_id,qty,size) VALUES (3,2,3,"XL");
INSERT INTO orders (prod_code,user_id,qty,size) VALUES (5,2,2,"M");
INSERT INTO orders (prod_code,user_id,qty,size) VALUES (7,2,1,"L");
INSERT INTO orders (prod_code,user_id,qty,size) VALUES (15,2,4,"L");

-- inserting data into the reviews table
SELECT * FROM reviews;
INSERT INTO reviews (prod_code,user_id,review,rating) VALUES (3,2,"Love the design. Feels like a t-shirt I would wear everyday. Overall good quality. Not super soft which is nice. And to me a perfect t-shirt for a hot summer day!",5);
INSERT INTO reviews (prod_code,user_id,review,rating) VALUES (3,2,"Just received the T-shirt today, and honestly it's amazing, the quality of the cloth, the design, and everything about it is a 10/10. Would definitely recommend this high quality t-shirt 💯.",3);
INSERT INTO reviews (prod_code,user_id,review,rating) VALUES (3,2,"Really good t-shirt, nice and comfortable.",4);