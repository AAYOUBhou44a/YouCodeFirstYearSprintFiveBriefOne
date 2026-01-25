-- Types ENUMs
DROP TYPE IF EXISTS role CASCADE;
CREATE TYPE role AS ENUM('admin', 'teacher', 'student');

DROP TYPE IF EXISTS type CASCADE;
CREATE TYPE type AS ENUM('individuel', 'collectif');

DROP TYPE IF EXISTS mastery_level CASCADE;
CREATE TYPE mastery_level AS ENUM('IMITER', 'S_ADAPTER', 'TRANSPOSER');

-- Drop tables to ensure fresh schema
DROP TABLE IF EXISTS debriefing_comments CASCADE;
DROP TABLE IF EXISTS student_evaluations CASCADE;
DROP TABLE IF EXISTS brief_skills CASCADE;
DROP TABLE IF EXISTS skills CASCADE;
DROP TABLE IF EXISTS briefs CASCADE;
DROP TABLE IF EXISTS sprints CASCADE;
DROP TABLE IF EXISTS classes CASCADE;
DROP TABLE IF EXISTS users CASCADE;

-- Legacy tables cleanup
DROP TABLE IF EXISTS studentSkills CASCADE;
DROP TABLE IF EXISTS debriefeds CASCADE;
DROP TABLE IF EXISTS comments CASCADE;
DROP TABLE IF EXISTS levels CASCADE;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role role NOT NULL,
    class_id INT -- Nullable, for students
);

-- Classes Table (Created after users because of teacher_id FK, but users needs class_id FK... circular dependency? No, users.class_id FK can be added later or just define table order carefully. Actually circular FK requires ALTER TABLE.
-- Let's define tables first then ALTER for the circular FK or just relies on order.
-- teacher -> users(id). class -> teacher_id.
-- student -> class(id).
-- So: Users (no FK to class yet) -> Classes (FK to teacher) -> ALTER Users add FK to Class.

CREATE TABLE IF NOT EXISTS classes (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    teacher_id INT NOT NULL,
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Now add FK to users
ALTER TABLE users 
ADD CONSTRAINT fk_user_class FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL;

-- Sprints Table
CREATE TABLE IF NOT EXISTS sprints (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    class_id INT NOT NULL,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE
);

-- Briefs Table
CREATE TABLE IF NOT EXISTS briefs (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL UNIQUE,
    description TEXT NOT NULL,
    type type NOT NULL,
    sprint_id INT NOT NULL,
    start_date DATE,
    end_date DATE,
    FOREIGN KEY (sprint_id) REFERENCES sprints(id) ON DELETE CASCADE
);

-- Competences (Skills) Table
CREATE TABLE IF NOT EXISTS skills (
    id SERIAL PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    title VARCHAR(255) NOT NULL
);

-- Association Brief <-> Skills
CREATE TABLE IF NOT EXISTS brief_skills (
    brief_id INT NOT NULL,
    skill_id INT NOT NULL,
    PRIMARY KEY (brief_id, skill_id),
    FOREIGN KEY (brief_id) REFERENCES briefs(id) ON DELETE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE
);

-- Evaluation/Debriefing Table
CREATE TABLE IF NOT EXISTS student_evaluations (
    id SERIAL PRIMARY KEY,
    student_id INT NOT NULL,
    brief_id INT NOT NULL,
    skill_id INT NOT NULL,
    level mastery_level NOT NULL,
    comment TEXT,
    date_evaluated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    evaluated_by INT NOT NULL,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (brief_id) REFERENCES briefs(id) ON DELETE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE,
    FOREIGN KEY (evaluated_by) REFERENCES users(id) ON DELETE SET NULL,
    UNIQUE (student_id, brief_id, skill_id)
);

-- General Debriefing Comments
CREATE TABLE IF NOT EXISTS debriefing_comments (
    id SERIAL PRIMARY KEY,
    student_id INT NOT NULL,
    brief_id INT NOT NULL,
    teacher_id INT NOT NULL,
    comment TEXT NOT NULL,
    date_commented TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (brief_id) REFERENCES briefs(id) ON DELETE CASCADE,
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE SET NULL
);

