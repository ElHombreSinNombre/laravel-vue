## Guide

Docker already has **[Node](https://nodejs.org/es/)**, **[Composer](https://getcomposer.org/)** and all necessary dependencies. If you prefer avoid it, you must install manually.

- **[Vue (JS)](https://vuejs.org/)**. Frontend.
    - Install [SweetAlert2 for Vue](https://www.npmjs.com/package/vue-sweetalert2)
- **[Tailwind (CSS)](https://tailwindcss.com/)**. Frontend. 

    - Install [FontAwesome](https://www.npmjs.com/package/@fortawesome/fontawesome-free)
    - To compile css (with **[PostCSS](https://postcss.org/)**) and js Launch this command 
    
          npm run dev | npm run prod 

        - Install this **PostCSS** plugins
            - [tailwindcss](https://tailwindcss.com/docs/guides/laravel) 
            - autoprefixer. *npm i autoprefixer*.
            - postcss-import. *npm i postcss-import*.
            - precss. *npm i precss*. Includes all these plugins:
                - postcss-extend-rule
                - postcss-advanced-variables
                - postcss-preset-env
                - postcss-atroot
                - postcss-property-lookup
                - postcss-nested
            - postcss-pxtorem. *npm i postcss-pxtorem*.


- **[Laravel (PHP)](https://laravel.com/)**. Backend.
    - Create *laravelvue* database.
    - Check database connection in *.env* file.
    - Launch

           php artisan migrate
           php artisan db:seed
    - Install [Laravel Collective](https://laravelcollective.com/docs/6.x/html).
    - Install [Debugbar](https://github.com/barryvdh/laravel-debugbar).
           
- **[Docker](https://www.docker.com/)**.
    - [Install Docker Compose](https://docs.docker.com/compose/install/)

    -  Launch this command

           cd docker

    - Launch this command.

           docker-compose up -h

- **[Postman](https://www.postman.com/)**.
    - Launch this command

           newman run XXX

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

