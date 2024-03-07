pipeline {
    agent any
    stages {
        stage("Prepare Laravel") {
            steps {
                script {
                    sh 'composer update'
                    sh 'php artisan key:generate'
                    sh 'composer require laravel/dusk --dev'
                    sh 'php artisan dusk:install'
                    sh 'php artisan dusk:chrome-driver'
                }
            }
        }

        stage("Unit Test Laravel") {
            steps {
                script {
                    sh 'php artisan test'
                }
            }
        }

        stage("User Acceptance Test Laravel") {
            steps {
                script {
                    sh 'php artisan dusk'
                }
            }
        }



        // Add other stages as needed

        stage("Dockerized Laravel") {
            steps {
                script {
                    sh 'docker build -t xhartono/lapp .'
                    sh 'docker tag xhartono/lapp localhost:5000/xhartono/lapp'
                    sh 'docker push localhost:5000/xhartono/lapp'
                }
            }
        }



        stage("Deploy Laravel Application") {
            steps {
                script {
                    // remove
                    sh 'docker rm -f mylapp'
                    // Docker run command
                    sh 'docker run --name mylapp -p 8005:8000 -d localhost:5000/xhartono/lapp'
                }
            }
        }
    }

    post {
        always {
            echo "========always========"
        }
        success {
            echo "========pipeline executed successfully ========"
        }
        failure {
            echo "========pipeline execution failed========"
        }
    }
}
