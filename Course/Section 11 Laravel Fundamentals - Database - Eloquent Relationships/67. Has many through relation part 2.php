<?php

# in `Country` model class add following method
function posts()
{
    /*
     Countries -> Users -> Posts
    - this is the relation
    - to do that we first pass the `posts` model,  then intermediary table (`users` model)
    - then pass FK of intermediary table (`users` model) [you pass this parameter if you didn't follow Laravel convention]
    - then pass FK of `posts` model [you pass this parameter if you didn't follow Laravel convention]
     */
    // return $this->hasManyThrough('App\Models\Post', 'App\Models\User', 'country_id', 'user_id');

}

# then add the following route
# the Output will be the RECORDS of `posts` table with `user_id` having the same `country_id` passed in the URL
Route::get('user/country/{id}', function ($id) {
    $country = Country::find($id);
    foreach ($country->posts as $item) {
        echo "<pre>";
        echo $item;
    }
});