<?php

class HomeController extends BaseController {

    public function showForm()
    {

        if ($blog = Input::get('blog')) {
            return Redirect::to('/' . $blog);
        }

        $this->layout->content = View::make('main');
    }

}
