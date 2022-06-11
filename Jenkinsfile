pipeline {
    agent {
        dockerfile {
            filename 'Dockerfile'
        }
     }
   stages {
            stage('Prepare package installation using composer') {
                 steps {
                     sh 'php -v'
                     sh 'pwd'
                     sh 'ls -la'
                     sh 'cp .env.testing .env'
                     sh 'touch database/database.sqlite'
                 }
             }
            stage('Install packages') {
                   steps {
                       sh 'rm composer.lock'
                       sh 'composer install'
                   }
             }
            stage('Database seeding') {
                  steps {
                      sh 'php artisan key:generate'
                      sh 'php artisan migrate --seed'
                  }
              }
            stage('Test (Features)') {
                   steps {
                       sh 'php artisan test'
                   }
            }
            stage("Static code analysis phpcs") {
                     steps {
                         sh "vendor/bin/phpcs"
                     }
             }
      }

}
