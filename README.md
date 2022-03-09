docker run \
--detach \
--name=mysql-local \
--env="MYSQL_ROOT_PASSWORD=123456" \
--publish 6603:3306 \
--volume=/Users/love.joseph/weather/mysql_conf:/etc/mysql/conf.d \
mysql


To give user admin permission, log in and replace route from weather with /makeadmin
