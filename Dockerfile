# docker build -t myapp:alpine .
FROM php:8.1-cli-alpine

WORKDIR /app
# ekstensions
RUN docker-php-ext-install pdo_mysql

# Tambahkan user jenkins ke grup docker
RUN usermod -aG docker jenkins

COPY .

EXPOSE 9090
CMD ["php", "-S", "0.0.0.0:9090", "-t", "src"]
