// cypress/e2e/formulario_beneficiarios.cy.js
describe('Formulario de Beneficiarios', () => {
  it('Envía el formulario con datos válidos', () => {
    cy.visit('http://localhost/WebAbrigaalCampoV2/beneficiarios.html') // Cambia por tu ruta real

    cy.get('input[name="nombres"]').type('Carlos')
    cy.get('input[name="apellidos"]').type('Martínez')
    cy.get('input[name="documento_identidad"]').type('12345678')
    cy.get('input[name="edad"]').type('45')
    cy.get('input[name="pais"]').type('Colombia')
    cy.get('input[name="ciudad"]').type('Bogotá')
    cy.get('input[name="direccion"]').type('Calle 123 #45-67')
    cy.get('input[name="telefono"]').type('3001234567')
    cy.get('input[name="correo_electronico"]').type('carlos@example.com')
    cy.get('textarea[name="descripcion"]').type('Necesito materiales para construcción básica.')

    cy.get('input[name="acepta_tratamiento_datos"]').check()

    // Enviamos el formulario
    cy.get('form').submit()

    })
})

