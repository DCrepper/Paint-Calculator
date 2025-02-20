Cypress.Commands.add('login', (email, password) => {
  cy.visit('/login')
  cy.get('input[name=email]').type(email)
  cy.get('input[name=password]').type(password)
  cy.get('button[type=submit]').click()
})

Cypress.Commands.add('logout', () => {
  cy.get('button[aria-label=logout]').click()
})

Cypress.Commands.add('register', (name, email, password) => {
  cy.visit('/register')
  cy.get('input[name=name]').type(name)
  cy.get('input[name=email]').type(email)
  cy.get('input[name=password]').type(password)
  cy.get('input[name=password_confirmation]').type(password)
  cy.get('button[type=submit]').click()
})
