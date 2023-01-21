    <?php

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/books', 'BooksController@index')->name('books');
Route::post('/books', 'BooksController@add')->name('books.add');
Route::get('books/{id}', function($id) {
    return DB::table('books')->where('id', $id)->first();
});
Route::delete('/books/{id}', 'BooksController@delete')->name('books.delete');

