pipeline {
    agent {
        dockerfile {
            filename 'Dockerfile'
        }
     }
   stages {
        stage('DB SEED') {
              steps {
                  sh 'artisan key:generate'
                  sh 'artisan migrate --seed'
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
