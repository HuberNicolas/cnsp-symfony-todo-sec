# CNSP Challenge Task

## Prerequisites

1. Docker Desktop (4.14) <https://www.docker.com/products/docker-desktop/>
2. PHP (> 8.1.5) <https://www.php.net/downloads>
3. Composer (either)
    * <https://getcomposer.org/doc/00-intro.md#installation-linux-unix-maco>
    * <https://getcomposer.org/doc/00-intro.md#installation-windows>

## Installation

1. First, clone the repo

```shell
git clone https://github.com/HuberNicolas/cnsp-symfony-todo-sec
```

2. Navigate to root folder of the project and make sure docker is running (e.g., via `cd`)
3. Run

```shell
docker compose up
```

3. Open a shell on the _mariadb-1_ container (e.g., via Docker Desktop)
![shell on db container](/docs/shell_db_container.png)

```shell
cd dump
```

```shell
mysql -u root -p todo_db < user.sql
```

now enter the root password from the _mariadb-1_ container, which can be found in the compose file. (_MARIADB_ROOT_PASSWORD_)

```shell
cd dump
```

```shell
mysql -u root -p todo_db < todo.sql
```

again, enter the root password from the _mariadb-1_ container.

4. Open a shell on the _todo_app-1_ container (e.g., via Docker Desktop)

```shell
cd todo_app
```

```shell
composer install
```

After that, the application can be accessed on <http://localhost:443/>

## Credentials

* luke (user1)
  * luke@jedi.sw
  * QA9ha+CAMkRc&g5e

* vader (user2)
  * vader@deathstar.sw
  * t?n%#zrd2XGXfPe6

* jabba  (dummy)
  * jabba@thehut.sw
  * password123456

## Screenshots

![screenshot](/docs/screenshot1.png)
![screenshot](/docs/screenshot2.png)
![screenshot](/docs/screenshot3.png)
![screenshot](/docs/screenshot4.png)
