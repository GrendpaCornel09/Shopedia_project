# Shopedia

<p align="center">
  <strong>A simple e-commerce platform built with Laravel and Blade PHP</strong>
</p>

<p align="center">
  <a href="#features">Features</a> •
  <a href="#tech-stack">Tech Stack</a> •
  <a href="#installation">Installation</a> •
  <a href="#usage">Usage</a> •
  <a href="#acknowledgments">Acknowledgments</a>
</p>

---

## About Shopedia

Shopedia is a side project of mine to put my knowledge in back end development to use. Built on the Laravel framework with Blade templating, this project demonstrates modern web development practices with both API and web interfaces.

## Features

- **User Authentication**: Secure registration and login with Laravel Sanctum
- **Product Management**: Create, read, update, and delete products with ease
- **Category Management**: Organize products by categories
- **Countries of Origin Tracking**: Manage product origins and track inventory by country
- **RESTful API**: Fully documented API endpoints for mobile and third-party integrations
- **Responsive Design**: Modern UI with glassmorphism aesthetic
- **Pagination Support**: Efficient data handling for large datasets
- **Error Handling**: Comprehensive validation and error messaging

## Tech Stack

- **Backend**: Laravel 11.x
- **Frontend**: Blade PHP, HTML5, CSS3
- **Database**: MySQL/MariaDB
- **Authentication**: Laravel Sanctum
- **API Documentation**: RESTful API design
- **Server**: Laragon (Local Development)

## Installation

Follow these steps to get Shopedia up and running on your local machine.

### Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL or MariaDB
- Laravel CLI (optional but recommended)
- Laragon or similar local development environment

### Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/Shopedia.git
   cd Shopedia
   
2. **Install Dependencies**
   ```bash
    composer install
    ```
3. **Environment Configuration**
4.   ```bash
    cp .env.example .env
    ```
   - Update the `.env` file with your database credentials and other necessary configurations.
   - Generate an application key:
   ```bash
    php artisan key:generate
    ```
5. **Database Migration and Seeding**
    ```bash
     php artisan migrate --seed
     ```
    - This will create the necessary database tables and seed them with initial data.
6. **Run the Development Server**
    ```bash
     php artisan serve
     ```
    - Access the application at `http://localhost:8000`
## Usage
- Register a new user account or log in with existing credentials.
- Explore the product catalog, add products to your cart, and manage your orders.
- Use the API endpoints for integration with mobile apps or third-party services. Refer to the API documentation for details.
## Acknowledgments
- Thanks to the Laravel community for their excellent documentation and support.
- Inspired by modern web design trends and best practices in e-commerce development.
- Special thanks to open-source contributors whose packages and tools made this project possible.
---
Feel free to contribute to this project by submitting issues or pull requests on GitHub. Your feedback and contributions are highly appreciated!