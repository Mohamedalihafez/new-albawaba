<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CompoundController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ContributorController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ExtraController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ProposalController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AdvertisementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => '/'],function(){
    Route::get('/', [AdminController::class,"dashboard"])->name('dashboard');
    Route::get('/data', [AdminController::class,"getData"])->name('data');
});

Route::group(['prefix' => 'user'],function(){
    Route::get('/', [UserController::class,"index"])->name('user');
    Route::post('/users', [UserController::class, 'users'])->name('users');
    Route::post('/usersTenant', [UserController::class, 'usersTenant'])->name('usersTenant');
    Route::post('api/fetch-minor', [UserController::class, 'fetchMainor'])->name('user.fetch');
    Route::get('/upsert/{user?}',[UserController::class,'upsert'])->name('user.upsert');
    Route::get('/filter',[UserController::class,'filter'])->name('user.filter');
    Route::post('/modify',[UserController::class,'modify'])->name('user.modify');
    Route::post('/status/update',[UserController::class,'status'])->name('user.status');
    Route::post('/delete/{user}',[UserController::class,'destroy'])->name('user.delete');
});

Route::group(['prefix' => 'compound'],function(){
    Route::get('/', [CompoundController::class,"index"])->name('compound');
    Route::post('/compounds', [CompoundController::class, 'compounds'])->name('compounds');
    Route::post('api/fetch-minor', [CompoundController::class, 'fetchMainor'])->name('compound.fetch');
    Route::get('/upsert/{compound?}',[CompoundController::class,'upsert'])->name('compound.upsert');
    Route::get('/filter',[CompoundController::class,'filter'])->name('compound.filter');
    Route::post('/modify',[CompoundController::class,'modify'])->name('compound.modify');
    Route::post('/delete/{compound}',[CompoundController::class,'destroy'])->name('compound.delete');
});

Route::group(['prefix' => 'partner'],function(){
    Route::get('/', [PartnerController::class,"index"])->name('partner');
    Route::post('/partners', [PartnerController::class, 'partners'])->name('partners');
    Route::post('api/fetch-minor', [PartnerController::class, 'fetchMainor'])->name('partner.fetch');
    Route::get('/upsert/{partner?}',[PartnerController::class,'upsert'])->name('partner.upsert');
    Route::get('/filter',[PartnerController::class,'filter'])->name('partner.filter');
    Route::post('/modify',[PartnerController::class,'modify'])->name('partner.modify');
    Route::post('/delete/{partner}',[PartnerController::class,'destroy'])->name('partner.delete');
});

Route::group(['prefix' => 'service'],function(){
    Route::get('/', [ServiceController::class,"index"])->name('service');
    Route::post('/services', [ServiceController::class, 'services'])->name('services');
    Route::post('api/fetch-minor', [ServiceController::class, 'fetchMainor'])->name('service.fetch');
    Route::get('/upsert/{service?}',[ServiceController::class,'upsert'])->name('service.upsert');
    Route::get('/filter',[ServiceController::class,'filter'])->name('service.filter');
    Route::post('/modify',[ServiceController::class,'modify'])->name('service.modify');
    Route::post('/delete/{service}',[ServiceController::class,'destroy'])->name('service.delete');
});

Route::group(['prefix' => 'contributor'],function(){
    Route::get('/', [ContributorController::class,"index"])->name('contributor');
    Route::post('/contributors', [ContributorController::class, 'contributors'])->name('contributors');
    Route::post('api/fetch-minor', [ContributorController::class, 'fetchMainor'])->name('contributor.fetch');
    Route::get('/upsert/{contributor?}',[ContributorController::class,'upsert'])->name('contributor.upsert');
    Route::get('/filter',[ContributorController::class,'filter'])->name('contributor.filter');
    Route::post('/modify',[ContributorController::class,'modify'])->name('contributor.modify');
    Route::post('/delete/{contributor}',[ContributorController::class,'destroy'])->name('contributor.delete');
});

Route::group(['prefix' => 'building'],function(){
    Route::get('/', [BuildingController::class,"index"])->name('building');
    Route::post('/buildings', [BuildingController::class, 'buildings'])->name('buildings');
    Route::get('/upsert/{building?}',[BuildingController::class,'upsert'])->name('building.upsert');
    Route::get('/filter',[BuildingController::class,'filter'])->name('building.filter');
    Route::post('/modify',[BuildingController::class,'modify'])->name('building.modify');
    Route::post('/delete/{building}',[BuildingController::class,'destroy'])->name('building.delete');
});

Route::group(['prefix' => 'orders'],function(){
    Route::get('/', [OrderController::class,"index"])->name('orders');
    Route::get('/upsert/{order?}',[OrderController::class,'upsert'])->name('order.upsert');
    Route::get('/filter',[OrderController::class,'filter'])->name('order.filter');
    Route::post('/modify',[OrderController::class,'modify'])->name('orders.modify');
    Route::post('/delete/{order?}',[OrderController::class,'destroy'])->name('order.delete');
});

Route::group(['prefix' => 'contact'],function(){
    Route::get('/', [ContactController::class,"index"])->name('contacts');
    Route::get('/filter',[ContactController::class,'filter'])->name('contact.filter');
    Route::post('/delete/{contact?}',[ContactController::class,'destroy'])->name('contact.delete');
});

Route::group(['prefix' => 'maintenance'],function(){
    Route::get('/', [MaintenanceController::class,"index"])->name('maintenance');
    Route::post('/building', [MaintenanceController::class, 'building'])->name('maintenance.building');
    Route::post('api/fetch-minor', [MaintenanceController::class, 'fetchMainor'])->name('maintenance.fetch');
    Route::get('/upsert/{maintenance?}',[MaintenanceController::class,'upsert'])->name('maintenance.upsert');
    Route::get('/filter',[MaintenanceController::class,'filter'])->name('maintenance.filter');
    Route::post('/modify',[MaintenanceController::class,'modify'])->name('maintenance.modify');
    Route::post('/delete/{maintenance}',[MaintenanceController::class,'destroy'])->name('maintenance.delete');
});

Route::group(['prefix' => 'settings'],function(){
    Route::get('/',[SettingController::class,'upsert'])->name('setting.upsert');
    Route::post('api/fetch-setting', [SettingController::class, 'fetchImage'])->name('setting.fetch');
    Route::post('/modify',[SettingController::class,'modify'])->name('setting.modify');
    Route::get('/privacy',[SettingController::class,'privacy'])->name('privacy.upsert');
    Route::post('/privacy-modify',[SettingController::class,'privacyModify'])->name('privacy.modify');
    Route::get('/policy',[SettingController::class,'policy'])->name('policy.upsert');
    Route::post('/policy-modify',[SettingController::class,'policyModify'])->name('policy.modify');
      Route::get('/features',[SettingController::class,'features'])->name('features.upsert');
    Route::post('/features-modify',[SettingController::class,'featuresModify'])->name('features.modify');
});

Route::group(['prefix' => 'apartment'],function(){
    Route::get('/', [ApartmentController::class,"index"])->name('apartment');
    Route::post('api/fetch-minor', [ApartmentController::class, 'fetchMainor'])->name('apartment.fetch');
    Route::get('/upsert/{apartment?}',[ApartmentController::class,'upsert'])->name('apartment.upsert');
    Route::get('/filter',[ApartmentController::class,'filter'])->name('apartment.filter');
    Route::post('/apartments', [ApartmentController::class, 'apartments'])->name('apartments');
    Route::post('/modify',[ApartmentController::class,'modify'])->name('apartment.modify');
    Route::post('/delete/{apartment}',[ApartmentController::class,'destroy'])->name('apartment.delete');
});

Route::group(['prefix' => 'profile'],function(){
    Route::get('/', [UserController::class,"profile"])->name('profile');
    Route::post('/update', [UserController::class,"update"])->name('profile.update');
});

Route::group(['prefix' => 'tenant'],function(){
    Route::get('/', [TenantController::class,"index"])->name('tenant');
    Route::get('/upsert/{tenant?}',[TenantController::class,'upsert'])->name('tenant.upsert');
    Route::get('/filter',[TenantController::class,'filter'])->name('tenant.filter');
    Route::post('/modify',[TenantController::class,'modify'])->name('tenant.modify');
    Route::post('/delete/{tenant}',[TenantController::class,'destroy'])->name('tenant.delete');
});

Route::group(['prefix' => 'vip'],function(){
    Route::get('/', [ExtraController::class,"index"])->name('vip');
    Route::post('api/fetch-category', [ExtraController::class, 'fetchCategory'])->name('vip.fetch');
    Route::get('/upsert/{vip?}',[ExtraController::class,'upsert'])->name('vip.upsert');
    Route::get('/filter',[ExtraController::class,'filter'])->name('vip.filter');
    Route::post('/modify',[ExtraController::class,'modify'])->name('vip.modify');
    Route::post('/delete/{vip}',[ExtraController::class,'destroy'])->name('vip.delete');
});

Route::group(['prefix' => 'extra'],function(){
    Route::get('/', [ExtraController::class,"extra"])->name('extra');
    Route::post('api/fetch-category', [ExtraController::class, 'fetchCategory'])->name('extra.fetch');
    Route::get('/upsert/{extra?}',[ExtraController::class,'upsertExtra'])->name('extra.upsert');
    Route::get('/filter',[ExtraController::class,'filterExtra'])->name('extra.filter');
    Route::post('/modify',[ExtraController::class,'modify'])->name('extra.modify');
    Route::post('/delete/{extra}',[ExtraController::class,'destroy'])->name('extra.delete');
});



Route::group(['prefix' => 'item'],function(){
    Route::get('/', [ItemController::class,"index"])->name('item');
    Route::post('api/fetch-minor', [ItemController::class, 'fetchMainor'])->name('item.fetch');
    Route::get('/upsert/{item?}',[ItemController::class,'upsert'])->name('item.upsert');
    Route::get('/filter',[ItemController::class,'filter'])->name('item.filter');
    Route::post('/modify',[ItemController::class,'modify'])->name('item.modify');
    Route::post('/delete/{item}',[ItemController::class,'destroy'])->name('item.delete');
});

Route::group(['prefix' => 'region'],function(){
    Route::get('/', [RegionController::class,"index"])->name('region');
    Route::get('/upsert/{region?}',[RegionController::class,'upsert'])->name('region.upsert');
    Route::get('/filter',[RegionController::class,'filter'])->name('region.filter');
    Route::post('/modify',[RegionController::class,'modify'])->name('region.modify');
    Route::post('/delete/{region}',[RegionController::class,'destroy'])->name('region.delete');
});

Route::group(['prefix' => 'city'],function(){
    Route::get('/', [CityController::class,"index"])->name('city');
    Route::get('/upsert/{city?}',[CityController::class,'upsert'])->name('city.upsert');
    Route::get('/filter',[CityController::class,'filter'])->name('city.filter');
    Route::post('/modify',[CityController::class,'modify'])->name('city.modify');
    Route::post('/delete/{city}',[CityController::class,'destroy'])->name('city.delete');
});

Route::group(['prefix' => 'proposal'],function(){
    Route::get('/', [ProposalController::class,"index"])->name('proposal');
    Route::get('/upsert/{proposal?}',[ProposalController::class,'upsert'])->name('proposal.upsert');
    Route::post('/add/{proposal?}',[ProposalController::class,'add'])->name('proposal.add');
    Route::get('/filter',[ProposalController::class,'filter'])->name('proposal.filter');
    Route::post('/modify',[ProposalController::class,'modify'])->name('proposal.modify');
    Route::post('/delete/{proposal}',[ProposalController::class,'destroy'])->name('proposal.delete');
});

Route::group(['prefix' => 'advertisementadmin'],function(){
    Route::get('/', [AdvertisementController::class,"index"])->name('advertisementadmin')->can('view-advertisement');
    Route::get('/upsert/{advertisementadmin?}',[AdvertisementController::class,'upsert'])->name('advertisementadmin.upsert')->can('upsert-advertisement');
    Route::get('/filter',[AdvertisementController::class,'filter'])->name('advertisementadmin.filter')->can('upsert-advertisement');
    Route::get('/filter-item',[AdvertisementController::class,'itemFilter'])->name('items');
    Route::post('/modify',[AdvertisementController::class,'modify'])->name('advertisementadmin.modify')->can('view-advertisement');
    Route::post('/status/update',[AdvertisementController::class,'status'])->name('advertisementadmin.status');
    Route::post('/delete/{advertisementadmin}',[AdvertisementController::class,'destroy'])->name('advertisementadmin.delete')->can('delete-advertisement');
});

Route::group(['prefix' => 'category'],function(){
    Route::get('/', [CategoryController::class,"index"])->name('category');
    Route::post('api/fetch-minor', [CategoryController::class, 'fetchMainor'])->name('category.fetch');
    Route::get('/upsert/{category?}',[CategoryController::class,'upsert'])->name('category.upsert');
    Route::get('/filter',[CategoryController::class,'filter'])->name('category.filter');
    Route::post('/modify',[CategoryController::class,'modify'])->name('category.modify');
    Route::post('/delete/{category}',[CategoryController::class,'destroy'])->name('category.delete');
});