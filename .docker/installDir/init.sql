CREATE DATABASE apidb;

CREATE USER 'user'@'%' IDENTIFIED WITH mysql_native_password BY 'userhaslo';
GRANT ALL PRIVILEGES ON *.* TO 'user'@'%';
FLUSH PRIVILEGES;
ALTER USER 'user'@'%' IDENTIFIED WITH mysql_native_password BY 'userhaslo';