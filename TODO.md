# TODO

Open tasks before the repository is made public. See also [Known issues](README.md#known-issues).

## 1. Make it run

- [x] Replace `bitnami/symfony:1`, which no longer exists, with an image built from `php:8.1-cli-alpine`
- [x] Use the official `mariadb:10.3` image and load the dumps automatically on the first start
- [x] Fix creating todos (missing owner, `done` column was never set)
- [x] Show an empty due date instead of today's date
- [x] Set a new, documented password for the admin demo account
- [ ] Decide whether to keep `docs/shell_db_container.png`; the manual import it shows is no longer needed

## 2. Clean up

- [x] Move database passwords and `APP_SECRET` to a local `.env` with `.env.example`
- [x] Remove the unused Postgres compose files from the Symfony starter
- [ ] Optional: remove or fix the migrations that do not match the dumps

## 3. Documentation

- [x] README with quick start, demo accounts, configuration and known issues
- [x] `docs/security.md` and `docs/database.md`

## 4. Before publishing

- [x] Choose and add a license (MIT)
- [x] Add the project context (course, institution, semester) to the README
- [x] Credit third parties (Bootstrap, Unsplash image, AnIv-UZH)
- [x] Replace old email addresses in the git history
- [ ] Check for secrets in the files and the git history, right before publishing
