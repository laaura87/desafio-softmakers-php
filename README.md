# SoftMakers Contatos

Contact management web system.

Challenge proposed by [SoftMakers](https://github.com/BrSoftMakers/challenge-fullstack-developer) as a criterion for the selection process.

## Technologies

- [Laravel](https://laravel.com/)
- [React](https://reactjs.org/)

Project made using [REST](https://en.wikipedia.org/wiki/Representational_state_transfer) architecture.

## Getting started

### **Server**

Create a copy of `.env.example` file in the `server` folder and name it `.env`, so fill it with the database credentials, like this

```
[...]

DB_CONNECTION=pg
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=mydatabase
DB_USERNAME=myuser
DB_PASSWORD=mypassword

[...]
```

Install the dependencies by running the following commands:

```
cd server
composer install
```

Put your application key in the `.env` or generate a new one with this command:

```
php artisan key:generate
```

Run the database migrations

```
php artisan migrate
```

Finally, run the project

```
php artisan serve
```

Development server will be running in the [http://localhost:8000](http://localhost:8000)

### **Client**

Install the dependencies running the following commands

```
cd web
yarn install
```

Finally, run the project

```
yarn start
```

Development server will be running in the [http://localhost:3000](http://localhost:3000)

To change backend url, edit `/web/src/services/api.ts`.

## Documentation

the documentation for the backend routes are in the `docs` folder, the routes are the following.

- `/contacts` - Contacts collection

## License

This project is MIT licensed.
