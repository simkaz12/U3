<?php
namespace Acc\DB;

use App\DB\DataBase;
use PDO;

class Maria implements DataBase
{

    private $table, $pdo;

    public function __construct($tableName)
    {
        $host = '127.0.0.1';
        $db = 'kolibris';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $options);
        $this->table = $tableName;
    }



    public function create(array $data): void
    {
        $sql = "
            INSERT INTO {$this->table} (name, last, email, password, sex, idNr, sasId, day, month, year, sum, role)
            VALUES (? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['name'], $data['last'], $data['email'], $data['password'], $data['sex'], $data['idNr'], $data['sasId'], $data['day'], $data['month'], $data['year'], $data['sum'], $data['role']]);
    }


    public function update(int $id, array $data): void
    {
        $sql = "
        UPDATE {$this->table}
        SET sum = ?
        WHERE id = ?
    ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['sum'], $id]);
    }


    public function delete(int $id): void
    {
        $sql = "
            DELETE FROM {$this->table}
            WHERE id = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function show(int $id): array
    {
        $sql = "
            SELECT *
            FROM {$this->table}
            WHERE id = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function showAll(): array
    {
        $sql = "
            SELECT *
            FROM {$this->table}
        ";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }
}