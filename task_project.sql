CREATE SCHEMA IF NOT EXISTS `test_project` DEFAULT CHARACTER SET utf8 ;
Use test_project;

CREATE TABLE IF NOT EXISTS `tasks`(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(45),
`email` NVARCHAR(45) NOT NULL,
`textarea` LONGTEXT NOT NULL,
`status` ENUM ('Выполнена', 'Не Выполнена') NOT NULL default 'Не Выполнена',
`created at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

DROP TABLE tasks;

INSERT INTO `tasks`( name, email, textarea, status)
VALUES ('Анна','vind@mail.ru','	Посмотреть в CRM статистику по сделкам менеджеров за неделю','Выполнена');

INSERT INTO `tasks`( name, email, textarea,status)
VALUES ('Михаил','mikhail@mail.ru','Провести собеседование с кандидатом на должность менеджера','Выполнена');
INSERT INTO `tasks`( name, email, textarea)
VALUES ('Иван','ivan@mail.ru','Запросить в бухгалтерии данные по поступившим оплатам');
INSERT INTO `tasks`( name, email, textarea)
VALUES ('Нина','nind@mail.ru','	Прослушать запись звонков отдела продаж в CRM (1 ч)');

CREATE TABLE IF NOT EXISTS `users`(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`login` NVARCHAR(45) NOT NULL,
`password` NVARCHAR(255) NOT NULL,
`admin` ENUM ('true', 'false') default 'false',
`created at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

DROP TABLE users;

SELECT * FROM users;