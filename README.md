

````markdown
# Laravel Portfolio CRUD Application

## Laravel Version
This project uses **Laravel 12.0.8**.

---

## Setup Instructions

1. **Clone the repository:**

```bash
git clone <your-repository-url>
cd portfolio-crud
````

2. **Install dependencies:**

```bash
composer install
```

3. **Create a copy of the `.env` file:**

```bash
cp .env.example .env
```

4. **Configure `.env` file:**

* Set your database credentials (using MySQL):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=root
DB_PASSWORD=
```

* Make sure your MySQL server is running (e.g., via XAMPP).

5. **Generate application key:**

```bash
php artisan key:generate
```

6. **Run database migrations:**

```bash
php artisan migrate
```

7. **Create `public/images` directory for storing project images:**

```bash
mkdir public/images
```

8. **Start the development server:**

```bash
php artisan serve
```

9. **Access the app in your browser:**

```
http://127.0.0.1:8000/projects
```

---

## Database Name

* Use `portfolio_db` as the database name (or the name you configured in `.env`).

---

## Additional Notes

* Uploaded project images are stored in the `public/images` directory.
* Pagination is enabled to show 5 projects per page.
* Basic Bootstrap is used for frontend styling.

