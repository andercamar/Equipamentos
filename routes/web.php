<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix'=> 'admin/ajax'],function(){
    $this->any('monthsPrint', 'DashboardPrinterController@monthsPrint')->name('printer.monthsPrint');
    $this->any('monthPrint', 'DashboardPrinterController@monthPrint')->name('printer.monthPrint');
    $this->any('colorPrint', 'DashboardPrinterController@colorPrint')->name('printer.colorPrint');
    $this->any('mostPrinter', 'DashboardPrinterController@mostPrinter')->name('printer.mostPrinter');
    $this->any('valuePrinter', 'DashboardPrinterController@valuePrinter')->name('printer.valuePrinter');
    $this->any('typePrint', 'DashboardPrinterController@typePrint')->name('printer.typePrint');
    $this->any('peoplePrint', 'DashboardPrinterController@peoplePrint')->name('printer.peoplePrint');
    $this->any('peopleValuePrint', 'DashboardPrinterController@peopleValuePrint')->name('printer.peopleValuePrint');
    $this->any('namePrinter', 'DashboardPrinterController@namePrinter')->name('printer.namePrinter');
});
$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix'=> 'admin'], function(){
    //________________________________PASSWORD_____________________________________________
    $this->any('password/search', 'PasswordController@search')->name('password.search');
    $this->put('password/{id}', 'PasswordController@update')->name('password.update');
    $this->get('password/{id}/edit', 'PasswordController@edit')->name('password.edit');
    $this->delete('password/{id}', 'PasswordController@destroy')->name('password.destroy');
    $this->post('password/create', 'PasswordController@store')->name('password.store');
    $this->get('password/create', 'PasswordController@create')->name('password.create');
    $this->get('password/{id}', 'PasswordController@show')->name('password.show');
    $this->get('password', 'PasswordController@index')->name('password');

    //________________________________EQUIPAMENTO___________________________________________
    $this->any('computer/search', 'ComputerController@search')->name('computer.search');
    $this->put('computer/{id}', 'ComputerController@update')->name('computer.update');
    $this->get('computer/{id}/edit', 'ComputerController@edit')->name('computer.edit');
    $this->delete('computer/{id}', 'ComputerController@destroy')->name('computer.destroy');
    $this->post('computer/create', 'ComputerController@store')->name('computer.store');
    $this->get('computer/create', 'ComputerController@create')->name('computer.create');
    $this->get('computer/{id}', 'ComputerController@show')->name('computer.show');
    $this->get('computer/active/{id}', 'ComputerController@active')->name('computer.active');
    $this->get('computer/deactive/{id}', 'ComputerController@deactive')->name('computer.deactive');
    $this->get('computer', 'ComputerController@index')->name('computer');

    //________________________________HARDWARE___________________________________________
    $this->any('hardware/search', 'HardwareController@search')->name('hardware.search');
    $this->put('hardware/{id}', 'HardwareController@update')->name('hardware.update');
    $this->get('hardware/{id}/edit', 'HardwareController@edit')->name('hardware.edit');
    $this->delete('hardware/{id}', 'HardwareController@destroy')->name('hardware.destroy');
    $this->post('hardware/create', 'HardwareController@store')->name('hardware.store');
    $this->get('hardware/create', 'HardwareController@create')->name('hardware.create');
    $this->get('hardware/{id}', 'HardwareController@show')->name('hardware.show');
    $this->get('hardware', 'HardwareController@index')->name('hardware');

    //________________________________MODELO___________________________________________
    $this->any('model/search', 'ComputerModelController@search')->name('model.search');
    $this->put('model/{id}', 'ComputerModelController@update')->name('model.update');
    $this->get('model/{id}/edit', 'ComputerModelController@edit')->name('model.edit');
    $this->delete('model/{id}', 'ComputerModelController@destroy')->name('model.destroy');
    $this->post('model/create', 'ComputerModelController@store')->name('model.store');
    $this->get('model/create', 'ComputerModelController@create')->name('model.create');
    $this->get('model/{id}', 'ComputerModelController@show')->name('model.show');
    $this->get('model', 'ComputerModelController@index')->name('model');

    //________________________________LICENCA___________________________________________
    $this->any('license/search', 'LicenseController@search')->name('license.search');
    $this->put('license/{id}', 'LicenseController@update')->name('license.update');
    $this->get('license/{id}/edit', 'LicenseController@edit')->name('license.edit');
    $this->delete('license/{id}', 'LicenseController@destroy')->name('license.destroy');
    $this->post('license/create', 'LicenseController@store')->name('license.store');
    $this->get('license/create', 'LicenseController@create')->name('license.create');
    $this->get('license/{id}', 'LicenseController@show')->name('license.show');
    $this->get('license/active/{id}', 'LicenseController@active')->name('license.active');
    $this->get('license/deactive/{id}', 'LicenseController@deactive')->name('license.deactive');
    $this->get('license', 'LicenseController@index')->name('license');

    //________________________________FABRICANTE_______________________________
    $this->any('manufacturer/search', 'ManufacturerController@search')->name('manufacturer.search');
    $this->put('manufacturer/{id}', 'ManufacturerController@update')->name('manufacturer.update');
    $this->get('manufacturer/{id}/edit', 'ManufacturerController@edit')->name('manufacturer.edit');
    $this->delete('manufacturer/{id}', 'ManufacturerController@destroy')->name('manufacturer.destroy');
    $this->post('manufacturer/create', 'ManufacturerController@store')->name('manufacturer.store');
    $this->get('manufacturer/create', 'ManufacturerController@create')->name('manufacturer.create');
    $this->get('manufacturer/{id}', 'ManufacturerController@show')->name('manufacturer.show');
    $this->get('manufacturer', 'ManufacturerController@index')->name('manufacturer');

    //________________________________FORNECEDOR_______________________________
    $this->any('vendor/search', 'VendorController@search')->name('vendor.search');
    $this->put('vendor/{id}', 'VendorController@update')->name('vendor.update');
    $this->get('vendor/{id}/edit', 'VendorController@edit')->name('vendor.edit');
    $this->delete('vendor/{id}', 'VendorController@destroy')->name('vendor.destroy');
    $this->post('vendor/create', 'VendorController@store')->name('vendor.store');
    $this->get('vendor/create', 'VendorController@create')->name('vendor.create');
    $this->get('vendor/{id}', 'VendorController@show')->name('vendor.show');
    $this->get('vendor', 'VendorController@index')->name('vendor');

    //________________________________DEPARTAMENT____________________________________________
    $this->any('departament/search', 'DepartamentController@search')->name('departament.search');
    $this->put('departament/{id}', 'DepartamentController@update')->name('departament.update');
    $this->get('departament/{id}/edit', 'DepartamentController@edit')->name('departament.edit');
    $this->delete('departament/{id}', 'DepartamentController@destroy')->name('departament.destroy');
    $this->post('departament/create', 'DepartamentController@store')->name('departament.store');
    $this->get('departament/create', 'DepartamentController@create')->name('departament.create');
    $this->get('departament/{id}', 'DepartamentController@show')->name('departament.show');
    $this->get('departament', 'DepartamentController@index')->name('departament');

    //________________________________SOFTWARE___________________________________________
    $this->any('software/search', 'SoftwareController@search')->name('software.search');
    $this->put('software/{id}', 'SoftwareController@update')->name('software.update');
    $this->get('software/{id}/edit', 'SoftwareController@edit')->name('software.edit');
    $this->delete('software/{id}', 'SoftwareController@destroy')->name('software.destroy');
    $this->post('software/create', 'SoftwareController@store')->name('software.store');
    $this->get('software/create', 'SoftwareController@create')->name('software.create');
    $this->get('software/{id}', 'SoftwareController@show')->name('software.show');
    $this->get('software/active/{id}', 'SoftwareController@active')->name('software.active');
    $this->get('software/deactive/{id}', 'SoftwareController@deactive')->name('software.deactive');
    $this->get('software', 'SoftwareController@index')->name('software');

    //________________________________PRINT____________________________________________
    $this->any('printer/dashboard', 'DashboardPrinterController@index')->name('printer.index');
    $this->any('printer/report', 'PrinterController@report')->name('printer.report');
    $this->any('printer/search', 'PrinterController@search')->name('printer.search');
    $this->put('printer/{id}', 'PrinterController@update')->name('printer.update');
    $this->get('printer/{id}/edit', 'PrinterController@edit')->name('printer.edit');
    $this->post('printer/create', 'PrinterController@store')->name('printer.store');
    $this->get('printer/create', 'PrinterController@create')->name('printer.create');
    $this->get('printer/{id}', 'PrinterController@show')->name('printer.show');
    $this->get('printer/active/{id}', 'PrinterController@active')->name('printer.active');
    $this->get('printer/deactive/{id}', 'PrinterController@deactive')->name('printer.deactive');
    $this->get('/printer', 'PrinterController@index')->name('printer');

    //________________________________HOME_____________________________________________
    $this->get('/', 'AdminController@index')->name('admin');
    // $this->get('/', 'PasswordController@index')->name('admin');
});

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix'=> 'admin/config'], function(){

    $this->post('profile', 'ConfigController@profileUpdate')->name('profile.update');
    $this->get('profile', 'ConfigController@profile')->name('profile');

    $this->any('users/search', 'UserController@search')->name('users.search');
    $this->put('users/{id}', 'UserController@update')->name('users.update');
    $this->get('users/{id}/edit', 'UserController@edit')->name('users.edit');
    $this->delete('users/{id}', 'UserController@destroy')->name('users.destroy');
    $this->post('users/create', 'UserController@store')->name('users.store');
    $this->get('users/create', 'UserController@create')->name('users.create');
    $this->get('users/{id}', 'UserController@show')->name('users.show');
    $this->get('users', 'UserController@index')->name('users.index');
});



$this->get('/', 'Site\SiteController@index')->name('home');


Auth::routes();
