### Tourism Management & Booking Platform

"Laravel" (https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
"PHP" (https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
"MySQL" (https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
"Blade" (https://img.shields.io/badge/Blade-Templates-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
"Bootstrap" (https://img.shields.io/badge/Bootstrap-5.2.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
"JavaScript" (https://img.shields.io/badge/JavaScript-AJAX-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
"Sanctum" (https://img.shields.io/badge/Laravel-Sanctum-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
"Redis" (https://img.shields.io/badge/Redis-Cache-DC382D?style=for-the-badge&logo=redis&logoColor=white)

A full-featured tourism management and booking platform built with Laravel and MySQL.

The system is designed to manage tourism trips, destinations, transportation, vehicles, additional services, reservations, pricing, currencies, and multilingual tourism content.

---

📋 Table of Contents

- "Overview" (#-overview)
- "Features" (#-features)
- "Tour Management" (#-tour-management)
- "Destinations & Categories" (#-destinations--categories)
- "Transportation & Vehicles" (#-transportation--vehicles)
- "Additional Services" (#-additional-services)
- "Multilingual Support" (#-multilingual-support)
- "Currency & Pricing" (#-currency--pricing)
- "Reservations" (#-reservations)
- "Authentication & Authorization" (#-authentication--authorization)
- "API" (#-api)
- "Admin Dashboard" (#-admin-dashboard)
- "Search, Filtering & Sorting" (#-search-filtering--sorting)
- "Maps & Distance" (#-maps--distance)
- "Email & Reporting" (#-email--reporting)
- "Technology Stack" (#-technology-stack)
- "Project Structure" (#-project-structure)
- "Installation" (#-installation)
- "Environment Configuration" (#-environment-configuration)
- "Database Setup" (#-database-setup)
- "Storage" (#-storage)
- "Running the Project" (#-running-the-project)
- "Laravel Concepts" (#-laravel-concepts)
- "Future Improvements" (#-future-improvements)
- "Author" (#-author)

---

🌍 Overview

This project is a tourism management and booking platform developed with Laravel.

The platform provides a centralized system for managing tourism services and reservations.

The main tourism entities include:

- Tours
- Destinations
- Categories
- Tour Photos
- Tour Details
- Transportation
- Vehicles
- Additional Services
- Reservations
- Currencies
- Pricing

The application also supports multilingual tourism content and structured relationships between different tourism services.

---

✨ Features

- Tourism trip management
- Destination management
- Category management
- Tour photo management
- Dynamic tour details
- Included services
- Excluded services
- Additional services
- Transportation management
- Vehicle management
- Reservation management
- Currency management
- Trip price management
- Multilingual content
- Authentication
- API endpoints
- Admin dashboard
- Search
- Filtering
- Sorting
- Pagination
- AJAX operations
- Email functionality
- Redis support
- Google Maps integration
- Distance calculation

---

🧳 Tour Management

The platform provides a complete management system for tourism trips.

Administrators can manage:

- Tour name
- Tour description
- Tour category
- Destination
- Tour details
- Tour photos
- Transportation
- Additional services
- Included services
- Excluded services
- Pricing
- Slugs

Tours can be accessed through SEO-friendly slug-based URLs.

Example:

/tours/desert-safari

---

📍 Destinations & Categories

Destinations

Destinations are used to organize tourism locations and connect them with available tours.

Destination management includes:

- Destination creation
- Destination editing
- Destination deletion
- Destination descriptions
- Multilingual destination content
- Tour relationships

Categories

Tours can be organized into different categories.

Categories support multilingual content where applicable.

---

🚌 Transportation & Vehicles

The system provides transportation management for tourism operations.

Transportation can contain:

- Transportation type
- From location
- To location
- Price
- Vehicle
- Related tourism service

Vehicles can be managed separately and connected to transportation records.

This allows the platform to handle different transportation options depending on the selected tour or service.

---

🛎️ Additional Services

Tours can have additional services that customers can select depending on the available configuration.

Services can be organized into:

Included Services

Services included in the tour price.

Excluded Services

Services that are not included in the base tour price.

Additional Services

Optional services that can be selected by the customer.

This structure makes it possible to build flexible tourism packages without hard-coding every service into a tour.

---

🌐 Multilingual Support

The project supports multilingual tourism content.

Supported languages:

- Arabic
- English
- German
- Polish

The project uses Astrotomic Laravel Translatable for managing translated model attributes.

Example:

$tour->translate('en');
$tour->translate('ar');
$tour->translate('de');
$tour->translate('pl');

---

💰 Currency & Pricing

The platform includes currency and pricing management.

Currency functionality is used to support tourism prices in different currencies.

The system can manage:

- Currency name
- Currency code
- Currency rate
- Tour prices
- Price changes
- Currency-based pricing

---

📅 Reservations

The platform includes a reservation system for tourism services.

A reservation can be associated with:

- Customer
- Tour
- Number of travelers
- Booking information
- Selected services
- Transportation
- Price
- Reservation status

Reservation Flow

Customer
    |
    v
Select Destination
    |
    v
Select Tour
    |
    v
View Tour Details
    |
    v
Select Services
    |
    v
Select Transportation
    |
    v
Calculate Price
    |
    v
Create Reservation

---

🔐 Authentication & Authorization

The application includes authentication and authorization functionality.

Protected resources can be secured using Laravel authentication and middleware.

The system separates protected administrative functionality from regular user functionality.

API authentication can be handled using Laravel Sanctum.

---

🔌 API

The backend provides API endpoints for application functionality.

The API can be used for:

- Authentication
- Tours
- Destinations
- Categories
- Transportation
- Vehicles
- Reservations
- Services
- Currencies
- Trip pricing

Example endpoints:

POST /api/login
POST /api/register
GET /api/tours
GET /api/destinations
POST /api/reservations

---

🖥️ Admin Dashboard

The project includes an administration interface for managing tourism data.

Administrators can manage:

- Tours
- Destinations
- Categories
- Tour details
- Tour photos
- Transportation
- Vehicles
- Additional services
- Reservations
- Currencies
- Prices

The admin interface uses:

- Laravel Blade
- Bootstrap 5.2.3
- DataTables
- Font Awesome
- JavaScript
- AJAX

DataTables provides useful functionality such as:

- Searching
- Sorting
- Pagination
- Data management

---

🔎 Search, Filtering & Sorting

Tourism data can be searched and filtered using different attributes.

Examples include:

- Tour name
- Destination
- Category
- Price
- Currency
- Duration
- Available services

Listings can also be sorted based on different criteria.

---

🗺️ Maps & Distance

The platform is designed to support map-based tourism functionality.

Google Maps can be used for:

- Destination locations
- Transportation locations
- Route information
- Distance calculation
- Location-based tourism services

Distance information can be useful when working with transportation and tourism services.

---

📧 Email & Reporting

The application uses Laravel's mail functionality for email-related operations.

Email functionality can be used for:

- Reservation confirmation
- Reservation updates
- Customer notifications
- Administrative notifications
- Booking reports

SMTP configuration can be added through the ".env" file.

The project can also use scheduled tasks for periodic administrative reporting.

---

⚡ Redis

Redis is included as part of the project's infrastructure for caching and performance-related functionality.

Redis can be used for:

- Application caching
- Temporary data
- Queue-related operations
- Performance optimization

---

🛠️ Technology Stack

Backend

- PHP
- Laravel
- MySQL
- Eloquent ORM
- Laravel Sanctum
- REST API

Frontend

- Blade
- HTML5
- CSS3
- JavaScript
- Bootstrap 5.2.3
- AJAX
- DataTables
- Font Awesome

Packages & Services

- Astrotomic Laravel Translatable
- Redis
- Laravel Mail
- SMTP
- Google Maps

Development Tools

- Git
- GitHub
- Composer
- Visual Studio Code

---

📁 Project Structure

tourism/
│
├── app/
│   ├── Http/
│   ├── Models/
│   └── Providers/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   ├── api.php
│   └── web.php
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
└── package.json

---

⚙️ Installation

1. Clone the Repository

git clone https://github.com/MoamenRamy/tourism.git

2. Enter the Project Directory

cd tourism

3. Install PHP Dependencies

composer install

4. Install Frontend Dependencies

npm install

5. Create the Environment File

cp .env.example .env

On Windows, you can also copy ".env.example" manually and rename it to ".env".

6. Generate the Application Key

php artisan key:generate

---

🔧 Environment Configuration

Configure the ".env" file according to your environment.

Example:

APP_NAME=Tourism
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tourism
DB_USERNAME=root
DB_PASSWORD=

Mail Configuration

If email functionality is enabled, configure your SMTP credentials:

MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"

Redis Configuration

If Redis is enabled in your environment:

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

---

🗄️ Database Setup

Create the MySQL database and configure the database credentials in ".env".

Run the migrations:

php artisan migrate

If the project contains seeders:

php artisan db:seed

Or:

php artisan migrate --seed

---

🖼️ Storage

Create the Laravel storage symbolic link:

php artisan storage:link

This allows uploaded files and images to be served from the public storage directory.

---

🧹 Clear Cache

During development, Laravel caches can be cleared using:

php artisan optimize:clear

Individual caches can also be cleared:

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

---

▶️ Run the Application

Start the Laravel development server:

php artisan serve

For frontend assets:

npm run dev

The application will normally be available at:

http://127.0.0.1:8000

---

🧠 Laravel Concepts Used

This project demonstrates practical experience with:

- MVC Architecture
- Eloquent ORM
- Eloquent Relationships
- Database Migrations
- Database Seeders
- Middleware
- Authentication
- Authorization
- Request Validation
- REST APIs
- Laravel Sanctum
- Blade Templates
- Localization
- Model Translation
- File Storage
- Laravel Mail
- Redis
- Database Transactions
- Route Model Binding
- Slugs
- Pagination
- AJAX
- CRUD Operations
- Scheduled Tasks

---

🔄 Booking Workflow

A typical tourism booking process can follow this flow:

Browse Destinations
        |
        v
Browse Categories
        |
        v
Select Tour
        |
        v
View Tour Details
        |
        v
Select Transportation
        |
        v
Select Additional Services
        |
        v
Calculate Price
        |
        v
Create Reservation
        |
        v
Reservation Confirmation

---

🎯 Project Goals

The main goal of the project is to provide a centralized tourism management system capable of handling:

- Tourism trips
- Destinations
- Tourism categories
- Transportation
- Vehicles
- Additional services
- Reservations
- Prices
- Currencies
- Multilingual content

The architecture is designed to make it possible to expand the platform with additional tourism services in the future.

---

🚀 Future Improvements

Possible future improvements include:

- Advanced booking availability
- Real-time reservation management
- Customer accounts
- Customer booking history
- Automated booking emails
- Advanced reporting
- Revenue analytics
- Advanced caching
- Background jobs
- Automated testing
- Docker deployment
- CI/CD pipelines
- Mobile application integration
- Online payment integration

---

👨‍💻 Author

Moamen Ramy Rahmo

Backend Developer focused on PHP & Laravel.

- GitHub: "MoamenRamy" (https://github.com/MoamenRamy)
- LinkedIn: "Moamen Ramy" (https://www.linkedin.com/in/moamen-ramy-492a8b212/)

---

📄 License

This project is developed for educational, portfolio, and professional purposes.

---

⭐ Support

If you find this project useful, consider giving the repository a star on GitHub.
