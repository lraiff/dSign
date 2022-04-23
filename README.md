# dSign
Final Project for EC552

dSign is locally run software for designing an encrypted DNA signature. This web-based software allows for secure sharing and allows you to place your signature in any sequence you input. The software is designed with the intention of being open source and of accessing a remote database. However, due to the developers' limited resources we currently are not hosting a remote database. So, to utilize dSign's features follow to Installation Instructions to run the software locally. And then follow the webpage Instructions to generate encrypted signatures and sequences. 

## Installation Instructions:

1. clone the reponsitory on your machine:

  git clone https://github.com/lraiff/dSign.git

2. Install XAMPP and run the Apache and SQL servers.
  Installation:  https://www.apachefriends.org/index.html
  After installation, find the xampp program file and the xampp-control application. 
  The correct servers will run if your control panel looks like this:
  <img width="500" alt="image" src="https://user-images.githubusercontent.com/89608971/163895138-d3e9d108-6780-430a-ae06-dc969bb69a9f.png">
3. Navigate to: http://localhost/phpmyadmin/index.php
   Create a database called "login" and a table called "users".
   In the table make the following columns: 
   <img width="529" alt="image" src="https://user-images.githubusercontent.com/89608971/163896284-f5345c3e-d1b5-4e9f-aaf9-65486f384f47.png">
   <img width="340" alt="image" src="https://user-images.githubusercontent.com/89608971/163896310-c63bd2e9-5163-4623-a4e1-6cf1c9658d14.png">
  <img width="349" alt="image" src="https://user-images.githubusercontent.com/89608971/163896329-569dbd83-5536-4a63-92b7-25d3dac57806.png">
4. Copy all the files in the cloned repo and place them a newly created folder with the path: ~/xampp/htdocs/dSign
<br>

5. Navigate to: http://localhost/dSign/

*** If the installation doesn't work make sure you have python installed on your laptop and that you have the following modules installed***<br>
Necessary python modules:<br>
  Use pip to install the following libraries:<br>
  json<br>
  numpy<br>
  base64<br>
  cryptography<br>
  Fernet<br>
  hashes<br>
  PBKDF2HMAC<br>
  wrap

## Using the Webpage Software

1. Register as a user on the software - username can be anything but password must be 10 any characters long. (E.g. @rTW1nR56g or RTerTFWoOP)


## Contributions

Aurelia Leona - Encryption (Back-end)
Laura Raiff - Database and linking web-pages (Back-end and Front-end)
Sally Shin - Webpage design (front-end)
Zenia Valdiviezo - Primer information output, Presentation, Demo, Report leader

### YouTube Demo link


