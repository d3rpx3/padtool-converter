padtool-converter
=================

Simple script that converts PADTool data to data that can be imported to PADHerder.


IMPORTANT
---------
I'm not sure when PADH is going to begin using friend data but when it does remember to uncheck the "Update friends" box or you'll lose your PADH friends.

REQUIREMENTS
------------
A PADTool account with your friend ID configured, and the "Account" and "Monster Box" pages set to "Public".

Setup
-----
Install PHP. You don't need a webserver but if one is installed anyways, it's fine.

Download PHP for Windows here: http://windows.php.net/
Others: http://php.net/downloads.php
Most *NIX OSes: Use the appropriate package installer to install the packages php5 and php5-curl

Usage:
php converter.php [friend_id] > output.txt
