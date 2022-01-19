![img](https://i.pinimg.com/originals/b6/aa/45/b6aa456d67464a2f6a1f19d3a3efbd2d.gif)

# WUNDERLIST ✨

Text about the project and why it exists. This would also be a great place to link the project online.

Make a task list and check of tasks that are done.

# Installation 💖

Download and use:

```PHP -S localhost:133```

# Code Review 📀

Code review written by [Amanda Hulten](https://github.com/amandahulten).

1. `overall` - I am not able to log in, page reloads but nothing happens.
2. `list.php` - When creating a task (since the form are displayed even if a user is not logged in), I get this error message: 
`it went through 💖
Fatal error: Uncaught PDOException: SQLSTATE[23000]: Integrity constraint violation: 19 NOT NULL constraint failed: lists.user_id in /Users/amandahulten/Library/Mobile Documents/com~apple~CloudDocs/Untitled/app/posts/store.php:34 Stack trace: #0 /Users/amandahulten/Library/Mobile Documents/com~apple~CloudDocs/Untitled/app/posts/store.php(34): PDOStatement->execute() #1 {main} thrown in /Users/amandahulten/Library/Mobile Documents/com~apple~CloudDocs/Untitled/app/posts/store.php on line 34.`

3. `store.php` - Consider dividing your task and list queries into different files for better readaility.
4. `img` - A good practise is to have your img folder in the root of your project. You could also move it to .gitignore.
5. `app/` - Remember to check the users input with if statements, for example if the field is empty.
6. `app/` - You could have more error and success-messages to make the users experience better.
7. `functions.php` - I would recommend you to make a function to see if the user is logged in or not so you can hide the list and task forms when outlogged. 
8. `overall` - Remember to use htmlspecialchars on your strings.
9. `list.php: 6-9` - I would recommend you to write these statements in a function instead of at the top of the page, to get more DRY code.
10. `example.js:10-15` - You shouldn't use echo in your php if-statements, it would be better to make a error/success function to call on.

# Testers ⭐️

Tested by the following people:

1. Jane Doe
2. John Doe
