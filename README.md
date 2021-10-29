## Guide

- **[Vue (JS)](https://vuejs.org/)**. Frontend.
- **[Tailwind (CSS)](https://tailwindcss.com/)**. Frontend. 
    - Execute 
    
           npm install

    - To compile css (with **[PostCSS](https://postcss.org/)**) and js execute this command 
    
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
    - Execute

           php artisan migrate
           php artisan db:seed
           
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

  A user can drive any car, a car could driven by many user, **license-id card** relationship.

### Credentials

- User and password

    - Admin user

        - Name: **Admin**
        - Password: **Test**

    - Reviewer user

        - Name: **Reviewer**
        - Passwod: **Test**

