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
           stage('Seed DB') {
               steps {
                   sh 'artisan key:generate'
                   sh 'artisan migrate --seed'
               }
           }
            stage('Test') {
               steps {
                   sh 'php artisan test'
               }
           }
      }

}
