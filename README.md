#Codebase

A place to put code

[Live Example](http://youoh.me/codebase)

##Requirements

 - PHP 5.3+
 - SQLite with the PDO module loaded ( may switch to SQLite3 library in the future )

## Features

- Lightweight
- Data stored in an SQLite database for easy portability
- Optional authentication system using HTTP authentication
- Tagging system that allows for multiple tags and eventually negated tags
- Full search capabilities using like. Full-text on the todo list.
- Language specific Syntax highlighting
- Preview and live editing of markdown documents
- Full API
- Ability to lock a piece of code with a system-wide password, code cannot be deleted until it's unlocked with the password
- Ability to star code (Stars currently do nothing)

##Ideas

- Look into switching to [SQLite3](http://de2.php.net/manual/en/book.sqlite3.php) instead of PDO
- Write dump code that flattens the database into an sql file
- Create simple plugin system
- Integrate plugin with code APIs (jsfiddle, pastebin, gist, etc.)
- Look at [BrowserId](https://login.persona.org/) for authentication
- Link code together - It will be displayed on the same page
- Guest username/password with no editing capabilites
- Views/Edits count for code
- Should starting an edit lock the code