# Quick PHP RESTful Framework

## Overview
This is a lightweight PHP RESTful framework designed to simplify API development. It follows MVC principles, provides easy routing, and supports middleware for enhanced security and flexibility.

## Features
- Simple and clean routing
- JSON response handling
- Error handling and logging
- Database integration using PDO
- Authentication support (session-based)
- CORS support

## Supported Database systems
- MySQL
- Postgres 
- MongoDB
- Oracle

## Installation



### Manual Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/Aula72/wu_php_api_simple_framework.git
   ```
   or 
   `composer create-project aula72/malaika`
2. Navigate to the project directory:
   ```sh
   cd /path/to/files/clone
   ```
3. Install dependencies:
   ```sh
   composer install
   ```

## Usage



## Configuration
Rename `.env.example` to `.env` for database and environment settings. Edit the `.env` file for configurations including`DB_TYPE` to choose a database type you're are intending to use forexample `DB_TYPE=postgres` for Postgres, the default database system is MySQL; set in `.env` the database `DBNAME` and the user password `DBPASSW` and other additionals database connection settings.

Create tables in your database.

### Running the Application
Start a development server:
```sh
php -S localhost:8000 
```



## Create your quick CRUD

Visit `http://localhost:8000/auto-crud.php`

A file name `v1.php` will be created containing all the necessary CRUD operations for your table. 

Edit the `index.php` add `include_once "v1.php"` just be the line that has `method_caller()`. 

Now you can do CRUD on any table in your database by using the following endpoints

- `GET /<table-name>`
- `GET /<table-name>?<column-name>=67`
- `GET /<table-name>?<column-name1>=67&&<column-name2>=90`
- `POST /<table-name>`
- `PUT /<table-name>?<column-name>=67`
- `DELETE /<table-name>?<column-name>=67`

Forexample if we have a database that has tables/models such as `products`, `categories` and `product_categories` then our endpoints will be as follows

- `GET /products`
- `GET /products?id=3`
- `POST /products`
- `PUT /products?id=2`
- `DELETE /products?id=5`
- so forth

If the table `products` has columns like `id`, `name`, `category_id`, `unit_price` and `quantity` then the post request will be in the following format

`{"name":"Ice Cream", "category_id":3, "unit_price":5.90, "quantity": 89}`









## Contributing
1. Fork the repository
2. Create a feature branch (`git checkout -b feature-name`)
3. Commit your changes (`git commit -m 'Add feature'`)
4. Push to the branch (`git push origin feature-name`)
5. Open a Pull Request

## License
This project is licensed under the MIT License.

## Contact
For support, open an issue or contact [moncytod@gmail.com](mailto:moncytod@gmail.com).


