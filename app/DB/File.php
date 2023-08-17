<?php
namespace Acc\DB;

use App\DB\DataBase;

class File implements DataBase
{

    private $fileName, $data;

    public function __construct($fileName)
    {
        $this->file = ROOT . 'data/' . $fileName . '.json';

        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
        $this->data = json_decode(file_get_contents($this->file), 1);
    }

    public function __destruct()
    {
        file_put_contents($this->file, json_encode($this->data));
    }

    public function create(array $data): void
    {
        $id = rand(100000000, 999999999);
        $data['id'] = $id;
        $data['sasId'] = sasId();
        $data['sum'] = 0;
        $data['password'] = md5($data['password']);
        $this->data[] = $data;
    }

    public function update(int $id, array $data): void
    {
        foreach ($this->data as $key => $dataLine) {
            if ($dataLine['id'] == $id) {
                $this->data[$key] = $data;
                $this->data[$key]['id'] = $id;
                return;
            }
        }
    }
    public function plus(int $id, array $data, int $plus): void
    {
        foreach ($this->data as $key => $dataLine) {
            if ($dataLine['id'] == $id) {
                $this->data[$key]['sum'] += $plus;
                $this->data[$key]['id'] = $id;
                return;
            }
        }
    }
    public function minus(int $id, array $data, int $minus): void
    {

        foreach ($this->data as $key => $dataLine) {

            if ($dataLine['id'] == $id) {
                if (($this->data[$key]['sum'] - $minus) <= 0) {
                    $rez = 0;
                } else {
                    $rez = $this->data[$key]['sum'] - $minus;
                }
                $this->data[$key]['sum'] = $rez;
                $this->data[$key]['id'] = $id;
                return;
            }
        }
    }

    public function delete(int $id): void
    {
        foreach ($this->data as $key => $dataLine) {
            if ($dataLine['id'] == $id) {
                unset($this->data[$key]);
                return;
            }
        }
    }

    public function show(int $id): array
    {
        foreach ($this->data as $dataLine) {
            if ($dataLine['id'] == $id) {
                return $dataLine;
            }
        }
    }

    public function showAll(): array
    {
        return $this->data;
    }
}