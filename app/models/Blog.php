<?php

class Blog extends Eloquent {

    public $postsPerPage = 20;

    public function __construct($blog_name) {
        $this->blog_name = $blog_name;
        $this->client    = $client = new Tumblr\API\Client(
                                        Config::get('tumblr.consumer_key')
                                    );
    }

    private function _totalPosts() {
        $response = $this->client->getBlogInfo($this->blog_name);
        return $response->blog->posts;
    }

    private function _authorsByOffset($offset) {
        $options = array('offset' => $offset);
        $response = $this->client->getBlogPosts($this->blog_name, $options);
        $response->total_posts;

        if (empty($response->posts[0]->post_author)) {
            return false;
        }

        foreach ($response->posts as $post) {
            $authors[] = $post->post_author;
        }
        return $authors;
    }

    public function authors() {
        $total_posts = $this->_totalPosts();
        $pages = round($total_posts / $this->postsPerPage);

        $authors = array();

        for ($i=0; $i < $pages; $i++) {
            $add_authors = $this->_authorsByOffset($i * $this->postsPerPage);
            if (!$add_authors) {
                return false;
            }
            $authors = array_merge($authors, $add_authors);
        }

        $authors = array_unique($authors);
        $authors = array_values($authors);

        return $authors;
    }

}
