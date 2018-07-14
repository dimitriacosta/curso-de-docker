#!/usr/bin/env groovy

node('master') {
    stage('build') {
        git url: 'git@github.com:dimitriacosta/curso-de-docker.git'

        sh "./develop start"

        sh "./develop composer install"

        sh 'cp .env.example .env'
        sh './develop art key:generate'
    }
    stage('test') {
        sh "APP_ENV=testing ./develop test"
    }
    stage('cleanup') {
        sh "./develop stop"
    }
}
