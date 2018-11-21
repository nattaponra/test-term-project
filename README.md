Main-Implemented-fixed
#### 1. Clone Project
```
git clone https://github.com/nattaponra/test-term-project.git
```
#### 1.Install docker and docker-compose
- docker: https://docs.docker.com/install/
- docker-compose: https://docs.docker.com/compose/install/#install-compose


#### 2.Run docker-compose to start service (Nginx,PHP-FPM)
```
cd test-term-project
docker-compose up -d
```
#### Install PHP Packages via Composer
```
docker exec -i phpfpm composer install
```

#### Run PHPUNIT
```
docker exec -i phpfpm  ______
```

