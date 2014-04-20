<?php

class Blog extends Eloquent {

    public function __construct($blog_name) {
        $this->blog_name = $blog_name;
    }

    public function authors() {
        $client = new Tumblr\API\Client(Config::get('tumblr.consumer_key'));
        $posts = $client->getBlogPosts($this->blog_name)->posts;
        foreach ($posts as $post) {
            $authors[] = $post->post_author;
        }

        return $authors;
    }

}
