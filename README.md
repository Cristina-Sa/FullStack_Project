# FullStack_Project

In this repository an application will be created using PHP and MySQL database that allows the registration of new users through a form, with the appropriate validations, and once registered, the information of the users currently registered in the database can be consulted.

This application has two parts: 

1. The file ['USUARIOS.sql'](https://github.com/Cristina-Sa/FullStack_Project/blob/main/USUARIOS.sql) where the database is located
2. The remaining files in which is located the code necessary to run the application.

The application have different parts:

1. First part: **The registration form**

   - [index.html](https://github.com/Cristina-Sa/FullStack_Project/blob/main/index.html): HTML document with the content of the registration form.
   - [style.css](https://github.com/Cristina-Sa/FullStack_Project/blob/main/style.css): Cascading Style Sheet document that styles HTML documents and user input based on the validation result.
   - [index.js](https://github.com/Cristina-Sa/FullStack_Project/blob/main/index.js): JavaScript document that executes the validation functions of the user's entries at client level.
   - [imagenes](https://github.com/Cristina-Sa/FullStack_Project/blob/main/imagenes): Directory containing the images (icons) for the graphic decoration resulting from the validation of the entries.
   - [RegistrationForm.php](https://github.com/Cristina-Sa/FullStack_Project/blob/main/RegistrationForm.php): PHP document containing the code necessary for the database connection. It performs the following tasks:
     - Collects the form data
     - Performs a validation of the entries redundantly to the client side.
     - Attempts to make the connection to the DDBB.
     - If the connection is successful, it checks if the requested email has already been registered, if so, it cancels the registration.
         - If the requested email does not exist, it registers the new user in the DDBB table 'USUARIO' and displays the content of the file [getUsers.html](https://github.com/Cristina-Sa/FullStack_Project/blob/main/getUsers.html).
         - If the requested email already exits in the DDBB, it displays an alert and sends to [index2.html](https://github.com/Cristina-Sa/FullStack_Project/blob/main/index2.html) which is a page almost as the registration form but adding the possibility of consulting the data of the registered users.
         - If there are any errors in the connection, it displays the error and come back to the registration form.
      
2. Second part: **After a successful registration**

   - [getUsers.html](https://github.com/Cristina-Sa/FullStack_Project/blob/main/getUsers.html): HTML document that is displayed inside subscribe.php when the registration is successful, and enables 2 option:
      - Come back to the registration form in order to register another user.
      - Consulting the data of the registered users.
   - [getUsers.php](https://github.com/Cristina-Sa/FullStack_Project/blob/main/getUsers.php): PHP document that collects the data of the users registered in the application (except the password, for security reasons) and displays them in table format.

------
* Extra files:

  - [dataConfig.php](https://github.com/Cristina-Sa/FullStack_Project/blob/main/dataConfig.php): PHP document that contains the needed info to connect to the DDBB.
  - [functions.php](https://github.com/Cristina-Sa/FullStack_Project/blob/main/functions.php): PHP document that collects some useful functions.
 
------
Application screenshots:

![RegistrationForm](https://github.com/Cristina-Sa/FullStack_Project/blob/main/imagenes/RegistrationForm%20Visualization.png)
![ShowDDBB](https://github.com/Cristina-Sa/FullStack_Project/blob/main/imagenes/ShowDDBB.png)

 




