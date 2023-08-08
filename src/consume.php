<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Path to your autoloader

use PhpAmqpLib\Connection\AMQPStreamConnection;

// Establish a connection to the RabbitMQ server
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

// Declare the queue to consume messages from
$queueName = 'test_queue';
$channel->queue_declare($queueName, false, true, false, false);

echo "Waiting for messages. To exit, press Ctrl+C.\n";

// Callback function to process received messages
$callback = function ($msg) {
    echo "Received message: ", $msg->body, "\n";
};

// Start consuming messages from the queue
$channel->basic_consume($queueName, '', false, true, false, false, $callback);

// Keep the consumer running and listening for messages
while ($channel->is_consuming()) {
    $channel->wait();
}

// Close the connection
$channel->close();
$connection->close();
