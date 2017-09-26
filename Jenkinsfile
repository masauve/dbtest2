node('maven') {
  stage 'buildInDevelopment'
  openshiftBuild(namespace: 'db-dev', buildConfig: 'myapp', showBuildLogs: 'true')
}

node {
  stage 'deployInDevelopment'
  openshiftDeploy(namespace: 'db-dev', deploymentConfig: 'myapp')
  openshiftScale(namespace: 'db-dev', deploymentConfig: 'myapp',replicaCount: '2')
}

node {
  stage 'test'
  try {
    sh "curl -s --head --request GET http://myapp-db-dev.apps.ose3sandbox.com/ | grep '200 OK'"
    return true
  } catch (Exception e) {
    return false
  }
}

node {
  stage 'Deploy Live'
  input 'Promote the Dev image to Live?'
}

node {
  stage 'deployInTesting'
  openshiftTag(namespace: 'db-dev', sourceStream: 'myapp',  sourceTag: 'latest', destinationNamespace: 'db-dev',  destinationStream: 'myapp', destinationTag: 'promoteToQA')
  openshiftDeploy(namespace: 'db-qa', deploymentConfig: 'myapp')
  openshiftScale(namespace: 'db-qa', deploymentConfig: 'myapp',replicaCount: '3')
}
