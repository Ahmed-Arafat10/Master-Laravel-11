<?php
/*

- let's continue using functions in model class or eloquent in Laravel
- we will use where in select statement

 */

Route::get('/elo_where', function () {
    // get() function return the data as an array
    // take() is like `limit` in SQL
    $res = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();
    return $res;
});