#!/usr/bin/env groovy

node('master') {
    stage('build') {
        git url: 'git@github.com:dimitriacosta/curso-de-docker.git'

        sh "./develop start"

        sh "./develop composer install"

        sh 'cp /var/lib/jenkins/persistent/.env.testing .env.testing'
        sh './develop art key:generate'
    }
    stage('test') {
        sh "./develop test"
    }
    stage('cleanup') {
        sh "./develop stop"
    }
}
