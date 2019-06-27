pipeline {
    agent { 
	dockerfile {dir 'docker'}
	 }
    stages {
        stage('Test') {
            steps {
                bat 'php --version'
            }
        }
    }
}
