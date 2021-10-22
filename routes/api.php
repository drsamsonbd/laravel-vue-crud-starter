<?php
Route::group([

    'middleware' => 'api',
    
    
    ], function () {
//chartApi
Route::apiResource('/admissionChart', 'Api\ChartController');
Route::get('/dischargeChart', 'Api\ChartController@discharge');


//statistics APi
Route::get('/statisticsBW', 'Api\StatisticsController@BW')->name('BW');
Route::get('/statisticsBD', 'Api\StatisticsController@BD')->name('BD');
Route::get('/statisticsBBW', 'Api\StatisticsController@BBW')->name('BBW');
Route::get('/statisticsBC', 'Api\StatisticsController@BC')->name('BC');

Route::get('/statisticsTW', 'Api\StatisticsController@TW')->name('TW');
Route::get('/statisticsTD', 'Api\StatisticsController@TD')->name('TD');
Route::get('/statisticsTBW', 'Api\StatisticsController@TBW')->name('TBW');
Route::get('/statisticsTC', 'Api\StatisticsController@TC')->name('TC');

Route::apiResource('/inpatient/cencus/noncovid', 'Api\InpatientCencusController');
Route::apiResource('/inpatient/cencus/covid', 'Api\CovidInpatientCencusController');

Route::apiResource('/inpatient/cencus/inpatient', 'Api\getCensusController');
Route::get('/inpatient/cencus/discipline', 'Api\getCensusController@active')->name('active');
Route::get('/inpatient/cencus/discharge', 'Api\getCensusController@discharge')->name('discharge');
Route::get('/inpatient/cencus/sameDay', 'Api\getCensusController@sameDay')->name('sameDay');
Route::apiResource('/inpatient/cencus/pui', 'Api\PuiInpatientCencusController');
Route::apiResource('/inpatient/cencus/sari', 'Api\SariInpatientCencusController');
Route::get('/inpatient/cencus/test', 'Api\TestCensusController@showbyWard')->name('showbyWard');
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

Route::get('/PUIMale', 'Api\DailyCalcController@PUIMale')->name('PUIMale');
Route::get('/PUIFemale', 'Api\DailyCalcController@PUIFemale')->name('PUIFemale');
Route::get('/PUIMalePaeds', 'Api\DailyCalcController@PUIMalePaeds')->name('PUIMalePaeds');
Route::get('/PUIFemalePaeds', 'Api\DailyCalcController@PUIFemalePaeds')->name('PUIFemalePaeds');



Route::get('/newAdmissionPUI', 'Api\DailyCalcController@newAdmissionPUI')->name('newAdmissionPUI');
Route::get('/stepUpPUI', 'Api\DailyCalcController@stepUpPUI')->name('stepUpPUI');
Route::get('/statDischargesPUI', 'Api\DailyCalcController@statDischargesPUI')->name('statDischargesPUI');
Route::get('/BOR', 'Api\DailyCalcController@BOR')->name('BOR');


//LAPORAN DASHBOARD
Route::get('/laporanDewasaLelaki', 'Api\LaporanHarianController@DewasaLelaki')->name('DewasaLelaki');
Route::get('/laporanDewasaPerempuan', 'Api\LaporanHarianController@DewasaPerempuan')->name('DewasaPerempuan');
Route::get('/laporanDewasaPerempuanEmas', 'Api\LaporanHarianController@DewasaPerempuanEmas')->name('DewasaPerempuanEmas');
Route::get('/laporanDewasaLelakiEmas', 'Api\LaporanHarianController@DewasaLelakiEmas')->name('DewasaLelakiEmas');
Route::get('/laporanKanakLelaki', 'Api\LaporanHarianController@KanakLelaki')->name('KanakLelaki');
Route::get('/laporanKanakPerempuan', 'Api\LaporanHarianController@KanakPerempuan')->name('KanakPerempuan');
Route::get('/laporanLelaki', 'Api\LaporanHarianController@Lelaki')->name('Lelaki');
Route::get('/laporanPerempuan', 'Api\LaporanHarianController@Perempuan')->name('Perempuan');
Route::get('/laporanJumlah', 'Api\LaporanHarianController@Jumlah')->name('Jumlah');
Route::get('/laporanJumlahHarian', 'Api\LaporanHarianController@JumlahHarian')->name('JumlahHarian');
Route::get('/laporanDischarges', 'Api\LaporanHarianController@Discharges')->name('Discharges');
Route::get('/laporanStepUp', 'Api\LaporanHarianController@StepUp')->name('StepUp');
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
Route::get('/patient/search/{id}', 'Api\SearchPatientController@showbyKPName');
Route::get('/patient/kp/{id}', 'Api\SearchPatientController@showbyKP');

Route::apiResource('/user', 'Api\UserController');
Route::apiResource('/department', 'Api\DepartmentController');
Route::apiResource('/area', 'Api\AreaController');
Route::apiResource('/race', 'Api\RaceController');
Route::apiResource('/district', 'Api\DistrictController');
Route::apiResource('/nationality', 'Api\NationalityController');
Route::apiResource('/locality', 'Api\LocalityController');
Route::apiResource('/pkrc', 'Api\PkrcController');

Route::apiResource('/ward', 'Api\WardController');
Route::apiResource('/bed', 'Api\BedController');
Route::get('/bed/ward/{id}', 'Api\BedController@showbyWard')->name('showbyWard');
Route::apiResource('/bed_discipline', 'Api\BedDisciplineController');
Route::patch('/bed_discipline/status/{id}', 'Api\BedDisciplineController@updateStatus')->name('updateStatus');
Route::apiResource('/wardbed', 'Api\WardBedController');
Route::get('/wardbedActive', 'Api\WardBedActiveController@showbyWard')->name('showbyWard');
Route::apiResource('/wardbedActives', 'Api\WardBedActiveController');
Route::get('/wardbedActive/count', 'Api\WardBedActiveController@count')->name('count');
Route::apiResource('/discipline', 'Api\DisciplineController');
Route::apiResource('/diagnosis', 'Api\DiagnosisController');
Route::patch('/diagnosis/status/{id}', 'Api\DiagnosisController@updateStatus')->name('updateStatus');

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
Route::apiResource('/vaccinestatus', 'Api\VaccinationStatusController');

Route::apiResource('/WardAdmission', 'Api\WardAdmissionController');
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
Route::get('/activeWard', 'Api\WardActiveController@showbyWard')->name('showbyWard');
Route::get('/active/ward', 'Api\WardActiveController@index');

//update api

Route::get('/admissionskp/{id}', 'Api\AdmissionRecordController@admissionsKP')->name('admissionsKP');;
Route::get('/patientKP/{id}', 'Api\AdmissionRecordController@updatePatient')->name('updatePatient');
Route::get('/patientCase/{id}', 'Api\AdmissionRecordController@updateCase')->name('updateCase');
Route::get('/patientSampling/{id}', 'Api\AdmissionRecordController@updateSampling')->name('updateSampling');
Route::get('/patientkp_passport/{id}', 'Api\AdmissionRecordController@kp_passport')->name('kp_passport');


//inpatient routes
Route::apiResource('/WardAdmissionRecord', 'Api\WardAdmissionRecordController');
Route::get('/WardAdmissionRecord/Discharge/{id}', 'Api\WardAdmissionRecordController@showRN')->name('showRN');
Route::get('/SearchWardAdmissionRecord', 'Api\WardAdmissionRecordController@search')->name('search');
Route::get('/SearchWardDischargeRecord', 'Api\WardAdmissionRecordController@searchDischarge')->name('searchDischarge');
Route::get('/SearchRecord/{id}', 'Api\WardAdmissionRecordController@searchKPRN')->name('searchKPRN');
Route::get('/wardadmissionskp/{id}', 'Api\WardAdmissionRecordController@admissionsKP')->name('admissionsKP');
Route::get('/inpatientKP/{id}', 'Api\WardAdmissionRecordController@updatePatient')->name('updatePatient');
Route::get('/inpatientSampling/{id}', 'Api\WardAdmissionRecordController@updateSampling')->name('updateSampling');
Route::apiResource('/inpatient/discharge', 'Api\WardDischargeController');
Route::apiResource('/inpatient/discharges', 'Api\WardDischargesRecordController');
Route::get('/inpatient/dischargelist', 'Api\WardDischargesRecordController@showbyWard')->name('showbyWard');
Route::apiResource('/nursing/census', 'Api\NursingCensusReportController');



});

