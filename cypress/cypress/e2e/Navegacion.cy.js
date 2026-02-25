describe('Navegación por los menús principales', () => {
  beforeEach(() => {
    cy.visit('http://localhost/WebAbrigaalCampoV2/index.html')
  })

  it('Navega a Beneficiarios', () => {
    cy.contains('Beneficiarios').click()
    cy.url().should('include', '/beneficiarios.html')
    cy.contains('Formulario Beneficiarios').should('be.visible')
  })

  it('Navega a Colaboradores', () => {
    cy.contains('Colaboradores').click()
    cy.url().should('include', '/colaboradores.html')
    cy.contains('Usuario').should('be.visible') // o algún texto de esa página
  })

  it('Navega a Donantes', () => {
    cy.contains('Donantes').click()
    cy.url().should('include', '/donantes.html')
  })

  it('Navega a Contacto', () => {
    cy.contains('Contacto').click()
    cy.url().should('include', '/contacto.html')
  })

  it('Regresa al Inicio', () => {
    cy.contains('Inicio').click()
    cy.url().should('include', '/index.html')
  })
})
