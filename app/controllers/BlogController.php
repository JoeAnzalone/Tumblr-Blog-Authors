<?php

class BlogController extends BaseController {

    public function getAuthors($blog_name) {
        $blog = new Blog($blog_name);
        $authors = $blog->authors();

        if ($authors === false) {
            $this->layout->error = 'That blog is not a group blog! Please try again with a group blog.';
            $this->layout->content = View::make('main');
            return;
        }

        $view_variables = array(
            'blog'    => $blog_name,
            'authors' => $authors,
        );

        $this->layout->content = View::make('authors.list', $view_variables);
    }

    public function getAuthorsJson($blog_name) {
        $blog = new Blog($blog_name);
        $authors = $blog->authors();
        return Response::json($authors);
    }
}
