# MyHotels
In this project, you will find a hotel finder use case using an API REST request. The client provides the hotel ID as a param, and the API returns:

1. The basic data of the selected hotel
2. Registered rooms
3. Users who have booked rooms at the hotel

## Dependencies

This project uses `composer 2.0`, `PHP 8.0`, `MySql Database Service` and `Symfony 5.3`.

## Usage

After unzipping the file, run `composer install` on the project's root folder. 
Once the installation is completed, the tests can be run using the `composer test` command.

To perform the API REST request and retrieve the data, a MySQL dump located in `etc/databases` should be imported to a database and configure properly the `DATABASE_URL` in the .env file. Then start the Symfony server by running `symfony server:start -d`. Finally, execute the following cURL command to retrieve the data: `curl --location --request GET 'http://127.0.0.1:8000/hotel/100/booking/status'`

Also, a Postman collection is provided, which is located in `etc/endpoints`. So, instead of the cURL command, this collection can be imported to Postman and use the inside request (check the URL collection variable to point to the correct server!).

Using the MySql dump, the valid values for the hotel ID are the following: 100, 200, 300, 400, 500.

## Architecture

This project uses the **Hexagonal Architecture** as implementation of the clean architecture, having the following layers inside the `Core` context:

* The application layer contains a basic service that uses an input DTO to retrieve the hotel ID's requested data.

* The domain layer contains the business rules related to `Hotel`, `Room`, and `Booking` entities and their ValueObjects, followed by the repository port for retrieving the hotel data.

* The infrastructure layer contains all the required files to communicate with the database, the controller that receives the request, and the output DTO for transforming the data before it is returned to the client.

In this case, the service in charge of retrieving the requested data is injected into the controller to avoid adding complexity to this specific use case. However, another approach could be sending a query to a message bus and setting up a handler to perform the requested action.

Also, the project takes advantage of Doctrine relationships to retrieve all the needed hotel data from a single query. Another strategy related to using many handlers could be utilizing consecutive queries to retrieve the data from the ID for the hotel, getting the IDs for the rooms and bookings, and performing the database calls separately.

Security setup for the communication with the API, the use of Uuid as IDs and other framework utilities are not applied to avoid adding extra complexity to the project.

## Test
For testing the project, the following tests have been created:

* The Core Unit tests are used to test the business rules for the entities.
* The Core Integration tests are used to test the application service without doing database calls by mocking the repositories.
* The Core Infrastructure Repository tests are used for testing the repositories.

For running the project tests, use the following command in the project's root folder: `composer test`.
