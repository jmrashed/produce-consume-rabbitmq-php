<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

// Establish a connection to the RabbitMQ server
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

// Declare a queue to send messages to
$queueName = 'test_queue';
$channel->queue_declare($queueName, false, true, false, false);

// Produce a message
$message = new AMQPMessage('Hello, RabbitMQ!');
$channel->basic_publish($message, '', $queueName);

echo "Message sent: Hello, RabbitMQ!\n";

// Consume messages
$callback = function ($msg) {
    echo "Received message: ", $msg->body, "\n";
};

$channel->basic_consume($queueName, '', false, true, false, false, $callback);

echo "Waiting for messages. To exit, press Ctrl+C\n";

while ($channel->is_consuming()) {
    $channel->wait();
}

// Close the connection
$channel->close();
$connection->close();
