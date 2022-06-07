create database blog_zavrsni_zadatak;
create table posts (id int primary key auto_increment, title varchar(255), body text, author varchar(255),created_at date)
explain posts
insert into posts (title,body,author,created_at) values ('Blog post 1','orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','Aleksandar','2022-06-06')
insert into posts (title,body,author,created_at) values ('Blog post 2','orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','Marija','2022-06-06')
insert into posts (title,body,author,created_at) values ('Blog post 3','orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','Tea','2022-06-06')
select * from posts
create table comments (id int primary key auto_increment, author varchar(255), text text, post_id int, foreign key(post_id) references posts(id))
insert into comments (author, text, post_id) values ('Lazar','prvi komentar',1)
insert into comments (author, text, post_id) values ('Lazar','drugi komentar',1)
insert into comments (author, text, post_id) values ('Lazar','treci komentar',1)
create table author (id int primary key auto_increment,first_name varchar(255),last_name varchar(255), gender varchar(255))
insert into author values (null, 'Aleksandar', 'Radovanovic', 'male')
insert into author values (null, 'Marija', 'Radovanovic', 'female')
insert into author values (null, 'Tea', 'Radovanovic', 'female')
alter table posts drop column author 
alter table posts add column author_id int
alter table posts add foreign key (author_id) references author(id);
select * from posts
update posts set author_id = 1 where id = 1
update posts set author_id = 1 where id = 2
update posts set author_id = 1 where id = 3