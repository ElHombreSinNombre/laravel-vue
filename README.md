## Guide

Install **[Node](https://nodejs.org/es/)**, **[PHP](https://www.php.net/downloads)**, **[Composer](https://getcomposer.org/)** and **[Docker Desktop](https://docker.com/products/docker-desktop/).**

Open **Docker Desktop**, then with CMD launch this commands

    cd docker
    docker-compose up -d

In *laravelVue* folder we must to copy-paste *env.example* and rename new file as *.env*. In this file we must to set your database connections.

Default connection in *.env* file for this project.

    DB_CONNECTION=mysql
    DB_HOST=mariadb
    DB_PORT=3306
    DB_DATABASE=laravelvue
    DB_USERNAME=root
    DB_PASSWORD=secret

Don´t forget to set **MailTrap** credentials.

With CMD launch this commands

    cd laravelVue
    composer install
    npm install
    php artisan key:generate

After all we can edit *etc/host* file to use a domain name.

![Host](resources/host.jpg)

We can access to the web in localhost (127.0.0.1) or in laravelvue.com.

### Frontend
- [Vue (JS)](https://vuejs.org/).
    - Added packages
        - [SweetAlert2 for Vue](https://www.npmjs.com/package/vue-sweetalert2).
        - [Vue Select](https://vue-select.org/).
- [Tailwind (CSS)](https://tailwindcss.com/). 
- [Font Awesome](https://www.npmjs.com/package/@fortawesome/fontawesome-free).

    To compile CSS (with [PostCSS](https://postcss.org/)) and JS for environments launch this command 

      npm run dev 

    or 
      
      npm run prod 

    We can use this command to compile all changes in *real time* for development.

      npm run watch

### Backend
- [Laravel (PHP)](https://laravel.com/).
    - Added packages
        - [Laravel Collective HTML](https://laravelcollective.com/docs/6.x/html)
        - [Laraveles Spanish](https://github.com/Laraveles/spanish)
        - [Pelmered Fake Car](https://github.com/pelmered/fake-car)
        - [Barryvdh Debugbar](https://github.com/barryvdh/laravel-debugbar)
    - Check if *laravelvue* database is created. Else create it. **PHPMyAdmin** docker is in http://localhost:8000
    - Launch

        php artisan migrate:fresh --seed  

    If return a error when launch migrations change *mariadb* to *localhost* in *laravelVue .env* file. Some scripts must be to launch in docker container, if we prefer we can use this little trick to launch it from outside of docker. Then return file to original state.
 
    - Default credentials if we need to enter in **PHPMyadmin** 

          User: root
          Password: secret

### Other Tools

- [Postman](https://www.postman.com/).
    - Check it *postman* folder *environments.json*. There are some environments values. Change *url_base* (*www* docker container IP) or *url_domain* (if we configure it in *etc/host*) value if it necessary.  
    - Launch this command

           npm install newman
           npm install newman-reporter-htmlextra
           cd postman
           newman run collection.json -e environments.json -r cli,htmlextra

## Other considerations

### Email

- A email system (with **[MailTrap](https://mailtrap.io/)**) send email when car is deleted from datatable. Email is sent to a user related to this car.

  A user can drive one car, a car could driven by one user.

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

