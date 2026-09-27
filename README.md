# Tourism Management & Booking Platform

A comprehensive tourism management and booking platform built with Laravel 11, designed to manage tours, destinations, transportation, vehicles, services, reservations, currencies, pricing, multilingual content, and related tourism data through a structured web interface.

The system focuses on tourism data management, reservation workflows, multilingual content, role-based administration, dynamic pricing, Google Maps integration, and centralized management of tourism services.

---

## 🚀 Features

### 🧳 Tour Management

* Create and manage tourism tours
* Manage tour categories
* Manage tour destinations
* Upload and manage tour photos
* Add detailed tour information
* Manage included services
* Manage excluded services
* Manage additional services
* Manage tour transportation
* Manage tour pricing
* Manage tour reservations
* Use slug-based URLs for tourism pages

### 📍 Destination Management

* Create and manage destinations
* Connect destinations with tours
* Manage destination information
* Support multilingual destination content
* Organize tours according to destinations

🚐 Transportation Management

* Create and manage transportation services
* Manage transportation vehicles
* Connect transportation with tours
* Manage transportation details
* Organize available transportation options

### 🚗 Vehicle Management

* Create and manage vehicles
* Associate vehicles with transportation services
* Manage vehicle-related information
* Use vehicles as part of tourism transportation workflows

### 🏨 Tourism Services

The platform supports different tourism-related services and resources, including:

* Hotels
* Cruises
* Flights
* Car rentals
* Transportation
* Additional tourism services

These resources can be organized and managed according to the application's tourism workflow.

### 🛎️ Included & Additional Services

Tours can contain different types of services.

### Included Services

* Define services included in the tour
* Display included services with tour information
* Associate included services with tourism packages

### Not Included Services

* Define services that are not included
* Display excluded services to customers
* Clarify additional customer expenses

### Additional Services

* Create additional services
* Connect additional services with tours
* Manage optional services related to reservations

### 📅 Reservation Management

The system provides reservation management for tourism services.

* Create reservations
* Store customer information
* Connect reservations with tours
* Manage reservation records
* Track reservation information
* Manage bookings from the administration dashboard

### 💰 Pricing & Currency Management

The application provides dynamic tourism pricing and currency management.

* Create and manage currencies
* Manage currency exchange rates
* Manage tour prices
* Change tour prices
* Store pricing information
* Support multiple currencies

### 🔎 Search, Sorting & Filtering

The application provides tools for finding and organizing tourism data.

* Search tours
* Filter tourism content
* Sort available results
* Search by destination
* Search by category
* Use slug-based URLs

### 🌍 Multilingual Support

The application supports multilingual tourism content using Astrotomic Laravel Translatable.

Supported languages include:

* Arabic
* English
* German
* Polish

Translated content can be managed for the supported tourism entities.

### 🗺️ Google Maps & Distance Calculation

The system integrates map-related functionality for tourism services.

* Google Maps integration
* Location-based tourism information
* Distance calculation
* Kilometer-based calculations
* Use location information in tourism workflows

### 📊 Reports & Email

The application includes administrative reporting functionality.

* Generate administrative reports
* Send reports through email
* Use Laravel Mail
* Schedule periodic reports
* Support automated reporting workflows

## 🔐 Authentication & Authorization

The application uses Laravel authentication and protected routes for administrative functionality.

Administrative operations can be protected through middleware and authorization rules.

---

## 🛠️ Tech Stack

Technology| Purpose
PHP 8.2+| Backend language
Laravel 11| Web application framework
MySQL| Database
Blade| Server-side templating
Bootstrap 5.2.3| UI framework
JavaScript| Frontend interactions
AJAX| Asynchronous requests
DataTables| Interactive data tables
Font Awesome| Icons
Laravel Sanctum| API authentication
Laravel Eloquent| ORM & database relationships
Astrotomic Translatable| Multilingual content
Redis| Caching & performance
Laravel Mail| Email functionality
Laravel Scheduler| Scheduled tasks
Google Maps| Maps & distance calculation

---

## 🏗️ Architecture

The project follows Laravel's MVC architecture and separates the application into controllers, models, views, routes, database migrations, and supporting services.

tourism/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   │
│   ├── Models/
│   ├── Mail/
│   └── ...
│
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
│
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
│
├── routes/
│   ├── web.php
│   ├── api.php
│   └── console.php
│
├── public/
├── storage/
├── tests/
├── composer.json
└── package.json

---

## 🗄️ Main Data Relationships

The application uses Laravel Eloquent relationships to connect the main tourism entities.

Tour
 │
 ├── Category
 │
 ├── Destination
 │
 ├── Photos
 │
 ├── Tour Details
 │
 ├── Included Services
 │
 ├── Not Included Services
 │
 ├── Additional Services
 │
 ├── Transportation
 │      │
 │      └── Vehicles
 │
 └── Reservations

Examples of tourism-related relationships include:

* "Tour → Category"
* "Tour → Destination"
* "Tour → Photos"
* "Tour → Tour Details"
* "Tour → Included Services"
* "Tour → Not Included Services"
* "Tour → Additional Services"
* "Tour → Transportation"
* "Transportation → Vehicles"
* "Tour → Reservations"
* "Currency → Currency Rates"

---

## 🔑 Authentication & API

The project uses Laravel Sanctum for API authentication.

API functionality is separated from the server-rendered Blade interface where required.

Protected API routes can use Sanctum authentication to control access to authenticated resources.

Example:

Route::middleware('auth:sanctum')->group(function () {
    // Protected API routes
});

---

## 🌐 Multilingual Architecture

The project uses Astrotomic Laravel Translatable to manage translated database content.

A translatable entity can contain different translations for supported locales.

Tour
 │
 ├── Arabic
 │
 ├── English
 │
 ├── German
 │
 └── Polish

This approach allows tourism content to be displayed according to the selected application language.

---

## 📅 Reservation Workflow

A typical reservation workflow can be represented as:

Customer
    ↓
Browse Tours
    ↓
Search / Filter
    ↓
View Tour
    ↓
Select Services
    ↓
Create Reservation
    ↓
Reservation Stored
    ↓
Admin Management

---

## 💵 Dynamic Pricing

The system provides functionality for managing tourism prices and changing them when required.

The pricing workflow can be represented as:

Tour
  ↓
Current Price
  ↓
Price Management
  ↓
Change Trip Price
  ↓
Updated Price

Currency management can also be used to organize tourism prices according to supported currencies.

---

## ⚙️ Installation

1. Clone the repository

git clone https://github.com/MoamenRamy/tourism.git

cd tourism

2. Install PHP dependencies

composer install

3. Create environment file

cp .env.example .env

On Windows, you can also create a copy manually:

.env.example → .env

4. Generate application key

php artisan key:generate

5. Configure the database

Update your ".env" file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tourism
DB_USERNAME=root
DB_PASSWORD=

6. Run migrations

php artisan migrate

7. Run database seeders

php artisan db:seed

Or:

php artisan migrate --seed

8. Install frontend dependencies

npm install

9. Build frontend assets

npm run build

For development:

npm run dev

10. Create storage link

php artisan storage:link

11. Start the application

php artisan serve

The application will be available at:

http://127.0.0.1:8000

---

## ⚡ Redis & Cache

The project uses Redis for caching and performance-related operations.

Clear Laravel caches:

php artisan optimize:clear

Cache configuration:

php artisan config:cache

Cache routes:

php artisan route:cache

Cache views:

php artisan view:cache

---

## 🧪 Testing

Run the Laravel test suite with:

php artisan test

---

## 🔒 Environment & Security

Do not commit sensitive environment variables to GitHub.

The following values should remain private:

APP_KEY=
DB_PASSWORD=
MAIL_PASSWORD=
GOOGLE_MAPS_API_KEY=

Use ".env.example" as the template for local configuration.

---

## 📌 Project Purpose

This project was developed as a practical tourism management and booking platform demonstrating how a Laravel application can manage a complete tourism workflow around:

* Tourism tours
* Destinations
* Categories
* Transportation
* Vehicles
* Tourism services
* Reservations
* Dynamic pricing
* Currency management
* Multilingual content
* Google Maps integration
* Administrative dashboards
* API authentication
* Scheduled reports
* Email notifications
* Redis caching

---

## 📚 Key Laravel Concepts Demonstrated

This project demonstrates practical experience with:

* Laravel 11
* MVC architecture
* Eloquent ORM
* Model relationships
* Middleware
* Authentication
* Laravel Sanctum
* Blade
* Form validation
* CRUD operations
* Database migrations
* Database seeders
* Laravel Mail
* Laravel Scheduler
* Redis
* API development
* Localization
* Astrotomic Laravel Translatable
* AJAX
* DataTables
* Bootstrap
* Google Maps integration
* Dynamic pricing
* Reservation management

---

## 👨‍💻 Author

Moamen Ramy Rahmo

Back-End Engineer specializing in:

* PHP
* Laravel
* MySQL
* Python
* Django
* REST APIs
* Database Design
* Backend Development

## Connect

* GitHub: "@MoamenRamy" (https://github.com/MoamenRamy)
* LinkedIn: "Moamen Ramy" (https://www.linkedin.com/in/moamen-ramy-492a8b212/)

---

## ⭐ Support

If you find this project useful or interesting, consider giving it a ⭐ on GitHub.
