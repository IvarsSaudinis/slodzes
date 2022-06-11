pipeline {
    agent {
        dockerfile {
            filename 'Dockerfile'
        }
     }
   stages {
            stage('jenkins file selftest') {
                 steps {
                     sh 'php -v'
                     sh 'pwd'
                     sh 'ls'
                 }
             }
        stage('DB SEED') {
              steps {
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
