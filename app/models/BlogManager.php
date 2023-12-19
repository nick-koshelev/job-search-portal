<?php

namespace models;

use DatabaseHelper;
use Exception;

class BlogManager
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseHelper();
    }

    public function createBlog(Blog $blog)
    {
        $this->db->open();
        $this->db->insertData("blogs", $blog->deserialize());
        $this->db->close();
    }

    public function editBlog(Blog $blog)
    {
        $this->db->open();
        $this->db->updateData("blogs", $blog->deserialize(), ["id" => $blog->id]);
        $this->db->close();
    }

    public function getBlogs(): array
    {
        $this->db->open();
        $dbBlogs = $this->db->getData("blogs");
        $this->db->close();

        $blogs = [];
        foreach ($dbBlogs as $index => $blog) {
            $blogs[] = Blog::serialize($blog);
        }

        return $blogs;
    }

    public function getBlog($id): ?Blog
    {
        $this->db->open();
        $blogs = $this->db->getData("blogs", ["id" => $id]);
        $this->db->close();
        return isset($blogs[0]) ? Blog::serialize($blogs[0]) : null;
    }

    public function deleteBlog($id)
    {
        $this->db->open();
        $this->db->deleteData("blogs", ["id" => $id]);
        $this->db->close();
    }
}
