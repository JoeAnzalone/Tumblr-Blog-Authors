<?php

class BlogController extends BaseController {

    public function getAuthors($blog_name) {
        $blog = new Blog($blog_name);
        $authors = $blog->authors();

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
