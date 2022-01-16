// TODO: При создании новой базы добавить к некоторым полям уникальное значение

CREATE TABLE teachers (
   id INTEGER PRIMARY KEY AUTOINCREMENT,
   name TEXT NOT NULL,
   surname TEXT NOT NULL,
   email TEXT NOT NULL UNIQUE
);

CREATE TABLE courses (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL UNIQUE
);

CREATE TABLE streams (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    course_id INTEGER NOT NULL, 
    number_stream INTEGER NOT NULL UNIQUE,
    date_start TEXT NOT NULL,
    number_student INTEGER NOT NULL,
    FOREIGN KEY (course_id) REFERENCES courses 
);

CREATE TABLE grades (
    teacher_id INTEGER NOT NULL,
    stream_id INTEGER NOT NULL,
    grade REAL NOT NULL,
    PRIMARY KEY (teacher_id, stream_id)
    FOREIGN KEY (teacher_id) REFERENCES teachers
    FOREIGN KEY (stream_id) REFERENCES streams
);


1. В таблице streams переименуйте столбец даты начала обучения в started_at.
ALTER TABLE streams RENAME COLUMN date_start TO started_at;

2. В таблице streams добавьте столбец даты завершения обучения finished_at.
ALTER TABLE streams ADD COLUMN finished_at TEXT

3. Приведите базу данных в полное соответствие с данными в таблицах
INSERT INTO 'teachers' (id, name, surname, email)
VALUES 
    (1, 'Николай', 'Савельев', 'saveliev.n@mai.ru')

INSERT INTO 'teachers' (name, surname, email)
VALUES
    ('Наталья', 'Петрова', 'petrova.n@yandex.ru'),
    ('Елена', 'Малышева', 'malisheva.e@google.com');



INSERT INTO 'courses' (id, name)
VALUES
    (1, 'Базы данных');

INSERT INTO 'courses' (name)
VALUES
    ('Основы Python'),
    ('Linux. Рабочая станция');



INSERT INTO 'streams' (id, course_id, number_stream, started_at, number_student)
VALUES
    (1, 3, 165, '18.08.2020', 34);

INSERT INTO 'streams' (course_id, number_stream, started_at, number_student)
VALUES
    (2, 178, '02.10.2020', 37),
    (1, 203, '12.11.2020', 35),
    (1, 210, '03.12.2020', 41);



INSERT INTO 'grades' (teacher_id, stream_id, grade)
VALUES
    (3, 1, 4.7),
    (2, 2, 4.9),
    (1, 3, 4.8),
    (1, 4, 4.9);