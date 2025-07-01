# Menggunakan image PHP
FROM php:7.4-cli

# Menyalin source code ke direktori kerja
COPY src/ /app/src/

# Set direktori kerja
WORKDIR /app/src/

# Menjalankan perintah untuk menginstal dependensi jika ada
# RUN apt-get update && apt-get install -y ...

# Menjalankan aplikasi
CMD ["php", "index.php"]