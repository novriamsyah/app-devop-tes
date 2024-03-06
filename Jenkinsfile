pipeline{
    agent any
    stages{
         stage("Prepare Laravel"){
            steps{
                composer update
            }
        }
        stage("Prepare Laravel"){
            steps{
                php artisan key:generate
            }
        }
        stage("Laravel Test"){
            steps{
                php artisan test
            }
        }
        stage("Dockerized Laravel"){
            steps{
                docker build -t xhartono/lapp
                docker tag xhartono/app localhost:5000/xhartono/lapp
                docker push localhost:5000/xhartono/lapp
            }
        }
        stage("Deploy Laravel Application"){
            steps{
                docker run --name mylapp -p 8000:8000 -d localhost:5000/xhartono/lapp
            }
        }
    }
    post{
        always{
            echo "========always========"
        }
        success{
            echo "========pipeline executed successfully ========"
        }
        failure{
            echo "========pipeline execution failed========"
        }
    }
}