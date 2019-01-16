# PHP_Piscine
Learn web development in this mini piscine.

### Day 00 (HTML/CSS)
Completed 5/6 Exercises

### Day 01 (Intro to PHP)
Completed 12/14 Exercises (The 2nd ssap is not right, but o-well). Might only
get credit of 9/14. For 2nd do_op. I had to take consideration of negative value
case like "4 - -3" and my program doesn't. So it is incorrect implementation.
Also, when I test the files for special characters like # and * will break the
terminal commands, so be sure to use backslash # or backslash * instead.

### Day 02 (Harder PHP)
Did 1/6 Exercises, the 2nd exercise has a wrong output on PDF. I'm gonna skip
the day and move on to day 03. Gonna take a lost here b/c it will take a while
to do this day and I don't understand much.

### Day 03 (myphpAdmin, MAMP)
Did 6/7 Exercises, the 1st exercise tells us to use PAMP tool from 42, but it is
outdated, so I used MAMP instead. Basically, I opened up MAMP and set root directory
to where my exercises are. There I can access them on the browser using local host
and port. I need the files run on the browser before using curl to call on my terminal.

### Day 04 (MAMP HTML/PHP Integration, Login/AUTH/etc)
Did 4/5 Exercises, all focused on login, modify passwords, and the like.

### RUSH00 (Ecommerce Website)
Did the ecommerce website of Pokemon Plushies. Took a very long time during the past two
days because it was supposed to be from scratch. I used Udemy tutorial to make this. There are
quite a few bugs around like not being able to change multiply quantities of plushies. Or that
if you got to certain pages, the add to cart button won't work. I know that these bugs are fixable
over time, but this is only a 2 day project. It was mad fun, and I got in less than 2 hours
of sleep yesterday, but was worth the fun. I turned in a mySQL dump file and a install.php file that
both initialize the database. In case one doesn't work, I got the other.

### Day 05 (SQL Database)
Did 21/21 Exercises, they are simple and short, but there could be errors. We'll see.\
To use MAMP SQL without downloading, go to MAMP applications folder so that whenever I type mysql on terminal,
it automatically goes to "PATH=/Applications/MAMP/Library/bin:$PATH". Put this path in my .zshrc file.
If I have password and username access, then run: "mysql -uroot -proot" to get to mysql shell.
On the shell, use code word like: 'use' to use which database, 'show' on tables, databases to show them on the
sql terminal. I can use 'source PATH', where path is the location of my sql file, to run my sql files from
another location. Else, just cat the file contents and paste directly into the sql terminal.
Also, use the resource 'base-student.sql' in the beginning so that you have all the necessary tables for all the
later exercises. Do this by running it with source 'PATH'.\
http://g2pc1.bu.edu/~qzpeng/manual/MySQL%20Commands.htm  <--sql cheatsheet
