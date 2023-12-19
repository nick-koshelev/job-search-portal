<?php

namespace models;

class Blog
{
    public $id;

    public $title;

    public $content;

    public $author;

    public $publishDate;

    public $tags;

    public function __construct(
        $title,
        $content,
        $author,
        $publishDate,
        $tags,
        $id = null
    )
    {
        if (!empty($id))
            $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->publishDate = $publishDate;
        $this->tags = $tags;
    }

    public static function serialize($data): Blog
    {
        return new Blog(
            $data["title"],
            $data["content"],
            $data["author"],
            $data["publish_date"],
            $data["tags"],
            $data["id"] ?? null
        );
    }

    public function deserialize(): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "author" => $this->author,
            "publish_date" => $this->publishDate,
            "tags" => $this->tags,
        ];
    }
}
