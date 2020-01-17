<?php

Route::get('/books-search', 'Api\Books@searchBook');

Route::apiResource('/books', 'Api\Books');

Route::apiResource('/authors', 'Api\Authors');
