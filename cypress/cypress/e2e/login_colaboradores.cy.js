describe('Login de Colaboradores', () => {
  it('Permite iniciar sesión con credenciales válidas', () => {
    cy.visit('http://localhost/WebAbrigaalCampoV2/colaboradores.html')

    cy.get('input[name="usuario"]').type('admin1')
    cy.get('input[name="contrasena"]').type('admin123')

    cy.get('form[action="procesar_login.php"]').submit()

    cy.url({ timeout: 5000 }).should('include', '/dashboard.php')
    cy.contains('Bienvenido, admin1').should('be.visible')
  })
})

