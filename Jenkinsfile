pipeline {
    agent {
        dockerfile {
            filename 'Dockerfile'
        }
     }
    stages {
        stage('Test') {
            steps {
                sh 'php -v'
                sh 'nodejs -v'
            }
        }
    }
}
