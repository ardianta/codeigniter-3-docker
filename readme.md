# Codeigniter 3 on Docker

Run Codeigniter 3 project inside docker.

Docker Services:
- PHP FCM 5.6 to run codeigniter application
- Ningx as web server
- MySQL 5.7 as database server

# How to Run

Run the containers

```bash
docker compose up
```

After that, create new table `user` in the MySQL server.

```sql
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Insert data seed:

```sql
INSERT INTO user (username, password, email)
VALUES ('jane_doe', 'securepass', 'jane@example.com');

INSERT INTO user (username, password, email)
VALUES ('alice', 'alicepass', 'alice@example.com');

INSERT INTO user (username, password, email)
VALUES ('bob', 'bobpass', 'bob@example.com');
```