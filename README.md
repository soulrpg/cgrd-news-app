# cgrd-news-app
Test assignment

# How to run
Docker & docker compose & php 8 are needed
```
docker compose up -d
docker cp ./dump.sql cgrd-news-app-db-1:/dump.sql
docker exec -it cgrd-news-app-db-1 sh -c "mysql -u root -p newsdb < dump.sql"
composer install
cd public/
php -S localhost:9000
```
Local db root password is 'admin'