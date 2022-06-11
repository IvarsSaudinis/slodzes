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
        stage('DB SEED') {
              steps {
                  sh 'cp .env.testing .env'
                  sh 'php artisan key:generate'
                  sh 'php artisan migrate --seed'
              }
          }
        stage('Install php packages') {
              steps {
                  sh 'composer install'
              }
        }
        stage('Test') {
               steps {
                   sh 'php artisan test'
               }
        }
      }

}
