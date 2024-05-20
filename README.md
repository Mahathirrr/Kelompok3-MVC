# PHP MVC Project

This is a web application project built using the Model-View-Controller (MVC) architectural pattern with PHP.

## Directory Structure

- `admin/` - Contains files and images related to the admin panel
- `app/` - Contains the core application code
  - `Controllers/` - Contains controller files
  - `Libraries/` - Contains library files such as Database.php
  - `Models/` - Contains model files
  - `Views/` - Contains view files
- `assets/` - Contains assets such as CSS, JavaScript, fonts, and images
  - `admin/assets/` - Contains assets specific to the admin panel
  - `css/` - Contains CSS files
  - `fonts/` - Contains font files
  - `images/` - Contains image files
  - `js/` - Contains JavaScript files
- `vendor/` - Contains third-party libraries and packages installed via Composer

## Requirements

- PHP >= 7.2
- MySQL or MariaDB

## Installation

1. Clone this repository: `git clone https://github.com/Mahathirrr/Kelompok3-MVC.git`
2. Navigate to the project directory: `cd Kelompok3-MVC`
3. Install dependencies via Composer: `composer install`
4. Create a new database and import the SQL file (if available)
5. Copy the `app/Libraries/Database.php.example` file to `app/Libraries/Database.php` and fill in your database credentials
6. Run the built-in PHP server: `php -S localhost:8000`
7. Open the application in your browser by visiting `http://localhost:8000`

## Contributing

Contributions in the form of bug reports, feature requests, or pull requests are greatly appreciated. Please open a new issue or submit a pull request in this repository.

## Contributors

- Muhammad Mahathir (2208107010056)
- Ganang Setyo Hadi (2208107010052)
- Nurfitriyana sajim (24001031043604513)
- Farhanul Khair ( 2208107010076 )
- Athar Rayyan Muhammad (2208107010074)
- Alfi Zamriza (2208107010080)

## License

This project is licensed under the [MIT License](LICENSE).
