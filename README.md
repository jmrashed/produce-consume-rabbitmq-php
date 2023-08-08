# Produce and Consume Messages with RabbitMQ using PHP

This guide demonstrates how to produce and consume messages with RabbitMQ using PHP and the `php-amqplib` library.

## Prerequisites

- PHP installed on your system
- Composer (Dependency Manager for PHP) installed
- RabbitMQ server running locally or accessible

## Installation

1. Clone this repository:

```bash
git clone https://github.com/jmrashed/produce-consume-rabbitmq-php.git
```

2. Navigate to the project directory:
```bash
cd produce-consume-rabbitmq-php
```

3. Install dependencies using Composer:
```bash
composer install
```


# Usage
## Produce Messages
1. Open a terminal and navigate to the project directory.

2. Run the producer script to send a message to the RabbitMQ queue:
```bash
php src/produce.php
```

3. The producer will send a message to the queue. You should see an output similar to:

```yaml
Message sent: Hello, RabbitMQ! Your random number is 1901594410
```


## Consume Messages
1. Open another terminal window and navigate to the project directory.
2. Run the consumer script to receive messages from the RabbitMQ queue:

```bash
php src/consume.php
```
3. The consumer will start listening for messages. If a message is received, you should see an output similar to:

```yaml
Received message: Hello, RabbitMQ! Your random number is 1901594410
```
4. Keep the consumer running to continuously receive and process messages. To stop the consumer, press Ctrl+C.

# Customization
- You can modify the `produce.php` script to send different messages or customize the message payload.
- The `consume.php` script can be extended to process received messages according to your application's requirements.

# Contributing
Contributions are welcome! If you find a bug or want to add a new feature, please follow these steps:

Fork the repository.
Create a new branch: `git checkout -b feature/new-feature`.
Make changes and commit: `git commit -am 'Add new feature'`.
Push to the branch: `git push origin feature/new-feature`.
Create a pull request.

# License
This project is licensed under the [MIT License](MIT.md) - see the LICENSE file for details.