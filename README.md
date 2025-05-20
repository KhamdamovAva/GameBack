<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# InGame

## About the Project
InGame is a platform that allows users to browse and purchase various digital products. The system does not have user authentication; instead, users provide their name, surname, and phone number when making a purchase, and an admin contacts them to complete the transaction.

## Features
- 📌 **Product Management:** Admins can add, update, and delete products.
- 💰 **Currency Conversion:** Prices are automatically converted between UZS, USD, and RUB.
- 🛒 **Order System:** Users can submit their contact details for purchasing products.
- 🗄 **File Storage:** Secure and efficient file handling for product images.
- 📠 **Contact Management** Handles user inquiries and messages, allowing admins to manage and respond to customer requests efficiently.
- 🔔 **Notification Management** Sends real-time notifications to users about important updates, including order status changes and promotional messages.
- ✨ *and everything you need for a CRUD product*

## Tech Stack
- **Backend:** Laravel 11
- **Database:** MySQL
- **Version Control:** GitHub

## Documentation
- [Api Documentation](https://documenter.getpostman.com/view/39432331/2sAYdeNC6j)

## Installation Guide
### Prerequisites
Ensure you have the following installed on your system:
- PHP 8.2+
- Composer
- MySQL

### Setup Steps
1. Clone the repository:
   ```sh
   git clone https://github.com/your-username/InGame.uz.git
   cd InGame.uz
   ```
2. Install dependencies:
   ```sh
   composer install
   ```
3. Copy the environment file and configure your database:
   ```sh
   cp .env.example .env
   ```
   Update the `.env` file with your database credentials.

4. Run migrations and seed the database:
   ```sh
   php artisan migrate --seed
   ```

5. Start the development server:
   ```sh
   php artisan serve
   ```

## Contribution
If you want to contribute:
1. Fork the repository.
2. Create a new branch (`feature-branch`)
3. Commit your changes.
4. Push the branch and create a Pull Request.

## Contact
For any inquiries or issues, feel free to contact the project maintainer.

