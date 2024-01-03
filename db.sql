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
