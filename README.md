# 🌍 Tourism Management & Booking Platform

A full-featured **Tourism Management and Booking Platform** built with **Laravel 11**, designed to manage tours, destinations, transportation, vehicles, services, reservations, currencies, pricing, multilingual content, and administrative operations.

The application provides a complete tourism workflow from managing tourism content through the admin dashboard to allowing customers to browse tours, calculate transportation prices, and submit bookings.

---

## 🚀 Features

### 🧳 Tour Management

- Create, update, view, and delete tours
- Manage tours using SEO-friendly slugs
- Assign tours to categories
- Assign tours to destinations
- Manage tour photos
- Manage detailed tour information
- Manage included services
- Manage excluded services
- Manage additional services
- Manage tour FAQs
- Manage tour safety information
- Manage tour rates and reviews
- Manage tour sales and pricing
- Manage tour reservations
- View tours by destination

---

### 📍 Destination Management

- Create and manage tourism destinations
- Connect destinations with tours
- Browse tours by destination
- Support multilingual destination content
- Use slug-based destination URLs

Example:

```text
/destinations/{slug}
```

Tours related to a destination can be accessed through:

```text
/destination/{slug}/tours
```

---

### 🗂️ Category Management

The system provides complete category management for organizing tours.

- Create categories
- Update categories
- Delete categories
- Manage translated category names
- Associate tours with categories
- Use slug-based category URLs

---

### 🚐 Transportation Management

The platform includes a dedicated transportation management system.

Features include:

- Create transportation services
- Manage transportation routes
- Define origin and destination
- Connect transportation with destinations
- Manage transportation vehicles
- Define vehicle-specific prices
- Manage transportation additional services
- Manage transportation questions
- Manage transportation included services
- Manage transportation sales
- Manage transportation reservations

Transportation routes support multilingual values such as:

```text
From → To
```

---

### 🚗 Vehicle Management

Vehicles can be associated with transportation services.

The system supports:

- Vehicle management
- Vehicle information
- Transportation ↔ vehicle relationships
- Vehicle-specific transportation pricing
- Multiple vehicles for a transportation route

Relationship:

```text
Transportation
      │
      ├── Vehicle
      ├── Vehicle
      └── Vehicle
```

Transportation vehicles can also contain a specific price through the pivot relationship.

---

### 📅 Tour Booking & Reservations

Customers can submit reservations for available tours.

The booking workflow includes:

- Select a tour
- Enter customer information
- Select number of guests
- Select reservation date
- Select currency
- Add phone number
- Add WhatsApp number
- Add address
- Add booking notes
- Store reservation
- Track payment status

Supported payment statuses include:

```text
unpaid
deposit
paid
```

Example booking flow:

```text
Browse Tours
     ↓
View Tour
     ↓
Book Tour
     ↓
Enter Customer Information
     ↓
Select Date / Guests / Currency
     ↓
Submit Reservation
     ↓
Reservation Stored
     ↓
Admin Management
```

---

### 🚘 Transportation Booking

Transportation reservations have their own workflow.

Customers can:

1. Select pickup location
2. Select destination
3. Select reservation date and time
4. Calculate available transportation options
5. Select a vehicle
6. Review transportation price
7. Enter customer information
8. Confirm reservation

Example workflow:

```text
From
 ↓
To
 ↓
Date & Time
 ↓
Find Transportation
 ↓
Available Vehicles
 ↓
Vehicle Price
 ↓
Customer Information
 ↓
Confirm Booking
```

---

### 💰 Dynamic Transportation Pricing

Transportation prices can be associated with individual vehicles.

The relationship uses a pivot table:

```text
transportation_vehicle
```

with pricing information stored for each transportation/vehicle combination.

Example:

```text
Transportation
      ↓
Available Vehicles
      ↓
Vehicle
      ↓
Vehicle-specific Price
```

This allows different vehicle types to have different prices for the same transportation route.

---

### 💱 Currency Management

The application provides currency management for tourism pricing and reservations.

Features include:

- Create currencies
- Update currencies
- Delete currencies
- Manage currency slugs
- Manage currency exchange rates
- Associate currencies with reservations
- Support different currencies for tourism services

---

### 📈 Rate & Pricing Management

The platform includes dedicated rate management.

Features include:

- Manage rates
- Associate rates with tours
- Manage translated rate content
- Update tourism pricing
- Manage tour sales
- Support different currencies

---

### 🛎️ Tourism Services

The application provides different service types that can be connected to tours.

#### Included Services

Services included in the tour price.

```text
Tour
 └── Included Services
```

#### Excluded Services

Services that are not included in the tour price.

```text
Tour
 └── Not Included Services
```

#### Additional Services

Optional services that can be added to a tour.

```text
Tour
 └── Additional Services
```

---

### 🧩 Tour Packages

The application also contains package-related functionality.

Packages can be associated with tourism services and tours.

The project includes functionality for:

- Package management
- Package photos
- Package services
- Package translations
- Package reservations

---

### ❓ Common Questions

The platform provides FAQ management for tourism content.

Features include:

- Create questions
- Update questions
- Delete questions
- Manage translated questions
- Associate questions with tours

Transportation also has its own question management system.

---

### 🛡️ Safety Information

Tours can contain safety information to provide customers with important instructions and recommendations.

The system supports:

- Safety management
- Tour-specific safety information
- Multilingual safety content

---

### 🌍 Multilingual Support

The project uses:

**Astrotomic Laravel Translatable**

to manage multilingual database content.

The application is designed to support multiple languages, including:

- 🇪🇬 Arabic
- 🇬🇧 English
- 🇩🇪 German
- 🇵🇱 Polish

Translated entities are stored using dedicated translation tables.

Example:

```text
Tour
 │
 ├── Arabic Translation
 ├── English Translation
 ├── German Translation
 └── Polish Translation
```

This architecture allows tourism content to be displayed according to the selected application locale.

---

## 🔐 Authentication & Authorization

The application uses Laravel Jetstream and Laravel Sanctum for authentication.

The project includes:

- User registration
- Authentication
- Password management
- Profile management
- Session management
- Sanctum API authentication
- Protected authenticated routes

Laravel Jetstream provides the authentication foundation while Sanctum handles API authentication.

---

## 🛠️ Admin Dashboard

The application contains a dedicated administration area for managing the tourism platform.

The admin functionality includes management for:

- Tours
- Destinations
- Categories
- Currencies
- Rates
- Sales
- Transportation
- Vehicles
- Tour reservations
- Transportation reservations
- Additional services
- Included services
- Safety information
- Common questions
- Users

Example administrative routes:

```text
/admin
/admin/tours
/admin/destination
/admin/categories
/admin/currencies
/admin/transportations
/admin/vehicles
/admin/tour-reservations
/admin/transportation_reservations
/admin/users
```

---

## 🌐 Main Application Routes

### Public Pages

| Method | Endpoint | Description |
|---|---|---|
| GET | `/` | Homepage |
| GET | `/about` | About page |
| GET | `/services` | Services page |
| GET | `/contact` | Contact page |
| GET | `/tours` | List tours |
| GET | `/destinations` | List destinations |
| GET | `/categories` | List categories |
| GET | `/currencies` | List currencies |

---

### Tour Routes

| Method | Endpoint | Description |
|---|---|---|
| GET | `/tours` | List tours |
| GET | `/tours/{slug}` | View a tour |
| POST | `/tours` | Create a tour |
| PUT/PATCH | `/tours/{slug}` | Update a tour |
| DELETE | `/tours/{slug}` | Delete a tour |
| GET | `/destination/{slug}/tours` | Get tours by destination |
| GET | `/tour-detail-input` | Dynamic tour detail input |

---

### Tour Reservation Routes

| Method | Endpoint | Description |
|---|---|---|
| GET | `/tour-reservations/booking/{slug}` | Display tour booking form |
| POST | `/tour-reservations/booking/{slug}` | Submit tour booking |
| GET | `/admin/tour-reservations` | Admin reservation management |

---

### Transportation Routes

| Method | Endpoint | Description |
|---|---|---|
| GET | `/transportations` | List transportation services |
| POST | `/transportations` | Create transportation |
| PUT/PATCH | `/transportations/{id}` | Update transportation |
| DELETE | `/transportations/{id}` | Delete transportation |
| GET | `/vehicle-input` | Dynamic vehicle input |
| GET | `/get-destinations` | Get available destinations |
| GET | `/admin/transportations` | Admin transportation management |
| GET | `/admin/vehicles` | Admin vehicle management |

---

### Transportation Booking Routes

| Method | Endpoint | Description |
|---|---|---|
| POST | `/transportation/pricing` | Calculate transportation options/pricing |
| POST | `/transportation/booking` | Start transportation booking |
| POST | `/transportation/confirm` | Confirm transportation reservation |
| GET | `/admin/transportation_reservations` | Admin reservation management |

---

## 🔗 Main Eloquent Relationships

The application makes extensive use of Laravel Eloquent relationships.

### Tour Relationships

A tour can be connected to:

```text
Tour
 ├── Category
 ├── Destination
 ├── Sections
 ├── Photos
 ├── Details
 ├── Additional Services
 ├── Included Services
 ├── Not Included Services
 ├── Reservations
 ├── Common Questions
 ├── Safety Information
 ├── Rates
 ├── Sales
 └── Packages
```

Examples:

```php
$tour->category();
$tour->sections();
$tour->additionalServiceTours();
$tour->includeServiceTours();
$tour->details();
$tour->photos();
$tour->reservations();
$tour->commonQuestions();
$tour->rates();
$tour->safety();
$tour->sales();
$tour->packages();
```

---

### Transportation Relationships

Transportation entities are connected with:

```text
Transportation
 ├── Destination
 ├── Vehicles
 ├── Reservations
 └── Additional Services
```

Example:

```php
$transportation->destination();
$transportation->vehicles();
$transportation->reservations();
$transportation->transport_additional_services();
```

---

## 🗄️ Database Architecture

The project uses Laravel migrations and Eloquent ORM to manage the database structure.

The database contains separate entities for the major tourism domains.

Conceptually:

```text
Users
 │
 ├── Tour Reservations
 └── Transportation Reservations


Destinations
 │
 └── Tours
       │
       ├── Categories
       ├── Photos
       ├── Details
       ├── Services
       ├── Questions
       ├── Safety
       ├── Rates
       └── Reservations


Transportation
 │
 ├── Vehicles
 ├── Additional Services
 └── Reservations


Currencies
 │
 ├── Rates
 └── Reservations
```

---

## 🏗️ Project Architecture

The project follows the Laravel MVC architecture.

```text
tourism/
│
├── app/
│   ├── Actions/
│   ├── Console/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   │
│   ├── Mail/
│   ├── Models/
│   ├── Notifications/
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
│   ├── console.php
│   └── web.php
│
├── storage/
│
├── tests/
│
├── composer.json
├── package.json
└── vite.config.js
```

---

## 🛠️ Tech Stack

| Technology | Usage |
|---|---|
| PHP 8.2+ | Backend programming language |
| Laravel 11 | Application framework |
| Laravel Jetstream | Authentication & application scaffolding |
| Laravel Sanctum | API authentication |
| Laravel Eloquent | ORM & relationships |
| Blade | Server-side rendering |
| Livewire | Interactive Laravel components |
| MySQL | Database |
| Astrotomic Translatable | Multilingual database content |
| Tailwind CSS | Frontend styling |
| Vite | Asset bundling |
| Axios | HTTP requests |
| JavaScript | Frontend interactions |
| AJAX | Asynchronous operations |
| DataTables | Admin data tables |
| Bootstrap | UI components |
| Font Awesome | Icons |
| Redis | Caching/performance workflows |
| Laravel Mail | Email functionality |
| Laravel Scheduler | Scheduled tasks |
| Google Maps | Location/map functionality |

---

## 📦 Main Laravel Packages

The project uses several Laravel packages and ecosystem tools.

### Astrotomic Laravel Translatable

Used for multilingual database entities.

```json
"astrotomic/laravel-translatable": "^11.15"
```

### Laravel Jetstream

Used for authentication and user management.

```json
"laravel/jetstream": "^5.3"
```

### Laravel Sanctum

Used for API authentication.

```json
"laravel/sanctum": "^4.0"
```

### Livewire

Used for dynamic Laravel-powered interfaces.

```json
"livewire/livewire": "^3.0"
```

### libphonenumber

Used for phone number handling and validation.

```json
"giggsey/libphonenumber-for-php": "^8.13"
```

---

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/MoamenRamy/tourism.git
```

Move into the project directory:

```bash
cd tourism
```

---

### 2. Install PHP Dependencies

```bash
composer install
```

---

### 3. Create Environment File

```bash
cp .env.example .env
```

On Windows, you can manually copy:

```text
.env.example
```

to:

```text
.env
```

---

### 4. Generate Application Key

```bash
php artisan key:generate
```

---

### 5. Configure Database

Update your `.env` file with your database credentials.

Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tourism
DB_USERNAME=root
DB_PASSWORD=
```

---

### 6. Run Database Migrations

```bash
php artisan migrate
```

To run migrations and seed the database:

```bash
php artisan migrate --seed
```

Or:

```bash
php artisan db:seed
```

---

### 7. Install Frontend Dependencies

```bash
npm install
```

---

### 8. Build Frontend Assets

For production:

```bash
npm run build
```

For development:

```bash
npm run dev
```

---

### 9. Create Storage Link

```bash
php artisan storage:link
```

---

### 10. Start Laravel Development Server

```bash
php artisan serve
```

The application will be available at:

```text
http://127.0.0.1:8000
```

---

## 🚀 Laravel Development Mode

The project also provides a Composer development script that can run multiple services together.

```bash
composer run dev
```

The development environment can run:

```text
Laravel Server
     +
Queue Listener
     +
Laravel Pail Logs
     +
Vite Development Server
```

---

## 🔧 Environment Configuration

Important environment variables may include:

```env
APP_NAME=Laravel
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

MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=

GOOGLE_MAPS_API_KEY=
```

Do not commit sensitive credentials to GitHub.

---

## 🗺️ Location & Transportation Workflow

Transportation pricing is calculated according to the selected route.

The application receives:

```text
From
To
Reservation Date/Time
```

Then searches for a matching transportation route according to the current application locale.

Conceptually:

```text
Customer Input
      ↓
From + To
      ↓
Find Transportation Route
      ↓
Load Available Vehicles
      ↓
Load Vehicle Prices
      ↓
Display Pricing
      ↓
Customer Selects Vehicle
      ↓
Booking Confirmation
```

---

## 🌐 API

The project includes a Laravel API structure.

The default authenticated user endpoint is protected using Sanctum:

```http
GET /api/user
```

Authentication middleware:

```php
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
```

The API can be extended with additional endpoints for mobile applications, frontend applications, or third-party integrations.

---

## 🧪 Testing

Laravel's testing infrastructure is included in the project.

Run the test suite with:

```bash
php artisan test
```

Or:

```bash
./vendor/bin/phpunit
```

The repository also contains GitHub Actions workflows for automated project checks.

---

## 🧹 Code Quality

Laravel Pint is included as a development dependency.

You can format the codebase using:

```bash
./vendor/bin/pint
```

---

## ⚡ Cache Management

Clear Laravel's cached configuration, routes, views, and application cache:

```bash
php artisan optimize:clear
```

For production optimization:

```bash
php artisan optimize
```

---

## 🔄 GitHub Actions

The repository contains GitHub Actions workflows for project automation.

The workflow configuration includes checks related to:

- Tests
- Issues
- Pull Requests
- Changelog updates

This helps maintain a more structured development workflow.

---

## 📊 Main System Modules

The application can be divided into the following major modules:

```text
Tourism Platform
│
├── Tours
│   ├── Categories
│   ├── Destinations
│   ├── Photos
│   ├── Details
│   ├── Services
│   ├── Questions
│   ├── Safety
│   ├── Rates
│   ├── Sales
│   └── Reservations
│
├── Transportation
│   ├── Routes
│   ├── Vehicles
│   ├── Prices
│   ├── Services
│   ├── Questions
│   ├── Sales
│   └── Reservations
│
├── Packages
│   ├── Services
│   ├── Photos
│   ├── Translations
│   └── Reservations
│
├── Currency
│   └── Rates
│
├── Users
│   └── Authentication
│
└── Administration
    ├── Dashboard
    ├── CRUD Management
    ├── Reservations
    └── Reports
```

---

## 🧠 Key Laravel Concepts Demonstrated

This project demonstrates practical experience with:

- Laravel 11
- MVC architecture
- Eloquent ORM
- One-to-One relationships
- One-to-Many relationships
- Many-to-Many relationships
- Pivot tables
- Route model binding
- Slug-based routing
- Resource controllers
- Form validation
- Middleware
- Authentication
- Laravel Sanctum
- Laravel Jetstream
- Livewire
- Blade
- Database migrations
- Database seeders
- Model factories
- CRUD operations
- Localization
- Multilingual database architecture
- File uploads
- Reservations
- Dynamic pricing
- Currency management
- Transportation management
- AJAX
- API development
- Vite
- Tailwind CSS
- GitHub Actions

---

## 🔒 Security Considerations

Sensitive configuration values should be stored in `.env`.

Never commit:

```env
APP_KEY=
DB_PASSWORD=
MAIL_PASSWORD=
GOOGLE_MAPS_API_KEY=
```

The `.env` file should remain excluded from version control.

---

## 📌 Project Purpose

This project was built as a practical tourism platform demonstrating how a modern Laravel application can handle a complete tourism business workflow.

The system combines:

- Tourism content management
- Tour management
- Destination management
- Transportation management
- Vehicle management
- Dynamic pricing
- Currency management
- Multilingual content
- Customer reservations
- Transportation bookings
- Administrative management
- Authentication
- API authentication
- Database relationships
- File management
- Automated development workflows

The architecture is designed to be extendable for additional tourism services and integrations such as payment gateways, external travel APIs, mobile applications, and advanced reporting.

---

## 👨‍💻 Author

**Moamen Ramy Rahmo**

PHP / Laravel Backend Developer

### Technical Focus

- PHP
- Laravel
- MySQL
- REST APIs
- Eloquent ORM
- Laravel Sanctum
- Blade
- Livewire
- Python
- Django
- Git
- GitHub

### 🔗 Connect

- GitHub: [@MoamenRamy](https://github.com/MoamenRamy)
- LinkedIn: [Moamen Ramy](https://www.linkedin.com/in/moamen-ramy-492a8b212/)

---

## ⭐ Support

If you find this project useful or interesting, consider giving it a ⭐ on GitHub.

---

## 📄 License

This project is open-source and available under the terms specified in the repository.
