CREATE database IF NOT EXISTS csrf;

use csrf;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS comments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    comment TEXT
);

INSERT INTO users(username, password) VALUES('victim','victim123');
INSERT INTO users(username, password) VALUES('attacker', 'attacker123');

INSERT INTO comments(username, comment) VALUES('victim', 'Hello World!');
INSERT INTO comments(username, comment) VALUES('attacker', '<a href="http://<attacker_ip>/<path_to_your_exploits>">click here</a>');
