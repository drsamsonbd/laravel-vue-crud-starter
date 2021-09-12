<?php
Route::group([

    'middleware' => 'api',
    
    
    ], function () {
//chartApi
Route::apiResource('/admissionChart', 'Api\ChartController');



//statistics APi
Route::get('/statisticsBW', 'Api\StatisticsController@BW')->name('BW');
Route::get('/statisticsBD', 'Api\StatisticsController@BD')->name('BD');
Route::get('/statisticsBBW', 'Api\StatisticsController@BBW')->name('BBW');
Route::get('/statisticsBC', 'Api\StatisticsController@BC')->name('BC');

Route::get('/statisticsTW', 'Api\StatisticsController@TW')->name('TW');
Route::get('/statisticsTD', 'Api\StatisticsController@TD')->name('TD');
Route::get('/statisticsTBW', 'Api\StatisticsController@TBW')->name('TBW');
Route::get('/statisticsTC', 'Api\StatisticsController@TC')->name('TC');


// autoreport
Route::get('/CovidMale', 'Api\DailyCalcController@CovidMale')->name('CovidMale');
Route::get('/CovidFemale', 'Api\DailyCalcController@CovidFemale')->name('CovidFemale');
Route::get('/CovidMalePaeds', 'Api\DailyCalcController@CovidMalePaeds')->name('CovidMalePaeds');
Route::get('/CovidFemalePaeds', 'Api\DailyCalcController@CovidFemalePaeds')->name('CovidFemalePaeds');
Route::get('/stageOne', 'Api\DailyCalcController@stageOne')->name('stageOne');
Route::get('/stageTwo', 'Api\DailyCalcController@stageTwo')->name('stageTwo');
Route::get('/stageThree', 'Api\DailyCalcController@stageThree')->name('stageThree');
Route::get('/stageFour', 'Api\DailyCalcController@stageFour')->name('stageFour');
Route::get('/stageFive', 'Api\DailyCalcController@stageFive')->name('stageFive');
Route::get('/newAdmission', 'Api\DailyCalcController@newAdmission')->name('newAdmission');
Route::get('/stepUp', 'Api\DailyCalcController@stepUp')->name('stepUp');
Route::get('/statDischarges', 'Api\DailyCalcController@statDischarges')->name('statDischarges');
Route::get('/HQ', 'Api\DailyCalcController@HQ')->name('HQ');
Route::get('/WN', 'Api\DailyCalcController@WN')->name('WN');
Route::get('/BWN', 'Api\DailyCalcController@BWN')->name('BWN');

Route::get('/stageOneVaccineOne', 'Api\DailyCalcController@stageOneVaccineOne')->name('stageOneVaccineOne');
Route::get('/stageOneVaccineTwo', 'Api\DailyCalcController@stageOneVaccineTwo')->name('stageOneVaccineTwo');
Route::get('/stageOneVaccineNone', 'Api\DailyCalcController@stageOneVaccineNone')->name('stageOneVaccineNone');
Route::get('/stageTwoVaccineOne', 'Api\DailyCalcController@stageTwoVaccineOne')->name('stageTwoVaccineOne');
Route::get('/stageTwoVaccineTwo', 'Api\DailyCalcController@stageTwoVaccineTwo')->name('stageTwoVaccineTwo');
Route::get('/stageTwoVaccineNone', 'Api\DailyCalcController@stageTwoVaccineNone')->name('stageTwoVaccineNone');

Route::get('/stageThreeVaccineOne', 'Api\DailyCalcController@stageThreeVaccineOne')->name('stageThreeVaccineOne');
Route::get('/stageThreeVaccineTwo', 'Api\DailyCalcController@stageThreeVaccineTwo')->name('stageThreeVaccineTwo');
Route::get('/stageThreeVaccineNone','Api\DailyCalcController@stageThreeVaccineNone')->name('stageThreeVaccineNone');

Route::get('/stageFourVaccineOne', 'Api\DailyCalcController@stageFourVaccineOne')->name('stageFourVaccineOne');
Route::get('/stageFourVaccineTwo', 'Api\DailyCalcController@stageFourVaccineTwo')->name('stageFourccineTwo');
Route::get('/stageFourVaccineNone','Api\DailyCalcController@stageFourVaccineNone')->name('stageFourVaccineNone');
Route::get('/stageFiveVaccineOne', 'Api\DailyCalcController@stageFiveVaccineOne')->name('stageFiveVaccineOne');
Route::get('/stageFiveVaccineTwo', 'Api\DailyCalcController@stageFiveVaccineTwo')->name('stageFiveccineTwo');
Route::get('/stageFiveVaccineNone','Api\DailyCalcController@stageFiveVaccineNone')->name('stageFiveVaccineNone');

});

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

//chartApi
Route::apiResource('/admissionChart', 'Api\ChartController');

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
Route::get('activepkrc', 'Api\PKRCActiveController@showbyPKRC')->name('showbyPKRC');
Route::get('active', 'Api\PKRCActiveController@index');


//update api

Route::get('/admissionskp/{id}', 'Api\AdmissionRecordController@admissionsKP')->name('admissionsKP');;
Route::get('/patientKP/{id}', 'Api\AdmissionRecordController@updatePatient')->name('updatePatient');
Route::get('/patientCase/{id}', 'Api\AdmissionRecordController@updateCase')->name('updateCase');
Route::get('/patientSampling/{id}', 'Api\AdmissionRecordController@updateSampling')->name('updateSampling');
Route::get('/patientkp_passport/{id}', 'Api\AdmissionRecordController@kp_passport')->name('kp_passport');





});

