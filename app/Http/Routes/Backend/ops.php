<?php

Route::get('ops', 'OpsController@index')->name('admin.index');

Route::resource('ops/pay_grade', 'Ops\PayGradesController');