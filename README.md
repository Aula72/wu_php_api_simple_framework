This is a simple restful API framework written in PHP 

<h1>How to use the framework</h1>

Clone the framework

Create you database with tables example of database table

<p> The table `products` which has columns such as</p>

  `id` <br>
  `product_name` <br>
  `product_price` <br>
  `product_quantity` <br>
  `created_at` <br>



The possible endpoints on this resources are:

`GET` `/products` <br>
`GET` `/products?id=34` <br>
`POST` `/products` <br>
`PUT`  `/products?id=34`<br>
`DELETE` `/products?id=34`<br>

<h3>Steps to using the framework</h3>
Clone the project from <a href="https://github.com/Aula72/wu_php_api_simple_framework">Github</a> to any directory on your machine or server, make sure that at least `PHP 8.1` is installed on machine. 

<p>Navigate to the location in terminal or CMD on Windows run the API by running the command `php -S 0.0.0.0:8000`, open you favour restful API client and enjoy.</p>
