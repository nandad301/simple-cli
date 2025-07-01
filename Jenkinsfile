pipeline {
    agent {
        docker {
            image 'php:8.1-cli'
        }
    }
    stages {
        stage('Clone Repo') {
            steps {
                echo 'Repo sudah ter-clone oleh SCM.'
            }
        }
        stage('Install Dependencies') {
            steps {
                echo 'Tidak ada dependency untuk di-install.'
            }
        }
        stage('Run Unit Test') {
            steps {
                sh 'php tests/index_test.php'
            }
        }
        stage('Build Docker Image') {
            when {
                expression { currentBuild.result == null || currentBuild.result == 'SUCCESS' }
            }
            steps {
                echo 'Build Docker Image stage would run here.'
            }
        }
        stage('Deploy Container') {
            when {
                expression { currentBuild.result == null || currentBuild.result == 'SUCCESS' }
            }
            steps {
                echo 'Deploy Container stage would run here.'
            }
        }
    }
}
