## Enhancements:
- [x] Security patches (thanks dependabot) (ended up migrating).
- [ ] Secure authentication and all interactions with passwords.
- [ ] Handle user login with tokens.
- [ ] Secure the overall thing by actually requiring a user be logged in to perform all the tasks.
- [ ] Add MFA.
- [x] Improve README.md (use proper markdown syntax like in here).
- [ ] Come up with a good name.
- [x] Use appropriate HTTP methods.
- [ ] Use response codes well.
- [ ] Add error handling and logging.
- [ ] Make the install process more user friendly.
- [ ] Consider switching to gRCP or GraphQL (whichever is better suited) for real-time logs.

## Desired Features:
- [ ] Admin console.
- [ ] Make some values customisable through an admin console, such as all the urls and the door unlocking delay.
- [ ] Manage cards and access on the admin console, then simplify the ESP's work to just read card and open door (the way it should've been from the start).
- [ ] Rethink the 'user' role, only the cards need access (for now), maybe use it for admin login.
- [ ] Use groups to assign access.
- [ ] Add a usable asset to the releases instead of just code.
- [ ] Turn it all into a container (with the database).