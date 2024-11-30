# Codeigniter 3 on Docker

Run Codeigniter 3 project inside docker. Codeigniter v3.1.13.

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

Open `localhost:8000`.

# Notes

If you want to add PHPMyAdmin Service, you can add in `docker-compose.yml` at `services`.

```yml
version: '3.7'

services:
  # ...
  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    container_name: codeigniter_phpmyadmin
    environment:
      PMA_HOST: db
      MYSQL_ROOT_PASSWORD: root
    ports:
      - "8080:80"
    depends_on:
      - db
    networks:
      - ci_network

networks:
  ci_network:

volumes:
  db_data:

```

..or you can expose the MySQL port and use MySQL Client like MySQL Workbench
to connect to the database.

```yaml
version: '3.7'

services:
 #...
  db:
    image: mysql:5.7
    container_name: codeigniter_db
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: codeigniter
      MYSQL_USER: user
      MYSQL_PASSWORD: password
    volumes:
      - db_data:/var/lib/mysql
    ports:
      - "3306:3306" # Expose MySQL port to localhost
    networks:
      - ci_network
```