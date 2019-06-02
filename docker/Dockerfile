FROM tomcat

ENV VERSION=7.3.6

RUN apt-get update
RUN apt-get -y install php
RUN apt-get -y install php-cgi

   
COPY /project/. /usr/local/tomcat/webapps/ROOT/
COPY web.xml /usr/local/tomcat/conf/web.xml

EXPOSE 8080

ENV NAME se
