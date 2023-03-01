###################
What is G-Track
###################

The purpose of the G-Track is to keep track of the user's expenses. Its purpose is to help the user's budget 
and allocate their money. It will help its user's to determine their important necessities so that they 
prioritize it before their other expenses. Because not everyone can manage to budget and allocate their money.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit https://github.com/0IUwUL/G-Track.git

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

To run this application, it is important to install XAMPP to host a local
web server to see the output of this system. In the installation of XAMPP,
it is imperative to check the Apache and MySQL selection. 

************
Setup
************
1. Git clone, through your preffered way, or download the repository as .zip.
2. Move the folder onto the directory of the XAMPP **xampp/htdocs**
3. Visit the XAMPP control panel and start the Apache and MySQL. 
4. Click on the admin button along the row of MySQL.
5. In the phpMyAdmin, create a database and name the database as 'expense_tracker'
6. Import the sql file in the database folder found in this system folder. 
7. Return to XAMPP control panel and click *start* on Apache and MySQL.
8. Now open a web browser and visit 'localhost/G-Track/'