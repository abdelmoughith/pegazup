CREATE DATABASE pegazup;
create Table options(
                        id INT PRIMARY KEY,
                        name varchar(10) NOT NULL,
                        price FLOAT
);
CREATE TABLE people(
                       id INT PRIMARY KEY auto_increment,
                       fname VARCHAR(30),
                       lname VARCHAR(30),
                       email VARCHAR(255),
                       age VARCHAR(30),
                       inscription INT,
                       password VARCHAR(255),
                       foreign key (inscription)
                           references options(id)
);
CREATE TABLE cards(
                      id INT PRIMARY KEY auto_increment,
                      name VARCHAR(255) NOT NULL,
                      number VARCHAR(255) NOT NULL,
                      exp_date VARCHAR(255) NOT NULL,
                      cvv VARCHAR(255) NOT NULL,
                      personid INT,
                      foreign key (personid)
                          REFERENCES people(id)
);
