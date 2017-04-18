use cop4710;


CREATE TABLE Students (username CHAR (20), psw CHAR (20), email CHAR(10), email_extension CHAR (20), u_name CHAR(20));


CREATE TABLE Admin (username CHAR (20), u_name CHAR(20));


CREATE TABLE Events (ev_name CHAR (20), e_type CHAR (20), event_num CHAR(20), u_name CHAR (20));


CREATE TABLE Students_Events (username CHAR(20), event_num CHAR(20));



CREATE TABLE Rso (rso_name CHAR(20), username CHAR (20),u_name CHAR (20), date_made_YY Int, date_made_MM Int, date_made_DD Int);


CREATE TABLE Student_Rso (username CHAR(20), rso_name CHAR(20));



CREATE TABLE University (u_name CHAR (20), num_students Int, address CHAR(40));


CREATE TABLE Petition (p_name CHAR (20), username CHAR(20));


CREATE TABLE Petition_ (p_name CHAR (20), username CHAR(20));



ALTER TABLE University ADD Primary Key (u_name);
ALTER TABLE students ADD Primary Key (username);
ALTER TABLE students ADD FOREIGN KEY (u_name) REFERENCES university (u_name);
ALTER table admin ADD PRIMARY key (username), ADD FOREIGN key (username) REFERENCES students (username), ADD FOREIGN key (u_name) REFERENCES university (u_name);
ALTER table events ADD PRIMARY key (event_num), ADD FOREIGN key (u_name) REFERENCES university (u_name);
ALTER TABLE students_events ADD PRIMARY KEY (event_num, username) , ADD FOREIGN KEY (event_num) REFERENCES events (event_num), ADD FOREIGN key (username) REFERENCES students (username);
ALTER TABLE rso ADD PRIMARY KEY (rso_name), ADD FOREIGN key (username) REFERENCES students (username), ADD FOREIGN key (u_name) REFERENCES university (u_name);
ALTER TABLE petition_ ADD PRIMARY KEY (p_name, username), ADD FOREIGN key (p_name) REFERENCES petition (p_name), ADD FOREIGN key (username) REFERENCES students;
ALTER TABLE student_rso ADD PRIMARY key (rso_name, username), ADD FOREIGN KEY (username) REFERENCES student (username);
ALTER TABLE petition ADD PRIMARY key (p_name), ADD FOREIGN key (username) REFERENCES students (username);