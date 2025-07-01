pipeline {
    agent {
        docker {
            image 'php-docker-cli' // image custom yang kamu build
            args '-v /var/run/docker.sock:/var/run/docker.sock'
        }
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
                echo '✅ Repo berhasil ter-clone oleh SCM.'
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
