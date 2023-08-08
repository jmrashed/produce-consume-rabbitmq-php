<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Path to your autoloader

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

// Establish a connection to the RabbitMQ server
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

// Declare a queue to send messages to
$queueName = 'test_queue';
$channel->queue_declare($queueName, false, true, false, false);

// Produce a message
$randomNumber = rand();
$messageBody = 'Hello, RabbitMQ! Your random number is '. $randomNumber;
$message = new AMQPMessage($messageBody);
$channel->basic_publish($message, '', $queueName);

echo "Message sent: $messageBody\n";

// Close the connection
$channel->close();
$connection->close();
