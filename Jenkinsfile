pipeline {
    agent {
        dockerfile {
            filename 'Dockerfile'
        }
     }
   stages {
          stage('Install packages') {
              steps {
                  sh 'composer install'
              }
          }
      }
  stages {
         stage('Seed DB') {
             steps {
                 sh 'artisan key:generate'
                 sh 'artisan migrate --seed'
             }
         }
     }
    stages {
        stage('Test') {
            steps {
                sh 'php artisan test'
            }
        }
    }
}
