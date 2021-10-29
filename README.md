## Stack

A email system (with **[MailTrap](https://mailtrap.io/)**) send email when car is deleted from datatable. Email is sent to all user related to this car

- **Vue (JS)**. Frontend.
- **Tailwind (CSS)**. Frontend. 
    - Execute *npm install*.
    - Execute *npm run dev* or *npm run prod* to compile css (with **PostCSS**) and js.

        - **PostCSS** is used with this plugins
            - tailwindcss
            - autoprefixer
            - postcss-import
            - precss
            - postcss-pxtorem

- **Laravel (PHP)**. Backend.
    - Create *laravelvue* database.
    - Check database connection in *.env* file.
    - Execute

           php artisan migrate
           php artisan db:seed
           
- **Docker**.
    - [Install Docker Compose](https://docs.docker.com/compose/install/)
- **Postman**.
    - Check endpoints with **Newman**.


tailwindcss
autoprefixer
postcss-import
precss
postcss-pxtorem

Precss agrupa estos otros plugins.

postcss-extend-rule
postcss-advanced-variables
postcss-preset-env
postcss-atroot
postcss-property-lookup
postcss-nested