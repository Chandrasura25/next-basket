# Users Microservice

This microservice handles user-related operations such as user creation and notifications.

## Table of Contents
- [Setup](#setup)
- [Usage](#usage)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

## Setup

1. **Clone the Repository:**
   
   git clone https://github.com/Chandrasura25/next-basket
    

2. **Install Dependencies:**
    
   cd next-basket
   composer install
    

3. **Environment Configuration:**
   - Copy the `.env.example` file to `.env`:
     
     cp .env.example .env
      
   - Update the `.env` file with your database and RabbitMQ configuration.

4. **Generate Application Key:**
    
   php artisan key:generate
    

5. **Run Migrations:**
   
   php artisan migrate
    

6. **Start the Development Server:**
    
   php artisan serve
    

## Usage

- **Creating a User:**
  - Endpoint: `POST /users`
  - Request Body:
     json
    {
        "email": "user@example.com",
        "firstName": "John",
        "lastName": "Doe"
    }
     
  - Response:
     json
    {
        "message": "User created successfully",
        "user": {
            "email": "user@example.com",
            "firstName": "John",
            "lastName": "Doe"
        }
    }
     

## Testing

To run the tests, use the following command:

php artisan test
 

The tests cover unit, integration, and functional aspects of the application.

## Contributing

Contributions are welcome! Feel free to submit pull requests or open issues for any improvements or bug fixes.

## License

This project is licensed under the [MIT License](LICENSE).
