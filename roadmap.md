## Enhancements:
- [x] Security patches (thanks dependabot) (ended up migrating).
- [ ] Secure authentication and all interactions with passwords.
- [ ] Handle user login/logout with tokens.
- [ ] Secure the overall thing by actually requiring a user be logged in to perform all the tasks.
- [x] Use appropriate HTTP methods.
- [ ] Add MFA.
- [ ] Use response codes well.
- [ ] Use id for updates and deletion of items.
- [ ] Add error handling and logging.
- [ ] Improve README.md.
- [ ] Make the install process more user friendly.
- [ ] Come up with a good name.
- [ ] Consider switching to gRCP or GraphQL (whichever is better suited) for real-time logs.

## Desired Features:
- [ ] Admin console.
- [ ] Make some values customisable through an admin console, such as all the urls and the door unlocking delay.
- [ ] Manage cards and access on the admin console, then simplify the ESP's work to just read card and open door (the way it should've been from the start).
- [ ] Rethink the 'user' role, only the cards need access (for now), maybe use it for admin login.
- [ ] Use groups to assign access.
- [ ] Add a usable asset to the releases instead of just code.
- [ ] Turn it all into a container (with the database).