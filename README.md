# Inception

This project creates a WordPress website with a LEMP Stack in Docker, using Nginx, MariaDB and PHP. It also has extra services as Redis Cache, Adminer, an FTP Server and a static website created with Hugo.

## Description

The Wordpress Server is deployed using Docker in a Linux system, using a basic Alpine image as reference for every service generated. It creates a LEMP Stack, with every service isolated in its own container, and connected using private networks. It uses Docker Compose as a tool to deploy all services at the same time, maintaining the needed dependances between each of the applications.

It features a simple Nginx web server, with MariaDB as the database, and PHP-FPM as Wordpress manager. This way, every request to Nginx is routed to the PHP server, which interprets it as Wordpress needs, and if needed updates the MariaDB database. On top of those basic services, the server has some extra ones, which are Redis Cache, Adminer, an FTP Server and a static website created with Hugo to complement the basic Wordpress site.

Every single service is configured on top of a plain Alpine image, generating the needed setting files and options so it fulfills every capabilities, while keeping the security of the server as its top priority. For this reason the .env file, which serves as the storage of all the passwords and users, MUST NOT be uploaded to any public website. It has only be uploaded this time as this is a test for learning purposes.

This server was original implemented in a Debian VM.

## Services

The server features the next basic services:

* [Nginx](https://github.com/Sefy-j/Inception/tree/master/srcs/requirements/nginx) : Works as web server and request manager, sending every inquiry to the right service, especially to the PHP or Adminer servers. For security reasons, only HTTPS connections are allowed. In this case, and only as a test tool, it also creates the SSL certificates needed to allow HTTPS connections. In any other environment, this certificate MUST be signed by a Certificate Authority (CA).
* [MariaDB](https://github.com/Sefy-j/Inception/tree/master/srcs/requirements/mariadb) : Creates the needed database for the Wordpress site, as well as the users defined as administrators in the .env file.
* [Wordpress](https://github.com/Sefy-j/Inception/tree/master/srcs/requirements/wordpress) : The Wordpress installation itself, uses PHP-FPM as interpreter of all the input requests. This service connects also with the database, in order to update it when needed.

As some extra services, the server also provide of:

* [Redis](https://github.com/Sefy-j/Inception/tree/master/srcs/requirements/bonus/redis): It implements a simple cache service using Redis. It allows for a faster response for the most viewed pages.
* [Adminer](https://github.com/Sefy-j/Inception/tree/master/srcs/requirements/bonus/adminer) : Serves as a visual manager for the databse. It allows to see and modify it without the direct use of SQL queries.
* [FTP Server](https://github.com/Sefy-j/Inception/tree/master/srcs/requirements/bonus/ftp): Creates a FTP safe connection to the Wordpress files, in order to be able to upload or modify easily those using a graphic interface.
* [Hugo](https://github.com/Sefy-j/Inception/tree/master/srcs/requirements/bonus/hugo) : Generates a static webpage as a complement for the Wordpress website.

## Prerequisites

Before using this server, you need to make sure you have installed the last Docker version, as well as the Docker Compose feature.

## Build and Run the project

This project uses a Makefile in order to create the needed containers via Docker Compose. Simply run "make" to generate all the server and services.

You can modify all the users, passwords, and URL as you wish in the .env file.

Once all the Docker containers are running, you can start setting up your Wordpress website accessing the right URL.

## Documentation

Every single service setting such us its Dockerfile or configuration files, as well as the Debian VM machine settings or the use of Docker Compose can be consulted in the [references](https://github.com/Sefy-j/Inception/tree/master/Bibliografia) section.

## License

MIT
