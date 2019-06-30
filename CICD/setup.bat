docker --version>a.txt
docker stop $(docker ps -a -q)
docker rm apache
docker rm php
docker rm mysql
docker-compose up

