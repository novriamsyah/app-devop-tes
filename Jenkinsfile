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

        stage("User Acceptance Test Laravel") {
            steps {
                script {
                    sh 'docker run --name mylapp1_uat -p 8000:8000 -d --rm localhost:5000/xhartono/lapp'
                    sh 'php artisan dusk'
                }
            }
            post{
                always{
                    echo "====++++always++++===="
                    sh 'docker stop mylapp1_uat'
                }
                success{
                    echo "====++++only when successful++++===="
                }
                failure{
                    echo "====++++only when failed++++===="
                }
            }
        }

        stage("Deploy Laravel Application") {
            steps {
                script {
                    //Delete or remove 
                    sh 'docker rm -f mylapp_ops'
                    // Docker run command
                    sh 'docker run --name mylapp_ops -p 8080:8000 -d localhost:5000/xhartono/lapp'
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
