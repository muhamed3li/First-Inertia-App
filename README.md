# My First Inertia.js App

This is a Laravel application that uses the Inertia.js library for building modern, single-page applications with Vue.js. The app includes user authentication, user management, permissions, filtering, and pagination.

## Features

- **User Authentication**: Users can log in and log out of the application.
- **User Management**: Admin users can add, edit, and delete other users.
- **Permissions**: Roles and permissions are implemented using Laravel's built-in policies.
- **Filtering**: Users can filter the list of users based on various criteria.
- **Pagination**: The list of users is paginated for better performance and user experience.
- **Layout and Navigation**: The app has a consistent layout and navigation system using Vue.js components.

## Installation

1. Clone the repository:

```bash
git clone https://github.com/muhamed3li/First-Inertia-App.git
```

2. Install the PHP dependencies:

```bash
composer install
```

3. Install the NPM dependencies:

```bash
npm install
```

4. Copy the `.env.example` file to `.env` and configure the necessary environment variables, including the database connection details.

5. Generate an application key:

```bash
php artisan key:generate
```

6. Run the database migrations and seed the initial data:

```bash
php artisan migrate --seed
```

7. Build the assets:

```bash
npm run dev
```

8. Start the development server:

```bash
php artisan serve
```

The app should now be accessible at `http://localhost:8000`.

## Usage

After installing and running the app, you can access the following pages:

- **Home**: The home page, accessible to all users.
- **Users**: A list of users, accessible only to admin users. Admin users can add, edit, and delete users on this page.
- **Settings**: A page where users can update their profile information.

## Contributing

If you want to contribute to this project, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix: `git checkout -b my-new-feature`
3. Make your changes and commit them: `git commit -am 'Add some feature'`
4. Push your changes to your forked repository: `git push origin my-new-feature`
5. Create a new Pull Request on the original repository.

## License

This project is licensed under the [MIT License](LICENSE).
