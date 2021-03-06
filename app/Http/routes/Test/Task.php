<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware' => ['web'],'namespace' => 'Test','prefix'=>'test/task'], function () {
    /**
     * Show Task Dashboard
     */
    Route::get('/', ['as'=>'taskIndex','uses'=>'TaskController@index']);
    /**
     * Add New Task
     */
    Route::post('/save', ['as'=>'taskSave','uses'=>'TaskController@save']);
    /**
     * Delete Task
     */
    Route::delete('/delete/{id}', ['as'=>'taskDelete','uses'=>'TaskController@delete']);
});


//use App\Task;
//use Illuminate\Http\Request;
//Route::group(['middleware' => ['web']], function () {
//    /**
//     * Show Task Dashboard
//     */
//    Route::get('/', function () {
//        var_dump(App::environment());
//        return view('tasks', [
//            'tasks' => Task::orderBy('created_at', 'asc')->get()
//        ]);
//    });
//    /**
//     * Add New Task
//     */
//    Route::post('/task', function (Request $request) {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|max:255',
//        ]);
//        if ($validator->fails()) {
//            return redirect('/')
//                ->withInput()
//                ->withErrors($validator);
//        }
//        $task = new Task;
//        $task->name = $request->name;
//        $task->save();
//        return redirect('/');
//    });
//    /**
//     * Delete Task
//     */
//    Route::delete('/task/{id}', function ($id) {
//        Task::findOrFail($id)->delete();
//        return redirect('/');
//    });
//});