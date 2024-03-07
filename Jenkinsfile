pipeline {
    agent any
    stages {

        
        stage("Prepare Laravel") {
            steps {
                script {
                    sh 'composer update'
                    sh 'php artisan key:generate'
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
                    // Docker run command
                    sh 'docker run -p 8005:8000 -d localhost:5000/xhartono/lapp'
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
