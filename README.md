# dSign
Final Project for EC552

dSign is locally run software for designing an encrypted DNA signature. The software allows for secure sharing and allows you to place your signature in any sequence you input. The software is designed with the intention of being open source and of accessing a remote database. However, due to the developers' limited resources we currently are not hosting a remote database. So, utilize dSign's features follow to Installation Instructions to run the software locally.

Installation Instructions:

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



5 Navigate to: http://localhost/dSign/


