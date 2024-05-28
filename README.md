# Simple Budget Tracking Application

## Overview

This is a simple budget tracking application built using the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire) and MySQL as the database. The application allows users to track their income and expenses, categorize them, and view their financial status.

## Features

- User authentication and registration
- Add, edit, and delete income and expense entries
- Categorize transactions
- View a summary of income and expenses
- Responsive design with Tailwind CSS

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 7.4
- Composer
- Node.js and NPM
- MySQL
- Laravel installer (optional but recommended)

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/faizalamri-299/budget-tracker.git
    cd budget-tracker
    ```

2. **Install dependencies:**

    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Set up the environment variables:**

    Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database credentials and other configurations:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

4. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

5. **Run migrations:**

    ```bash
    php artisan migrate
    ```

6. **Seed the database (optional):**

    ```bash
    php artisan db:seed
    ```

7. **Serve the application:**

    ```bash
    php artisan serve
    ```

    Your application should now be running at `http://localhost:8000`.

## Usage

1. **Register an account:**

    Open your browser and navigate to `http://localhost:8000/register` to create a new account.

2. **Log in:**

    After registering, log in to the application.

    Notes : existing user to login (test@gmail.com : password=password)

3. **Add Budget:**

    - First things is insert the budget.
    - Fill in the details and submit.

4. **Add Budget:**

    - Click on Expenses to add new expenses.
    - Fill in the details and submit.

5. **View summary:**

    - Navigate to the "Dashboard" to view a summary of your income and expenses.

## Technologies Used

- **Laravel**: Backend framework
- **Livewire**: Full-stack framework for Laravel
- **Alpine.js**: Minimal JavaScript framework
- **Tailwind CSS**: Utility-first CSS framework
- **MySQL**: Database

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

If you have any questions or feedback, please reach out to us at [faizalmr33@gmail.com](mailto:faizalmr33@gmail.com).

---
