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

##Using a context for conditional code

First example  

```php
$context = 'day';
if($context == 'night'){
  echo "Talk quietly.";
} else {
  echo "Talk normally.";
}
```

Second example  

```php
if($context == 'header'){
  //Add margin on bottom
} elseif ($context == 'footer'){
  //Add margin on top
} else{
  //Add no margin
}
```

We can have associative array that contains all context.

```php
function find_it($options=array()){
  if($options['visible']){

  }
}

$opts = array('visible' => false, 'order' => 'ascending');
find_it($opts);

```

##User Authentication
- Admin creates a user in the database
  * password is encrypted before user is stored
- User logs in via a login form
- Application authenticates user
  * Searches for username in database
  * **If username found**: encrypts form password and compares with encrypted stored password
  * **If password matches**: sets a variable in the session to the user ID, and redirects to a post-login page
- User requests additional password-protected pages
  * Cookies and session data are available with each request
- Application checks the session data for the user ID
  * **If present**: returns the requested page
  * **If absent**: redirects to the login form
- User logs out
  * Set user ID stored in session variable to NULL

##Security
- **Never** store passwords in plain text
- One-way encryption
- Hashing algorithms suitable for passwords
  * MD5 (Security Flaw)
  * SHA-1
  * SHA-2 (SHA-256, SHA-512)
  * Whirlpool, Tiger, AES
  * Blowfish
    - High-level of security
    - Public domain, no patents, free to use
    - Included with PHP
    - Slow (in order to prevent Hacker's brutal force)
- Salt
  * Additional data added to the password before encryption
  * Knowing password requires also knowing the salt string
  * Rainbow tables could be used, but they would be almost impossibly large
  * Unique Salt (Create salt using strings unique to each user)
  * Random Salt (Create salt using pseudo-random string)

_Example_

```php
  $password = "secret";
  $hash_format = "$2y$10$"; //'2y' means Blowfish, '10' means how many time hash data.
  $salt = "Salt22CharactersOrMore";
  $format_and_salt = $hash_format . $salt;

  $hash = crypt($password,$format_and_salt);
```

```php
  $hash2 = crypt($userInput, $hash);
```
