In this project we have decided to create a blog webpage. 

Our blog is fully responsive for desktop, tablets and mobile phones. 

![Capture](https://user-images.githubusercontent.com/88925964/219240256-44c8d2ff-97bc-4e3a-941d-68b1161a5ae2.PNG)
![a](https://user-images.githubusercontent.com/88925964/219240611-f4647392-de6a-4226-bb39-bb547159dfb8.PNG)
![b](https://user-images.githubusercontent.com/88925964/219240962-7ecf4786-47c9-4f2a-af22-37057d9ad58e.PNG)

For the frontend we have used html, css and javascript. For the backend part we havre created a rest api which we communicate with the endpoints 
using fetch. For the database we have used MySql. Also with the rest api we have used object oriented php to construct different classes that we use later on. (If you want to see only the frontend part you can check https://github.com/EnrisKumi/Blog_Frontend)

Our blog has a fully functioning and secure signup and login where the passwords inour database are saved as hashed passwords. 

We have also implemented user authorization where we have different views for seperate roles.

The admin view:
![c](https://user-images.githubusercontent.com/88925964/219243228-fb3e5cc8-8b1b-4651-973d-73b73803977a.PNG)

The normal user view:
![d](https://user-images.githubusercontent.com/88925964/219243636-1e570345-3c7a-4c1a-bbaa-45af78e527f5.PNG)

The admin has the premission to perform all the crud operations for creating users, categories or posts.
Also only the admin can create a new admin for the blog.


How to run:
1. Install XAMPP (or any other similar server package) on your machine.
2. Clone this repository into your 'htdocs' directly in the XAMPP application.
3. Create a new database in MySQL and inport the provided database from the SQL folder.
4. Open the project in your web browser by navigating to http://localhost/blog/.

