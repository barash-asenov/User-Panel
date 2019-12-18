<img src="https://img.icons8.com/plasticine/2x/user.png" alt="UserPanel">


***USER PANEL***  
***YOU CAN CHECK OUT THE [DEMO](http://userpanel-com.stackstaging.com/)***

# USER PANEL (CODEIGNITER)

Simple user registration and display project.

## Prerequisites

* Apache & MySQL & PHP ([Xampp](https://www.apachefriends.org/index.html) Recommended for Windows)
* [Composer](https://getcomposer.org/)

## Installation

* Firstly database need to be created

* Then inside the database `users` table needs to be created

**Users Table Scheme**


|            | Type | Collation | Default | Null | Extra |
|---|---|---|---|---|---|
| id | int(11) |  | None | No | AUTO_INCREMENT |
| username | varchar(100) | 	utf8mb4_general_ci  | None  | No |  |
| email | varchar(100) | 	utf8mb4_general_ci| None | No |  |
| created_At | timestamp |  | current_timestamp() | No |  |

* Then change name of the `env.example` to `.env`

**In the .env file**

```
# DB Variables
DB_HOST=localhost
DB_USER=root
DB_PASS=pass
DB_NAME=db_name

# Recaptcha Keys
reCAPTCHA_SITE_KEY=your_site_key
reCAPTCHA_SECRET_KEY=your_secret_key
```

The DB credentials has to be filled according to DB that created.  
Also system uses recaptcha, also recaptcha ``site key`` and ``secret key``
should be generated from [Google Recaptcha](https://www.google.com/recaptcha/intro/v3.html)  

* After this process ``composer`` dependencies can be downloaded using;

**Note: [Composer](https://getcomposer.org/) Should be installed on the system**

```
composer install
```

* Change base url in ``application/config/config.php``

```
$config['base_url'] = 'YOUR_BASE_URL';
```


## License

**[MIT license](http://opensource.org/licenses/mit-license.php)**
