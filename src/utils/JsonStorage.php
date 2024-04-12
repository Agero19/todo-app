<?php 

class JsonStorage {
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function getItem($key) {
        $data = file_get_contents($this->filename);
        $data = json_decode($data, true);
        return $data[$key] ?? null;
    }

    public function addItem($key, $value) {
        $data = file_get_contents($this->filename);
        $data = json_decode($data, true);
        $data[$key] = $value;
        file_put_contents($this->filename, json_encode($data));
    }
}

