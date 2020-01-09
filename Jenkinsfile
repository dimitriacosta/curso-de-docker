#!/usr/bin/env groovy

node('master') {
    try {
        stage('build') {
            git url: 'git@github.com:dimitriacosta/curso-de-docker.git'

            /* Start containers */
            sh "./develop start"

            /* Install composer dependencies */
            sh "./develop composer install"

            /* Copy .env file for testing */
            sh 'cp /var/lib/jenkins/persistent/.env.testing .env.testing'
            sh './develop art --env=testing key:generate'
        }
        stage('test') {
            /* Run tests */
            sh "./develop test"
        }
        if (env.BRANCH_NAME == 'master') {
            stage('package') {
                /* Build docker image for production */
                sh "echo 'build image'"
                /* sh "docker/build" */
            }
        }
    }
    catch(Exception e) {
        /* Manage errors */
        throw e
    }
    finally {
        /* Stop containers */
        sh "./develop down -v"
    }
}
