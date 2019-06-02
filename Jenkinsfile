pipeline {
    agent { 
	dockerfile true
	dir 'docker'
	 }
    stages {
        stage('Test') {
            steps {
                sh 'php --version'
            }
        }
    }
}
