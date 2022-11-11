create table user
(
    id       int auto_increment
        primary key,
    email    varchar(180) not null,
    roles    longtext     not null comment '(DC2Type:json)',
    password varchar(255) not null,
    constraint UNIQ_8D93D649E7927C74
        unique (email)
)
    collate = utf8mb4_unicode_ci;

INSERT INTO todo_db.user (id, email, roles, password) VALUES (1, 'admin@symtodosec.com', '["ROLE_ADMIN"]', '$2y$13$A.mKNKRRlC4q8COqY6XqD.8n3sHotGa8PEAuzaxC4arDGoNfQuBuC');
INSERT INTO todo_db.user (id, email, roles, password) VALUES (2, 'luke@jedi.sw', '["ROLE_USER"]', '$2y$13$qf4xjx4X8fsS1QTzjkU1WuGtPbkf.OHMPatHaW/Yf4dplVpK/FMv6');
INSERT INTO todo_db.user (id, email, roles, password) VALUES (3, 'vader@deathstar.sw', '["ROLE_USER"]', '$2y$13$cRvn76/yyV9aDI.BpAGGB.Ez/uzx.4vUMR1cbWPFKhSlwZqtYA8Ku');
INSERT INTO todo_db.user (id, email, roles, password) VALUES (4, 'jabba@thehut.sw', '["ROLE_USER"]', '$2y$13$sUZOoJzOUpwS3ADc9zC22urNV3.4D2yIfJlMSbblFIEdgYkUXCWMK');
