## Laravel Vue 

**Laravel Vue** is an application designed to connect users with cars

## Technologies

- **[Node](https://nodejs.org/es/)**
- **[PHP](https://www.php.net/downloads)**
- **[Composer](https://getcomposer.org/)**
- **[Docker Desktop](https://docker.com/products/docker-desktop/)**

## How to deploy

Inside _laravel_ folder, rename  `.env.example`  to `.env`. In this file, set your database details.

```env
    DB_CONNECTION=mysql
    DB_HOST=mariadb
    DB_PORT=3306
    DB_DATABASE=laravelvue
    DB_USERNAME=root
    DB_PASSWORD=secret
```

Then run this commands:

```bash
    composer install
    npm install
    php artisan key:generate
```

Move to the _docker_ folder and run the following command in the terminal:

```bash
    docker compose up -d --build
```

> [!NOTE]
> Don’t forget to set **[Mailtrap](https://mailtrap.io/)** credentials

![email](resources/email.jpg)

### Credentials

- Admin user

    - Name: **Admin**
    - Password: **test** 

- Reviewer user

    - Name: **Reviewer**
    - Password: **test**

### Database

![DDBB](resources/DDBB.jpg)

