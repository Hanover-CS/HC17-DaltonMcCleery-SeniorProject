# hc07-Chops
Dalton McCleery Senior Project Repository

# Chops

This project is aimed at young percussion students needing an extra hand in learning the basics of rudimental drumming. In this application, students can access a host of different helpful videos, audio samples, and sheet music. From there, a student can pin a file directly to their homepage by "Favroiting" it, thus making it easier for them to access it again when they sign in. Students will also have access to a helpful library designed to keep track of all the 40 Standard Rudiments. 

## Getting Started

These instructions will you get a copy of the Chops project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the application and how to install them

	1. MySQL Database - download here: https://dev.mysql.com/downloads/workbench/
	2. A local or public server - download a WAMP local server here: http://www.wampserver.com/en/
	3. Internet Browser - download Google Chrome here: https://www.google.com/chrome/browser/desktop/index.html

### Installing

What things you need to install and a step by step series of examples of how to do so.


Step 1: download the folder 'Chops'. Make sure it has these components;

- Database Folder with setup_db.sql, dbconnect.php, and dummy_server.php.
- Login Folder with login.php, logout.php, signup.php, update_user.php, log_screen.html, signup_screen.html, and update_screen.html.
- Library Folder with library_builder.php, chops_rudiments.php, and rudiment.php.
- Functions Folder with functions.php, student_class.php, content_class.php, and add_Favorites.php.
- Templates Folder with thumbnail_audio, _video, and _etude templates, as well as a Cache subfolder.
- Tests Folder with chops_tests.php, ...
- The js, css, and bootstrap-3.3.7 folders for styling.
- And finally, not in any folder, index.php, help.php, display_favorites.php and navbar.php.

Step 2: Initialize server.

- 1. Open the file dummy_server.php in the Database folder
- 2. Input your local serverhost name, username, password, and servername.
	```
	Ex. $serverhost = "localhost"; $username = "root"; $password = "password"; $servername = "Name";
	```
- 3. Make sure that the `require dummy_server.php` line is NOT commented out and the `require parameters.php` line IS.


Step 3: Run the setup_db file.

Way 1 with MySQL workbench:

- 1. Open MySQL Workbench and create a connection to where your server is located. 
	```
	Ex. If your server is the Localhost WAMP server, set the hostname to your local IP address, leave the port as default, the username to root, and set the password to your server's password.
	```
- 2. Open a new SQL file
- 3. Import or Copy and Paste the setup_db.sql file contents into the current empty file on the Workbench.
- 4. Run the file by selecting everything and clicking the `Yellow Lighting Bolt` up near the top of the file's quickbar.

Way 2:

- 1. Open the MySQL command line.
- 2. Type the path of your mysql bin directory and press Enter.
- 3. Paste your SQL file inside the bin folder of mysql server.
- 4. Create a database in MySQL.
- 5. Use that particular database where you want to import the SQL file.
- 6. Type source databasefilename.sql and Enter.
- 7. Your SQL file upload successfully.


Step 4: Run the application.

- 1. Place the Chops folder where your server and the database can easily access it's contents.
- 2. Open the file path to /login.php in your browser.
- 3. Create or Login to your account and begin practing for your next big performance!



## Demo

- 1. Login or Create your account. (There is a default account already built in. Access this by typing `student` in the username field and `password` in the password field).
- 2. This will take you to the Homepage and your Favorites section. There isn't anything there initally, let's change that.
- 3. click on the Audio tab in the top left corner of the navigation bar.
- 4. Scroll down until you see an item box with the title: "Beatles Medley". Have a listen, I made it myself!
- 5. Select the Favorite button on the top left of the item box.
- 6. From here, you can go back to the Homepage and see that Audio item in your Favorites section.

## Running the tests

Examples of how to run the automated test file.

```
TODO
```


## Built With

* [Bootstrap](http://getbootstrap.com/) - The html/css/javascript framework used

## Authors

* **Dalton McCleery** - [DaltonMcc](https://github.com/DaltonMcc)

