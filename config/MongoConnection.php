<?php

namespace App\Config;

use MongoDB\Client;

class MongoConnection
{
    protected $client;

    public function __construct()
    {
        $this->client = $this->connect();
    }

    /**
     * Manages the connection to MongoDB.
     *
     * @return Client Returns the MongoDB client instance.
     */
    protected function connect(): Client
    {
        try {
            // Connect to MongoDB Atlas via the URI
            return new Client($_ENV['MONGODB_URI']);
        } catch (\Exception $e) {
            // Lance une exception au lieu de terminer le script
            throw new \RuntimeException("Erreur de connexion à MongoDB : " . $e->getMessage());
        }
    }

    /**
     * Retrieves a collection from the specified database.
     *
     * @param string $database The name of the database.
     * @param string $collection The name of the collection.
     * @return Collection The specified collection.
     */
    public function getCollection(string $database, string $collection)
    {
        return $this->client->$database->$collection;
    }
}