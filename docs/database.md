# Database

MariaDB 10.3 with the database `todo_db`. Doctrine maps the tables to the entities in
[`todo_app/src/Entity/`](../todo_app/src/Entity/).

## Schema

| Table | Columns |
|---|---|
| `user` | `id`, `email` (unique), `roles` (JSON array), `password` (bcrypt hash) |
| `todo` | `id`, `belongs_to_id` (foreign key to `user.id`), `name`, `description`, `important`, `due_to`, `done` |

## Demo data

[`db_dump/user.sql`](../db_dump/user.sql) creates four users (one admin, three users) and
[`db_dump/todo.sql`](../db_dump/todo.sql) six todos. The logins are listed in the
[README](../README.md#demo-accounts).

Docker Compose mounts the files into `/docker-entrypoint-initdb.d/` as `01-user.sql` and `02-todo.sql`. MariaDB runs
them in this order, and only when the volume `db_data` is empty, i.e. on the first start.

## Reset

Remove the volume and start again; the dumps are loaded anew:

```bash
docker compose down -v
```

```bash
docker compose up
```

## Export

Write the current data to a file on the host (you are asked for the root password from `.env`):

```bash
docker compose exec mariadb mysqldump -u root -p todo_db > todo_db.sql
```

## Migrations

The migrations in [`todo_app/migrations/`](../todo_app/migrations/) were generated during development and do not
match the dumps. Do not run them; the schema comes from `db_dump/`.
