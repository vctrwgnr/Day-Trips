-- Drop the database if it already exists
DROP DATABASE IF EXISTS berlin;

-- Create the berlin database
CREATE DATABASE berlin;
USE berlin;

# DDL
CREATE TABLE trips
(
    id          INT(11)       NOT NULL,
    destination VARCHAR(100)  NOT NULL,
    description TEXT          NOT NULL
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE clients
(
    id              INT(11)       NOT NULL,
    firstName      VARCHAR(45)   NOT NULL,
    lastName       VARCHAR(45)   NOT NULL,
    gender          VARCHAR(10)   NOT NULL,
    dateOfBirth   DATE          NOT NULL,
    countryOfOrigin VARCHAR(50) NOT NULL,
    email           VARCHAR(100)  NOT NULL
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4;


DROP TABLE IF EXISTS users;
CREATE TABLE users
    (
        id          INT(11)        NOT NULL,
        username    VARCHAR(50)    NOT NULL,
        email       VARCHAR(100)   NOT NULL,
        password_hash VARCHAR(255)  NOT NULL,
        userType   ENUM('user', 'admin') NOT NULL DEFAULT 'user'
    ) ENGINE = InnoDB
      AUTO_INCREMENT = 1
      DEFAULT CHARSET = utf8mb4;

DROP TABLE IF EXISTS applicants;
CREATE TABLE applicants
(
    id              INT(11)         NOT NULL AUTO_INCREMENT,
    firstName      VARCHAR(50)     NOT NULL,
    lastName       VARCHAR(50)     NOT NULL,
    email          VARCHAR(100)    NOT NULL,
    upcomingTripId         INT(11)         NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (upcomingTripId) REFERENCES upcomingTrips(id),
    UNIQUE (email),
    CONSTRAINT unique_name_email UNIQUE (firstName, lastName, email)  -- Ensure combination of first name, last name, and email is unique
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

DROP TABLE IF EXISTS upcomingTrips;
CREATE TABLE upcomingTrips (
    id              INT(11)       NOT NULL AUTO_INCREMENT,
    tripId          INT(11)       NOT NULL,
    tripDate        DATE          NOT NULL,
    availablePlaces INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (tripId) REFERENCES trips(id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;


# DML
INSERT INTO trips (id, destination, description)
VALUES
    (1, 'Potsdam', 'Potsdam is a city on the border of Berlin, Germany. The Sanssouci Palace was once the summer home of Frederick the Great, former King of Prussia.'),
    (2, 'Dresden', 'Dresden, known for its baroque architecture, is famous for the restored Frauenkirche and the stunning Zwinger Palace.');

INSERT INTO clients (firstName, lastName, gender, dateOfBirth, countryOfOrigin, email)
VALUES
    ('John', 'Doe', 'Male', '1990-05-14', 'United States', 'john.doe@example.com'),
    ('Jane', 'Smith', 'Female', '1985-08-22', 'Canada', 'jane.smith@example.com');


INSERT INTO users (username, email, password_hash, user_type)
VALUES
    ('john_doe', 'john.doe@example.com', '$2y$10$eImiTXuWVxfM37uY4nThZ.7G.3yqVf6iF1VZ0E8Q0NOjiVOACGeC6', 'user'),  -- Hashed "password" using bcrypt
    ('jane_admin', 'jane.admin@example.com', '$2y$10$JmZ.9ZGrMihGQMTgkW9vF.5hB.4Eor4rTK5ON5KT.GRktGm5WZ0x6', 'admin');  -- Hashed "adminpass" using bcrypt



INSERT INTO applicants (id, firstName, lastName, email, upcomingTripId)
VALUES
(1, 'John', 'Doe', 'john.doe@example.com', 7);


INSERT INTO applicants (firstName, lastName, email, tripId)
VALUES
('Jane', 'Smith', 'jane.smith@example.com', 2);

INSERT INTO upcomingTrips (id, tripId, tripDate, availablePlaces) VALUES
(1, 1, '2024-12-15', 20),
(2, 2, '2025-01-10', 15);


# CONSTRAINTS
ALTER TABLE trips
    ADD PRIMARY KEY (id);
ALTER TABLE trips MODIFY COLUMN id INT AUTO_INCREMENT;

ALTER TABLE clients
    ADD PRIMARY KEY (id);
ALTER TABLE clients MODIFY COLUMN id INT AUTO_INCREMENT;

ALTER TABLE users
     ADD PRIMARY KEY (id);
ALTER TABLE users MODIFY COLUMN id INT AUTO_INCREMENT;
ALTER TABLE users
     ADD UNIQUE (username),          -- Ensures unique usernames
     ADD UNIQUE (email);             -- Ensures unique emails

ALTER TABLE tripApplicants MODIFY COLUMN id INT AUTO_INCREMENT;

ALTER TABLE upcomingTrips MODIFY COLUMN id INT AUTO_INCREMENT;




#NEW

DROP TABLE IF EXISTS applicants;
CREATE TABLE applicants
(
    id              INT(11)         NOT NULL AUTO_INCREMENT,
    firstName      VARCHAR(50)     NOT NULL,
    lastName       VARCHAR(50)     NOT NULL,
    email          VARCHAR(100)    NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (email),
    CONSTRAINT unique_name_email UNIQUE (firstName, lastName, email)  -- Ensure combination of first name, last name, and email is unique
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

DROP TABLE IF EXISTS bookings;
CREATE TABLE bookings
(
    id              INT(11)         NOT NULL AUTO_INCREMENT,
    upcomingTripId  INT(11)         NOT NULL,
    applicantId     INT(11)         NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (upcomingTripId) REFERENCES upcomingTrips(id),
    FOREIGN KEY (applicantId) REFERENCES applicants(id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;


INSERT INTO applicants (firstName, lastName, email)
VALUES
('Jane', 'Smith', 'jane.smith@example.com');

INSERT INTO applicants (firstName, lastName, email)
VALUES
('Daniel', 'K', 'k.smith@example.com');


INSERT INTO bookings (upcomingTripId, applicantId) VALUES (2, 1);














