<?php

namespace controllers;

use Exception;
use models\Blog;
use models\BlogManager;
use models\User;
use models\UserManager;

require_once "app/controllers/BaseController.php";
require_once "app/models/Blog.php";
require_once "app/models/BlogManager.php";
require_once "app/models/User.php";
require_once "app/models/UserManager.php";

class BlogController extends BaseController
{
    private $blogManager;

    private $userManager;

    public function __construct()
    {
        $this->blogManager = new BlogManager();
        $this->userManager = new UserManager();
    }

    public function indexAction()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] !== "GET")
                throw new Exception();

            $sessionId = $_SESSION["userId"] ?? null;

            $blogs = $this->blogManager->getBlogs();

            $this->render("Blogs", "app/views/blog/index.php", [
                "blogs" => $blogs,
                "userId" => $sessionId
            ]);
        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }

    public function detailsAction($id)
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] !== "GET")
                throw new Exception();

            $blog = $this->blogManager->getBlog($id);
            if (empty($blog))
                throw new Exception();

            $sessionId = $_SESSION["userId"] ?? null;

            $this->render($blog->title, "app/views/blog/details.php", [
                "blog" => $blog,
                "userId" => $sessionId
            ]);
        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }

    public function createAction()
    {
        try {
            $sessionId = $_SESSION["userId"] ?? null;

            if (empty($sessionId) || !$this->userManager->isUserExistById($sessionId))
                throw new Exception();

            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $this->render("Create blog", "app/views/blog/create.php");
            } else {
                $userInput = [
                    "title" => isset($_POST["title"]) ? htmlspecialchars($_POST["title"]) : null,
                    "content" => isset($_POST["content"]) ? htmlspecialchars($_POST["content"]) : null,
                    "author" => isset($_POST["author"]) ? htmlspecialchars($_POST["author"]) : null,
                    "publish_date" => isset($_POST["publish_date"]) ? htmlspecialchars($_POST["publish_date"]) : null,
                    "tags" => isset($_POST["tags"]) ? htmlspecialchars($_POST["tags"]) : null,
                ];

                $this->blogManager->createBlog(Blog::serialize($userInput));
                header("Location: /blog");
                exit();
            }
        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }

    public function editAction($id)
    {
        try {
            $sessionId = $_SESSION["userId"] ?? null;

            if (empty($sessionId) || !$this->userManager->isUserExistById($sessionId))
                throw new Exception();

            $blog = $this->blogManager->getBlog($id);
            if (empty($blog) || $blog->author != $sessionId)
                throw new Exception();

            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $this->render($blog->title, "app/views/blog/edit.php", [
                    "blog" => $blog
                ]);
            } else {
                $userInput = [
                    "id" => $blog->id,
                    "title" => isset($_POST["title"]) ? htmlspecialchars($_POST["title"]) : null,
                    "content" => isset($_POST["content"]) ? htmlspecialchars($_POST["content"]) : null,
                    "author" => $sessionId,
                    "publish_date" => isset($_POST["publish_date"]) ? htmlspecialchars($_POST["publish_date"]) : null,
                    "tags" => isset($_POST["tags"]) ? htmlspecialchars($_POST["tags"]) : null,
                ];

                $blog = Blog::serialize($userInput);
                $this->blogManager->editBlog($blog);
                header("Location: /blog/details?id=" . $blog->id);
                exit();
            }
        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }

    public function deleteAction($id)
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] !== "POST")
                throw new Exception();

            $sessionId = $_SESSION["userId"] ?? null;

            if (empty($sessionId) || !$this->userManager->isUserExistById($sessionId))
                throw new Exception();

            $blog = $this->blogManager->getBlog($id);
            if (empty($blog) || $blog->author != $sessionId)
                throw new Exception();

            $this->blogManager->deleteBlog($id);
            header("Location: /user");
            exit();

        } catch (Exception $e) {
            http_response_code(404);
            $this->render("404 Not found", "app/views/404.php");
        }
    }
}
