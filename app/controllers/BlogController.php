<?php

class BlogController extends BaseController {

    public function getAuthors($blog_name) {
        $blog = new Blog($blog_name);
        $authors = $blog->authors();
        return Response::json($authors);
    }

}
