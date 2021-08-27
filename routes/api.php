<?php


Route::group([

'middleware' => 'api',
'prefix' => 'auth'

], function ($router) {

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::post('me', 'AuthController@me');
Route::get('/me/roles', 'AuthController@myRoles');

});

Route::group(['middleware' => ['jwt.verify']], function() {
	
Route::apiResource('/patient', 'Api\PatientController');
Route::apiResource('/user', 'Api\UserController');
Route::apiResource('/department', 'Api\DepartmentController');
Route::apiResource('/area', 'Api\AreaController');
Route::apiResource('/race', 'Api\RaceController');
Route::apiResource('/district', 'Api\DistrictController');
Route::apiResource('/nationality', 'Api\NationalityController');
Route::apiResource('/locality', 'Api\LocalityController');
Route::apiResource('/pkrc', 'Api\PkrcController');
Route::apiResource('/hospital', 'Api\HospitalController');
Route::apiResource('/vaccine', 'Api\VaccineController');
Route::apiResource('/case', 'Api\CaseRegController');
Route::apiResource('/sampling', 'Api\CaseSamplingController');
Route::apiResource('/cases', 'Api\CaseController');
Route::apiResource('/samples', 'Api\SamplingController');
Route::apiResource('/caselist', 'Api\CaseListController');
Route::apiResource('/reports', 'Api\ManualReportController');
Route::apiResource('/sum', 'Api\ReportSumController');
Route::apiResource('/admission', 'Api\AdmissionController');
Route::apiResource('/admissions', 'Api\AdmissionRecordController');
Route::apiResource('/discharge', 'Api\DischargeController');
Route::apiResource('/discharges', 'Api\DischargeRecordController');
Route::apiResource('/review', 'Api\ReviewController');
Route::apiResource('/reviewbyrn', 'Api\ReviewByRNController');
Route::apiResource('/nursingreports', 'Api\NursingReportController');

Route::get('/admission/kp/{id}', 'Api\AdmissionRecordController@kp_passport');
Route::post('/password/update/{id}', 'Api\UserController@edit');
Route::post('/password/selfupdate/{id}', 'Api\UserController@selfupdate');
Route::get('/items/view/{id}', 'Api\ItemsController@view');
Route::get('/optimum/view/{id}', 'Api\OptimumlevelController@view');
Route::get('/stock/out/{id}', 'Api\OptimumlevelController@showbydept');
Route::get('/items/out/{id}', 'Api\PosController@GetItem');


});
