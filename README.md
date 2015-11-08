# PHP
Study PHP with exercising myself

##BasicPHP
it has basic function that PHP code can use.

##projectPHP
it is fully constructed PHP code which can run pages.

##Five step of database interface
1. Create a database connection
2. Perform database query
3. Use returned data (if any)
4. Release returned data
5. Close database connection

##Content Manage System (CMS)
- public views content (read-only)
- admins edit content
  * CRUD: create, read, update delete
- project blueprint
  * Draw diagrams or type up notes
  * clarifies work ahead
  * confront problems early
  * do not clutter my brain
  * develop section-by-section

---

- PUBLIC area
  * site pages
    - navigation
    - page content
    - read only

---

- ADMIN area
  * Login Page >> Admin Menu
    - form
      * username
      * password
  * Admin Menu >> Manage content, Manage admins, Logout
    - manage content
    - manage admins
    - logout
  * Manage content
    - navigation
    - subjects CRUD
    - pages CRUD
  * Mange admins
    - admins CRUD
  * Logout
    - do logout
    - back to login

---

###Public vs. Admin
* Read only; no Create, Update, Delete
* Different appearance, different user interface
  - should be easy to see the difference
  - Admin navigation shows all pages at once
  - public navigation shows pages for selected subject
* Subject and page visibility
* Default page content for subjects

##Refactoring
It is important concepts to keep in mind.

_Revising existing code to change its structure or appearance without changing its behavior_

- simplicity
- clearity
- maintainability
- efficiency
- flexibility
  * reusability
  * extensibility

##Session
- User authentication
  * $logged_in, $user_id

- Holding data during a redirect
  * $message, $errors

- Frequently referred to data
  * $username, $account_type
