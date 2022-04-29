<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Create Database Command.
 *
 * @package App\Console\Commands
 */
class DbCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Database.';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $database = env('DB_DATABASE');
        $charset  = 'utf8mb4';
        $collate  = 'utf8mb4_unicode_ci';
        try {
            $pdo = $this->getPDOConnection(
                env('DB_HOST'),
                env('DB_PORT'),
                env('DB_USERNAME'),
                env('DB_PASSWORD')
            );

            $pdo->exec(sprintf(
                'CREATE DATABASE `%s` CHARACTER SET %s COLLATE %s;',
                $database,
                $charset,
                $collate
            )) OR die(print_r($pdo->errorInfo(), true));

            $this->info(sprintf('Successfully created %s database', $database));
        } catch (PDOException $exception) {
            $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
        }
    }
    /**
     * Create PDO Connection.
     *
     * @param $host
     * @param $port
     * @param $username
     * @param $password
     *
     * @return PDO
     */
    private function getPDOConnection($host, $port, $username, $password)
    {
        return new \PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
