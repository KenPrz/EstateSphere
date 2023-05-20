CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
);
CREATE TABLE property (
    property_id INT PRIMARY KEY AUTO_INCREMENT,
    property_seller INT,
    property_name VARCHAR(255),
    property_owner_fname VARCHAR(255),
    property_owner_lname VARCHAR(255),
    property_owner_cont BIGINT,
    property_owner_email VARCHAR(255),
    property_status ENUM('sold', 'for sale'),
    property_type VARCHAR(255),
    property_price BIGINT,
    property_municipality VARCHAR(255),
    property_baranggay VARCHAR(255),
    property_zone_purok VARCHAR(255),
    property_map VARCHAR(255),
    property_lot_area VARCHAR(255),
    property_flr_area VARCHAR(255),
    property_img_addrs VARCHAR(255),
    num_of_beds INT,
    num_of_baths INT,
    num_of_carports INT,
    prop_others VARCHAR(500),
    prop_features VARCHAR(1000),
    FOREIGN KEY (property_seller) REFERENCES users (user_id)
);

CREATE TABLE inquiry (
    inquiry_id INT PRIMARY KEY AUTO_INCREMENT,
    inquiry_sender INT,
    contact_number BIGINT,
    email VARCHAR(255),
    concern VARCHAR(1000),
    created_at TIMESTAMP,
    FOREIGN KEY (inquiry_sender) REFERENCES users (user_id)
);