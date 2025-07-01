pipeline {
    agent any

    stages {
        stage('Clone Repo') {
            steps {
                echo '✅ Repo berhasil ter-clone oleh SCM.'
            }
        }

        stage('Cek Ketersediaan PHP') {
            steps {
                script {
                    def phpCmd = isUnix() ? 'php' : 'php.exe'
                    echo "🔍 Mengecek apakah PHP tersedia..."
                    def status = sh(script: "${phpCmd} -v", returnStatus: true)
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
                    def phpCmd = isUnix() ? 'php' : 'php.exe'
                    echo '🧪 Menjalankan unit test...'
                    sh "${phpCmd} tests/index_test.php"
                }
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    def dockerCmd = isUnix() ? 'docker' : 'docker.exe'
                    echo '🔧 Membangun Docker image...'
                    def status = sh(script: "${dockerCmd} --version", returnStatus: true)
                    if (status != 0) {
                        error "❌ Docker tidak tersedia. Pastikan Docker terinstall dan Jenkins memiliki akses ke Docker daemon."
                    }
                    sh "${dockerCmd} build -t php-simple-app ."
                }
            }
        }

        stage('Deploy Container') {
            steps {
                script {
                    def dockerCmd = isUnix() ? 'docker' : 'docker.exe'
                    echo '🚀 Men-deploy container...'
                    sh "${dockerCmd} run -d -p 9090:9090 php-simple-app"
                }
            }
        }
    }
}
