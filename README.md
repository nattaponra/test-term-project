##Term Project 
#### 1.Install docker and docker-compose
- docker: https://docs.docker.com/install/
- docker-compose: https://docs.docker.com/compose/install/#install-compose


#### 2. Clone Project
```
git clone https://github.com/nattaponra/test-term-project.git
```

#### 3.Run docker-compose to start service (Nginx,PHP-FPM)
```
cd test-term-project
docker-compose up -d
```

#### 4.Install PHP Packages via Composer
```
docker exec -i phpfpm composer install
```

#### 5.Run PHPUnit

```
docker exec -i phpfpm ./vendor/bin/phpunit ./test/

```
##### Option
Run all test case
```
./run-test-all.sh
```

Run step1
```
./run-test-step1.sh
```

Run step2
```
./run-test-step2.sh
```
#### 6. Open website 
http://127.0.0.1/view/login.html
