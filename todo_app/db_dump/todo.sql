create table todo
(
    id            int auto_increment
        primary key,
    belongs_to_id int          null,
    name          varchar(255) not null,
    description   varchar(255) null,
    important     tinyint(1)   null,
    due_to        date         null,
    constraint FK_5A0EB6A033C857F5
        foreign key (belongs_to_id) references user (id)
)
    collate = utf8mb4_unicode_ci;

create index IDX_5A0EB6A033C857F5
    on todo (belongs_to_id);

INSERT INTO todo_db.todo (id, belongs_to_id, name, description, important, due_to) VALUES (1, 2, 'Jedi training', 'Very important to fight against Sith.', 1, '2022-11-25');
INSERT INTO todo_db.todo (id, belongs_to_id, name, description, important, due_to) VALUES (2, 3, 'Evil things', 'Planning the daily evil business. Muhaha...', 1, '2022-11-23');
INSERT INTO todo_db.todo (id, belongs_to_id, name, description, important, due_to) VALUES (3, 4, 'Jabba things', 'Jabba', 0, '2024-07-17');
INSERT INTO todo_db.todo (id, belongs_to_id, name, description, important, due_to) VALUES (4, 2, 'Repair R2D2', 'Maybe upgrade?', 0, null);
INSERT INTO todo_db.todo (id, belongs_to_id, name, description, important, due_to) VALUES (5, 3, 'Buy new Lightsaber', 'I need a new one, maybe another color than red?', 1, '2022-11-25');
INSERT INTO todo_db.todo (id, belongs_to_id, name, description, important, due_to) VALUES (6, 1, 'Admin things', 'Upgrade to PHP 4.2', 1, '2022-12-25');
