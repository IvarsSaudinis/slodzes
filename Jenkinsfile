pipeline {
    agent {
        dockerfile {
            filename 'Dockerfile'
        }
     }
   stages {
            stage('jenkins file selftest info') {
                 steps {
                     sh 'php -v'
                     sh 'pwd'
                     sh 'ls -la'
                 }
             }
            stage('Install php packages') {
                   steps {
                       sh 'cp .env.testing .env'
                       sh 'touch database/database.sqlite'
                       sh 'rm composer.lock'
                       sh 'composer install'
                   }
             }
            stage('DB SEED') {
                  steps {
                      sh 'php artisan key:generate'
                      sh 'php artisan migrate --seed'
                  }
              }

            stage('Test') {
                   steps {
                       sh 'php artisan test'
                   }
            }
      }

}
