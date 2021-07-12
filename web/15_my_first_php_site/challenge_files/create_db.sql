CREATE TABLE IF NOT EXISTS "users" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "username" VARCHAR,
  "password" VARCHAR
);

CREATE TABLE IF NOT EXISTS "feedback" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "name" VARCHAR,
  "email" VARCHAR,
  "message" TEXT
);

CREATE TABLE IF NOT EXISTS "flag" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "flag" VARCHAR
);

INSERT INTO "users" ("username", "password") VALUES ("nigel", "nooneisevergoingtoguessthispasswordsinceitissooooomanycharacterslong!");
INSERT INTO "feedback" ("name", "email", "message") VALUES ("David", "david@david.com", "This website is alright, you just took a HTML5 Up template and chucked PHP into it...");
INSERT INTO "flag" ("flag") VALUES ("CTF{i_5h0uLd_pRoBs_l3aRn_aBoUt_pRePaRed_qU3ri3s...}")
