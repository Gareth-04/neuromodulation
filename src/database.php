<?php

class Database
{
    private string $server = 'localhost';
    private string $database = 'Neuromodulation';
    private string $username = '';
    private string $password = '';

    public function getConnection(): PDO
    {
        $connectionString = "sqlsrv:Server={$this->server};Database={$this->database}";

        try {
            $connection = new PDO(
                $connectionString,
                $this->username,
                $this->password
            );

            $connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $connection;

        } catch (PDOException $exception) {

            throw new PDOException(
                'Database connection failed.'
            );
        }
    }
}