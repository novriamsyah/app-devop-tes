pipeline{
    agent any
    stages{
        stage("stage1"){
            steps{
                echo "========stageing github start ========"
            }
            
        }
        stage("stage2"){
            steps{
                echo "========executing 2========"
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