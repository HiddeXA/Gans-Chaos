import { defineConfig } from "cypress";

export default defineConfig({
  e2e: {
      baseUrl: 'http://gans-en-chaos.test',
      supportFile: false,
      specPattern: 'cypress/e2e/**/*.cy.{js,jsx,ts,tsx}',
      setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
    chromeWebSecurity: false,
    experimentalSessionAndOrigin: true
});
