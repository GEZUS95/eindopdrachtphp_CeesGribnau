<?php
class Article {

    private int $id;
    public string $title;
    public string $content;
    public string $author;
    public string $posted_at;

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
}
?>