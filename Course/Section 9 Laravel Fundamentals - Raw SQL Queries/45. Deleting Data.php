<?php

// Delete Statement
Route::get('/delete', function () {
    return DB::delete('delete from posts where id = ? ', [5]);
});