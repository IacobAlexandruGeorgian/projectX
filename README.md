+ Aplicatia ruleaza in Docker:
	- redis pentru cache
	- mysql pentru baza de date
	- phpmyadmin pentru a vizualiza inregistrarile din baza de date

+ Dupa ce a fost rulata functia: docker-compose up -d --build, se realizeaza urmatorii pasi:
	- se intra in php container: winpty docker exec -it php //bin//sh (pentru windows)
	- se ruleaza comanda: php artisan migrate
	- se apeleaza comanda pentru testele unitare: ./vendor/bin/phpunit
	- se ruleaza comanda: php artisan getData:API (aduce datele din acel API si le stocheaza in baza de date + imaginile in cache/redis)

! Venind foarte multe date pe acel API, e posibil sa dureze comanda pana se finalizeaza complet,
dar poate fi intrerupta si vor fi afisate datele care au fost stocate pana in acel moment.

![dockerDesktop](https://github.com/IacobAlexandruGeorgian/projectX/assets/84518155/57846a6f-b6e3-42f9-9113-3bf382384ae1)

![commandsPHPContainer](https://github.com/IacobAlexandruGeorgian/projectX/assets/84518155/05eb11e9-7216-463a-b378-40b224740dc4)

![phpmyadmin](https://github.com/IacobAlexandruGeorgian/projectX/assets/84518155/b77b3a0e-d3eb-4a93-b68b-9b2b9bd02fa7)


