CREATE USER 'development'@'localhost' IDENTIFIED BY 'supersecurelongpasswordnoonewillgetlol';
GRANT ALL PRIVILEGES ON *.* TO 'development'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS users (
  name VARCHAR(256),
  email VARCHAR(256),
  password VARCHAR(256)
);

CREATE TABLE IF NOT EXISTS userunits (
  email VARCHAR(256),
  unit VARCHAR(256)
);

CREATE TABLE IF NOT EXISTS usersubmissions (
  email VARCHAR(256),
  unit VARCHAR(256),
  assignment VARCHAR(256),
  uploadedfile VARCHAR(256)
);

CREATE TABLE IF NOT EXISTS assignments (
  unit VARCHAR(256),
  assignment VARCHAR(256),
  description VARCHAR(256),
  duedate DATE
);

INSERT INTO users (name, email, password) VALUES ("Developer", "dev@cssubmit2.uwa.edu.au", "$2y$10$l2z4ncwQlwvS8e7xvakZBugPXSDLOOp6FVjNxcbdTK3pVL2iTv0W.");
INSERT INTO userunits (email, unit) VALUES ("dev@cssubmit2.uwa.edu.au", "CITS3004");
INSERT INTO userunits (email, unit) VALUES ("dev@cssubmit2.uwa.edu.au", "CITS1003");
INSERT INTO assignments (unit, assignment, description, duedate) VALUES ("CITS1003", "CTF Writeup", "Submit your writeup for the CITS1003 labs!", DATE("2021-12-25 12:00:00"));
INSERT INTO assignments (unit, assignment, description, duedate) VALUES ("CITS3004", "Project Report", "Submit your CITS3004 assignment project as a PDF file!", DATE("2021-12-25 12:00:00"));
