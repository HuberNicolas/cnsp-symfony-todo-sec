# Security

The assignment was to secure a small web app. This page describes what the app does and where it is configured.

## Authentication

- Form login configured in [`security.yaml`](../todo_app/config/packages/security.yaml) (`form_login`,
  `login_path` and `check_path` both `app_login`, i.e. `/login`).
- Users are loaded from the `user` table by email (`app_user_provider`).
- Passwords are hashed with the `auto` hasher, which uses bcrypt in Symfony 5.4 (hashes start with `$2y$13$`).
- `/logout` ends the session and redirects to `/`.

## CSRF protection

- The login form sends a token created with `csrf_token('authenticate')`
  ([`login/index.html.twig`](../todo_app/templates/login/index.html.twig)); `enable_csrf: true` in
  `security.yaml` checks it. A login with a wrong token fails and returns to `/login`.
- The todo forms are Symfony forms with `csrf_protection` enabled in
  [`framework.yaml`](../todo_app/config/packages/framework.yaml), so they contain a hidden `_token` field.

## Access control

| Rule | Where |
|---|---|
| `/todo` and everything below requires `ROLE_USER` or `ROLE_ADMIN`; anonymous users are redirected to `/login` | `access_control` in [`security.yaml`](../todo_app/config/packages/security.yaml) |
| The list shows only the user's own todos; admins see all | `TodoController::index` |
| Editing a todo of another user returns 404 (not 403, so the todo's existence is not revealed); admins may edit all | `TodoController::edit` |
| New todos always belong to the logged-in user; the owner is not a form field, so it cannot be set by the client | `TodoController::new`, [`TodoType`](../todo_app/src/Form/TodoType.php) |

## Not covered

- The app runs in the Symfony `dev` environment with the profiler at `/_profiler`, which exposes request details.
- There is no HTTPS; port 443 serves plain HTTP.
- There is no rate limiting or lockout for failed logins.
- The `jabba` demo account has a weak password on purpose.
