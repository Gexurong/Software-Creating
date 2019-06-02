pipeline {
    agent { 
	dockerfile {dir 'docker'}
	 }
    stages {
        stage('Test') {
            steps {
                sh 'php --version'
            }
        }
    }
}
