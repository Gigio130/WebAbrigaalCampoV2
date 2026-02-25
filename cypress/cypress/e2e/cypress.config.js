const { defineConfig } = require('cypress')

module.exports = defineConfig({
  e2e: {
    // Aquí definimos la ruta correcta donde están las pruebas
    specPattern: 'cypress/e2e/**/*.cy.js',
    baseUrl: 'http://localhost/WebAbrigaalCampoV2', // Opcional, si quieres evitar repetir URLs
  }
})
