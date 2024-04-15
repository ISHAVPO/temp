<?php
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\StuController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\AttendanceController;
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/wel',function(){
//     echo"hello";
// });

// Route::get('/user{id}/{name}',function($id,$name)
// {
//     echo "id=".$id."<br> name=".$name;
// });


// Route::get('/use{id}/{name?}',function($id,$name=null)//  ? for optional parameter it can run with id only or both id and name 
// {
//     echo "id=".$id."<br> name=".$name;
// });


// Route::get('/sir{id}/{name}',function($id,$name)
// {
//     $data=compact('name','id');    //  The compact() function creates an array from variables and their values.
//     print_r($data);
// });

// Route::get('/demo{name?}',function($name=null){
   
//     $tag="<div style='color:red'> gift</div>";
//     $data=compact('name','tag');
//     return view('demo')->with($data);
// });


// Route::get('/body',function(){
//     return view('laravel.body');
// });

Route::get('/login',[FormController::class,'login'])->name('form.login');

Route::get('/ish',[DemoController::class,'demofun']);//if u want to open view through controller
Route::get('/form',[FormController::class,'formfun']);
Route::post('/form',[FormController::class,'formpost']);
Route::get('/form/view',[FormController::class,'formview']);


Route::get('/form/delete/{id}',[FormController::class,'del']);
Route::get('/form/edit/{id}',[FormController::class,'edit'])->name('form.edit');
Route::post('/form/update/{id}',[FormController::class,'update'])->name('form.update');

Route::get('/ajax',[AjaxController::class,'ajaxget']);
Route::post('/ajax',[AjaxController::class,'ajaxpost']);


// Route::post('/ajax', 'AjaxController@ajaxpost')->name('insert.data');

Route::get('/about',function(){
    return view('laravel.About');
});
Route::get('/',function(){
    return view('laravel.LorR');
});



// Route::get('/dash',function(){
//     return view('dash');
// })->middleware('login');


Route::post('/login',[FormController::class,'loginpost']);
Route::any('/logout',[FormController::class,'logout']);

Route::get('/home',[FormController::class,'home']);
Route::get('/feature',[FormController::class,'feature']);
Route::post('/feature',[FormController::class,'featurepost']);

Route::get('/permissions',[FormController::class,'permission']);
Route::post('/permissions',[FormController::class,'permissionpost']);
// Route::get('/stu',[StuController::class,'stuget']);
// Route::post('/stu',[StuController::class,'stupost']);

// Route::get('/stuview',[StuController::class,'view']);
// Route::get('/studel/{id}',[StuController::class,'del']);
// Route::get('/stuupdate/{id}',[StuController::class,'update']);
// Route::post('/stuupdate/{id}',[StuController::class,'updatepost']);
// Route::get('/teach',function(){
//     return view('laravel.teach');
// })->middleware('login');

// Route::get('/stu',function(){
//     return view('laravel.student');
// })->middleware('login');
// Route::get('/monitor',function(){
//     return view('laravel.monitor');
// })->middleware('login');
Route::post('/filter',[FormController::class,'filter']);
    
Route::group(['middleware'=> 'login'],function(){
    
    Route::get('/dash',[FormController::class,'dash']);
    
    
    Route::get('/monitor',[FormController::class,'monitor']); 
    
      
    Route::get('/stu',[FormController::class,'stu']);
    
     
    Route::get('/teach',[FormController::class,'teach']); 
});

Route::get('/create/subject',[CrudController::class,'createsub']); 
Route::post('/create/subject',[CrudController::class,'createsubpost']); 
Route::get('/subjectview',[CrudController::class,'subview']); 
Route::get('/subjectdel/{id}',[CrudController::class,'del']); 
Route::get('/subjectedit/{id}', [CrudController::class, 'edit']); 
Route::post('/subjectupdate/{id}', [CrudController::class, 'update']);
Route::get('/subjectoffered', [CrudController::class, 'subjectoffered']);
Route::get('/subject/status', [CrudController::class, 'subjectstatus']);
Route::get('/modal',[CrudController::class,'subjectstatus']);
Route::post('/modal',[CrudController::class,'subjectstatuspost']);
Route::get('/student/request', [CrudController::class, 'studentRequest']);
Route::get('/approve/{student}/{subject}', [CrudController::class, 'approve'])->name('student.approve');
Route::get('/reject/{student}/{subject}/{reason}', [CrudController::class, 'reject'])->name('student.reject');



Route::get('/attendance',[AttendanceController::class,'attendance']);
Route::get('/markIn',[AttendanceController::class,'markin']);
Route::get('/markOut',[AttendanceController::class,'markout']);

Route::get('/showattendance',[AttendanceController::class,'showattendance']);
// Route::get('/viewallattendance',[AttendanceController::class,'viewallattendance']);