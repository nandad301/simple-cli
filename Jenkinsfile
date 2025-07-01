pipeline {
    agent {
        docker {
            image 'php:7.4-cli'
            args '-v /path/to/your/code:/app'
        }
    }
    stages {
        stage('Build') {
            steps {
                script {
                    sh 'docker build -t my-php-app .'
                }
            }
        }
        stage('Test') {
            steps {
                script {
                    sh 'php /app/tests/index_test.php'
                }
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying application...'
                // Tambah langkah deploy di sini
            }
        }
    }
}