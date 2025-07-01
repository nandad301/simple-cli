pipeline {
    agent {
        docker {
            image 'php:8.2-cli'
            args '-v /var/run/docker.sock:/var/run/docker.sock'
        }
    }

    stages {
        stage('Clone Repo') {
            steps {
                echo '✅ Repo berhasil ter-clone oleh SCM.'
            }
        }

        stage('Install Dependencies') {
            steps {
                echo '📦 Tidak ada dependency untuk di-install.'
            }
        }

        stage('Run Unit Test') {
            steps {
                echo '🧪 Menjalankan unit test...'
                sh 'php tests/index_test.php'
            }
        }

        stage('Build Docker Image') {
            steps {
                echo '🔧 Membangun Docker image...'
                sh 'docker build -t php-simple-app .'
            }
        }

        stage('Deploy Container') {
            steps {
                echo '🚀 Men-deploy container...'
                sh 'docker run -d -p 9090:9090 php-simple-app'
            }
        }
    }
}
