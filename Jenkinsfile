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

        // Add other stages as needed

        stage("Dockerized Laravel") {
            steps {
                script {
                    // Docker build and push commands
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
                    sh 'docker run --name mylapp -p 8000:8000 -d localhost:5000/xhartono/lapp'
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
