# Laravel Blog Post Project

This Laravel project is a simple blog application that allows users to register, log in, create, edit, and delete blog posts. The project includes some restrictions to ensure that only the owner of a post can edit or delete it.

## Features

-   **User Authentication:**

    -   Users can register and log in to the system.

-   **Post Management:**
    -   Authenticated users can create new blog posts.
    -   Users can view a list of all blog posts.
    -   Post owners can edit their own posts.
    -   Post owners can delete their own posts.

## Getting Started

### Prerequisites

Make sure you have the following software installed on your machine:

-   [PHP](https://www.php.net/) (>= 7.4)
-   [Composer](https://getcomposer.org/)
-   [Node.js](https://nodejs.org/)
-   [NPM](https://www.npmjs.com/)
-   [MySQL](https://www.mysql.com/) or [SQLite](https://www.sqlite.org/) database

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/laravel-blog-project.git

    ```

2. Change into project directory:
   cd laravel-blog-project

3. Install PHP dependencies
   composer install

4. Install NPM dependencies:
   npm install

5. Copy .env.example and .env and configure database

6. Migrate the database
   php artisan migrate

7. Start the server
   php artisan serve

8. Start 'http://localhost:8000' on browser

### Snipets

![Login-Register](./img/your-image.jpg)
![Dashboard](./img/your-image.jpg)
![Edit Post](./img/your-image.jpg)
