#!/usr/bin/env groovy

node('master') {
    stage('build') {
        git url: 'git@github.com:dimitriacosta/curso-de-docker.git'

        sh "./develop up -d"

        sh "./develop composer install"

        sh 'cp .env.example .env'
        sh './develop art key:generate'
        sh 'sed -i "s/REDIS_HOST=.*/REDIS_HOST=redis/" .env'
        sh 'sed -i "s/CACHE_DRIVER=.*/CACHE_DRIVER=redis/" .env'
        sh 'sed -i "s/SESSION_DRIVER=.*/SESSION_DRIVER=redis/" .env'
    }
    stage('test') {
        sh "APP_ENV=testing ./develop test"
    }
}
