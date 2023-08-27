+ The application runs in Docker:
	- redis for cache
	- mysql for the database
	- phpmyadmin to view the database structure

+ The first step is to create the .env file (you can copy the content from .env.example)

+ After the "docker-compose up" function was runned, you need to performed the following steps:
	- enter the php container: winpty docker exec -it php //bin//sh (for windows)
	- run the command: php artisan getData:API (brings the data from that API and stores them in the database + the images in the cache/redis)

![dockerDesktop](https://github.com/IacobAlexandruGeorgian/projectX/assets/84518155/57846a6f-b6e3-42f9-9113-3bf382384ae1)

![image](https://github.com/IacobAlexandruGeorgian/projectX/assets/84518155/24a07de5-20b1-4c2f-a92a-27b464048bdc)

![image](https://github.com/IacobAlexandruGeorgian/projectX/assets/84518155/bc201537-a3a9-44bb-b181-a2afb30621d9)






