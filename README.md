## Guide

Install **[Node](https://nodejs.org/es/)**, **[Composer](https://getcomposer.org/)** and **[Docker Compose](https://docs.docker.com/compose/install/).**

### Frontend
- [Vue (JS)](https://vuejs.org/).
    - [SweetAlert2 for Vue](https://www.npmjs.com/package/vue-sweetalert2).
    - [Vue Select](https://vue-select.org/).
- [Tailwind (CSS)](https://tailwindcss.com/). 
- [FontAwesome](https://www.npmjs.com/package/@fortawesome/fontawesome-free).

    To compile css (with [PostCSS](https://postcss.org/)) and js launch this command 

      npm run dev | npm run prod 

### Backend
- [Laravel (PHP)](https://laravel.com/).
    - Create *laravelvue* database.
    - Check database connection in *.env* file.
    - Launch

            php artisan migrate
            php artisan db:seed

### Other Tools
           
- [Docker](https://www.docker.com/).

    -  Launch this command

           cd docker
           docker-compose up -h

- [Postman](https://www.postman.com/).
    - Launch this command

          docker ps
          docker exec -it "XXX" bash

    - Inside the *docker* launch

          newman run COLLECTION -r -e ENVIRONMENT htmlextra


## Other considerations

### Email

- A email system (with **[MailTrap](https://mailtrap.io/)**) send email when car is deleted from datatable. Email is sent to all user related to this car.

  A user can drive any car, a car could driven by many user, **dni <-> license** relationship.

  ![email](resources/email.jpg)

### Credentials

- Admin user

    - Name: **Admin**
    - Password: **test** 

- Reviewer user

    - Name: **Reviewer**
    - Passwod: **test**

### Vue and Blade

- To avoid excessive complexity we use Vue only in the forms and tables views.

### Database

![DDBB](resources/DDBB.jpg)

