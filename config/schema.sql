CREATE DATABASE IF NOT EXISTS debriefing;
USE debriefing;

CREATE TABLE IF NOT EXISTS users(
    id INT AUTO INCREMENT PRIMARY KEY , 
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, 
    age INT NOT NULL , 
    phone VARCHAR(255) NOT NULL UNIQUE, 
    role ENUM('admin', 'teacher', 'student')
);

CREATE TABLE IF NOT EXISTS classes(
    id INT AUTO INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE, 
    teacherId INT NOT NULL UNIQUE , 
    FOREIGN KEY (teacherId) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS sprints(
    id INT AUTO INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL ,
    startDate DATETIME NOT NULL ,
    endDate DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS briefs (
    id INT AUTO INCREMENT PRIMARY KEY, 
    title VARCHAR(255) NOT NULL UNIQUE,
    description text NOT NULL ,
    content text NOT NULL , 
    type ENUM('individuel', 'collectif'),
    sprintId int NOT NULL, 
    classId int NOT NULL, 
    startDate DATETIME, 
    endDate DATETIME
    FOREIGN KEY (sprintId) REFERENCES sprints(id)
    FOREIGN KEY (classId) REFERENCES classes(id)
);

CREATE TABLE IF NOT EXISTS skills(
    id INT AUTO INCREMENT PRIMARY KEY, 
    code VARCHAR(5) NOT NULL UNIQUE, 
    title VARCHAR(255) NOT NULL UNIQUE, 
);
-- CREATE TABLE IF NOT EXISTS levels(
--     id INT AUTO INCREMENT PRIMARY KEY,
--     level VARCHAR(255) NOT NULL UNIQUE, 
-- );
CREATE TABLE IF NOT EXISTS briefSkills(
    briefId INT NOT NULL ,
    skillId INT NOT NULL ,
     
    -- studentId
    -- ENUM(valid, invalid)

    -- levelId INT NOT NULL,
    FOREIGN KEY (briefId) REFERENCES briefs(id),
    FOREIGN KEY (skillId) REFERENCES skills(id)
);

CREATE TABLE IF NOT EXISTS studentSkills(
    studentId INT NOT NULL,
    briefId INT NOT NULL ,
    skillId INT NOT NULL , 
    levelId INT NOT NULL ,
    ENUM('valid', 'invalid'),
    CONSTRAINT student_skill FOREIGN KEY (studentId) REFERENCES users(id),
    CONSTRAINT brief_skill FOREIGN KEY (briefid) REFERENCES debriefeds(id), 
    CONSTRAINT skill FOREIGN KEY (skillId) REFERENCES briefSkills(skillId),
    CONSTRAINT levelId FOREIGN KEY (levelId) REFERENCES levels(id)
);

CREATE TABLE IF NOT EXISTS debriefeds(
    briefId INT NOT NULL,
    studentId INT NOT NULL,
    teacherId INT NOT NULL,
    FOREIGN KEY (briefId) REFERENCES briefs(id),
    FOREIGN KEY (studentId) REFERENCES users(id),
    FOREIGN KEY (teacherId) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS comments(
    briefId INT NOT NULL,
    studentId INT NOT NULL,
    comment text NOT NULL,
    FOREIGN KEY (briefId) REFERENCES debriefeds(briefId),
    FOREIGN KEY (studentId) REFERENCES users(id)
);