
describe('Lobby Functionaliteit', () => {
    beforeEach(() => {
        cy.visit('/inloggen')
        cy.get('[name="email"]').type('test@example.com')
        cy.get('[name="password"]').type('password123')
        cy.get('form').submit()
        cy.wait(1000)

    })

    it('moet naar de lobby selectie pagina navigeren', () => {
        cy.visit('/')
        cy.url().should('include', '/lobbies')
    })

    it('moet een lijst van beschikbare lobbies tonen', () => {
        cy.visit('/lobbies')
        cy.get('[data-cy="lobby-list"]').should('exist')
    })

    it('moet een nieuwe lobby kunnen aanmaken', () => {
        cy.visit('/lobbies')
        cy.get('[data-cy="create-lobby-button"]').click()
        cy.url().should('include', '/lobby/joined')
    })

    describe('Binnen een Lobby', () => {
        beforeEach(() => {
            cy.visit('/lobby/create')
        })

        it('moet naar het spel redirecten wanneer alle spelers ready zijn', () => {
            cy.get('[data-cy="ready-button"]').click()
        })
    })
})
