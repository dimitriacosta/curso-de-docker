#!/usr/bin/env groovy

node('master') {
    try {
        stage('build') {
            git url: 'git@github.com:dimitriacosta/curso-de-docker.git'

            // iniciar contenedores
            sh "./develop start"

            // instalar dependencias con composer
            sh "./develop composer install"

            // copiar archivo .env para pruebas
            sh 'cp /var/lib/jenkins/persistent/.env.testing .env.testing'
            // sh './develop art key:generate'
        }
        stage('test') {
            // ejecutar pruebas
            sh "./develop test"
        }
        if (env.BRANCH_NAME == 'master') {
            stage('package') {
                // construir imagen de docker para producción
                sh "echo 'build image'"
                // sh "docker/build"
            }
        }
    }
    catch(Exception e) {
        // administrar errores
        throw e
    }
    finally {
        // detener contenedores
        sh "./develop stop"
    }
}
