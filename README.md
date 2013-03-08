#Codebase

A place to put code

[Screenshots](https://github.com/galen/Codebase#screenshots)

##Requirements

 - PHP 5.4
 - SQLite with the PDO module loaded ( may switch to SQLite3 library in the future )

## Features

- Lightweight
- Data stored in an SQLite database for easy portability
- Authentication system using HTTP authentication
- Tagging system that allows for multiple tags and eventually negated tags
- Full search capabilities using like. Full-text on the todo list.
- Language specific Syntax highlighting
- Full API
- Ability to lock a piece of code with a system-wide password, code cannot be deleted until it's unlocked with the password
- Ability to star code

##Todo

- Allow the user to change the height of the code editor
- Use Slim's URL naming feature to get URLs instead of hardcoding
- Look into switching to [SQLite3](http://de2.php.net/manual/en/book.sqlite3.php) instead of PDO
- Create modal with password characters for the lock/unlock prompt
- Change API POST to delete stars/locks to DELETE `/code/$id/star`
- Create simple plugin system
- Integrate plugin with code APIs (jsfiddle, pastebin, gist, etc.)
- Add search markdown
- **Add live preview of markdown documents**
- Look at [BrowserId](https://login.persona.org/) for authentication
- Locking should prevent editing, not just deleting
- Add cancel button to editing screen
- **Write dump code that flattens the database into an sql file**
- Add negations to tagging system
- Move config data (languages) into separate data file
- Implement full-text search instead of like
- Fix layout on mobile devices
- Fix error when you go past the total pages
- Add no results message to search results page
- Add the no code added yet message to the search page

##Ideas

- Link code together - It will be displayed on the same page
- Guest username/password with no editing capabilites
- Views/Edits count for code
- Should starting an edit lock the code
- git integration

##Screenshots

###Add New Code
![Add New Code](http://www.galengrover.com/images/codebase/new.png)

###Edit
![Edit Code](http://www.galengrover.com/images/codebase/edit.png)

###Browse
![Browse with pagination](http://www.galengrover.com/images/codebase/browse.png)

###Search Code
![Search Code](http://www.galengrover.com/images/codebase/search.png)

###View Markdown
![View Markdown](http://www.galengrover.com/images/codebase/view_markdown.png)

