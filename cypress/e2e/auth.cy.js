describe('Authenticatie', () => {
    it('moet kunnen registreren', () => {
        const randomEmail = `test${Math.floor(Math.random() * 10000)}@example.com`
        cy.visit('/registreren')
        cy.get('[name="name"]').type(`TestUser${Math.floor(Math.random() * 10000)}`)
        cy.get('[name="email"]').type(randomEmail)
        cy.get('[name="password"]').type('password123')
        cy.get('[name="password_confirmation"]').type('password123')
        cy.get('form').submit()
        cy.url().should('include', '/inloggen')
    })

    it('moet kunnen inloggen', () => {
        cy.visit('/inloggen')
        cy.get('[name="email"]').type('test@example.com')
        cy.get('[name="password"]').type('password123')
        cy.get('form').submit()
        cy.url().should('include', '/lobbies')
    })
})
