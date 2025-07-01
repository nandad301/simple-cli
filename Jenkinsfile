pipeline {
    agent any

    environment {
        PHP_EXEC = isUnix() ? 'php' : 'php.exe'
        DOCKER = isUnix() ? 'docker' : 'docker.exe'
    }

    stages {
        stage('Clone Repo') {
            steps {
                echo '✅ Repo berhasil ter-clone oleh SCM.'
            }
        }

        stage('Cek Ketersediaan PHP') {
            steps {
                script {
                    echo "🔍 Mengecek apakah PHP tersedia..."
                    def status = sh(script: "${env.PHP_EXEC} -v", returnStatus: true)
                    if (status != 0) {
                        error "❌ PHP tidak ditemukan di environment Jenkins. Harap install PHP atau gunakan Docker agent."
                    }
                }
            }
        }

        stage('Install Dependencies') {
            steps {
                echo '📦 Tidak ada dependency untuk di-install.'
            }
        }

        stage('Run Unit Test') {
            steps {
                script {
                    echo '🧪 Menjalankan unit test...'
                    sh "${env.PHP_EXEC} tests/index_test.php"
                }
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    echo '🔧 Membangun Docker image...'
                    def status = sh(script: "${env.DOCKER} --version", returnStatus: true)
                    if (status != 0) {
                        error "❌ Docker tidak tersedia. Pastikan Docker terinstall dan Jenkins memiliki akses ke Docker daemon."
                    }
                    sh "${env.DOCKER} build -t php-simple-app ."
                }
            }
        }

        stage('Deploy Container') {
            steps {
                script {
                    echo '🚀 Men-deploy container...'
                    sh "${env.DOCKER} run -d -p 9090:9090 php-simple-app"
                }
            }
        }
    }
}
