## Enhancements:
- [x] **Security:** update packages.
- [ ] **Security:** require authentication for all interactions.
- [ ] **Security:** handle user login/logout with tokens.
- [ ] **Security:** handle card reader authetication (ssh key?)
- [x] **Code quality:** use appropriate HTTP methods.
- [ ] **Security:** add MFA.
- [ ] **Code quality:** use id for updates and deletion of items.
- [ ] **Code quality:** use response codes well.
- [ ] **Code quality:** add error handling, logging and reporting.
- [ ] **Code quality:** improve naming scheme (database mainly but the rest should follow).
- [ ] **Documentation:** improve README.md.
- [ ] **User experience:** make the install process more user friendly.
- [ ] **User experience:** come up with a good name.
- [ ] **Code quality:** consider switching to gRCP or GraphQL (whichever is better suited) for real-time logs.

## Additions:
- [ ] **New feature:** admin console.
- [ ] **Code quality:** manage cards and access on the admin console, then simplify the ESP's work to just read card and open door (the way it should've been from the start).
- [ ] **User experience:** values customisable through an admin console: names, urls, delays.
- [ ] **New feature:** use groups to assign access.
- [ ] **New feature:** schedule to keep door open at specific times.
- [ ] **User experience:** add a usable asset to the releases instead of just code.
- [ ] **Code quality:** rethink the 'user' role, only the cards need access (for now), maybe use it only for admin login.
- [ ] **Code quality:** turn it all into a container (with the database).