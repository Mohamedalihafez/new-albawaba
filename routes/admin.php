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
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\Portfolio_experience1Controller;
use App\Http\Controllers\Admin\Portfolio_experience2Controller;
use App\Http\Controllers\Admin\Portfolio_experience3Controller;
use App\Http\Controllers\Admin\ReferencesController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Auth\Dashboard\EducationController;
use App\Http\Controllers\Auth\Dashboard\Work_experienceController;

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
    Route::get('/requests', [UserController::class,"request"])->name('user.request');
    Route::post('/ideas/update',[UserController::class,'ideas'])->name('user.idea');
    Route::post('/users', [UserController::class, 'users'])->name('users');
    Route::post('/usersTenant', [UserController::class, 'usersTenant'])->name('usersTenant');
    Route::post('api/fetch-minor', [UserController::class, 'fetchMainor'])->name('user.fetch');
    Route::get('/upsert/{user?}',[UserController::class,'upsert'])->name('user.upsert');
    Route::get('/filter',[UserController::class,'filter'])->name('user.filter');
    Route::post('/modify',[UserController::class,'modify'])->name('user.modify');
    Route::post('/status/update',[UserController::class,'status'])->name('user.status');
    Route::post('/delete/{user}',[UserController::class,'destroy'])->name('ideas.delete');
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


//slider 
Route::group(['prefix' => 'slider'],function(){
    Route::get('/', [SliderController::class, 'create'])->name('create_slider');
    Route::post('/store_slider', [SliderController::class, 'store'])->name('store_slider');
    Route::get('/manage_slider', [SliderController::class, 'index'])->name('manage_slider');
    Route::get('/edit_slider/{id}', [SliderController::class, 'edit'])->name('edit_slider');
    Route::post('/update_slider/{id}', [SliderController::class, 'update'])->name('update_slider');
    Route::get('/destroy_slider/{id}', [SliderController::class, 'destroy'])->name('destroy_slider');
});

Route::group(['prefix' => 'soclaiMedia'],function(){
    Route::get('/', [SocialMediaController::class, 'create'])->name('create_socialMedia');
    Route::post('/store', [SocialMediaController::class, 'store'])->name('store_socialMedia');
    Route::get('/show', [SocialMediaController::class, 'show'])->name('show_socialMedia');
    Route::get('/edit/{id}', [SocialMediaController::class, 'edit'])->name('edit_socialMedia');
    Route::put('/update/{id}', [SocialMediaController::class, 'update'])->name('update_socialMedia');
    Route::get('/destroy/{id}', [SocialMediaController::class, 'destroy'])->name('destroy_socialMedia');
});
//About 
Route::group(['prefix' => 'about'],function(){
    Route::get('/', [AboutController::class, 'create'])->name('create_about');
    Route::post('/store_about', [AboutController::class, 'store'])->name('store_about');
    Route::get('/manage_about', [AboutController::class, 'index'])->name('manage_about');
    Route::get('/edit_about/{id}', [AboutController::class, 'edit'])->name('edit_about');
    Route::put('/update_about/{id}', [AboutController::class, 'update'])->name('update_about');
    Route::get('/destroy_about/{id}', [AboutController::class, 'destroy'])->name('destroy_about');
});

Route::group(['prefix' => 'skill'],function(){
    Route::get('/', [SkillController::class, 'create'])->name('crate_skill');
    Route::post('/store_skill', [SkillController::class, 'store'])->name('store_skill');
    Route::get('/manage_skill', [SkillController::class, 'index'])->name('manage_skill');
    Route::get('/edit_skill/{id}', [SkillController::class, 'edit'])->name('edit_skill');
    Route::put('/update_skill/{id}', [SkillController::class,'update'])->name('update_skill');
    Route::get('/destroy_skill/{id}', [SkillController::class, 'destroy'])->name('destroy_skill');
});

Route::group(['prefix' => '/portofolio1'],function(){
    Route::get('/crate_port_exp1', [Portfolio_experience1Controller::class, 'create'])->name('crate_port_exp1');
    Route::post('/store_port_exp1', [Portfolio_experience1Controller::class, 'store'])->name('store_port_exp1');
    Route::get('/manage_port_exp1', [Portfolio_experience1Controller::class, 'index'])->name('manage_port_exp1');
    Route::get('/edit_port_exp1/{id}', [Portfolio_experience1Controller::class, 'edit'])->name('edit_port_exp1');
    Route::put('/update_port_exp1/{id}', [Portfolio_experience1Controller::class, 'update'])->name('update_port_exp1');
    Route::get('/destroy_port_exp1/{id}',[Portfolio_experience1Controller::class, 'destroy'])->name('destroy_port_exp1');
});


Route::group(['prefix' => '/portofolio2'],function(){
    Route::get('crate_port_exp2', [Portfolio_experience2Controller::class, 'create'])->name('crate_port_exp2');
    Route::post('store_port_exp2', [Portfolio_experience2Controller::class, 'store'])->name('store_port_exp2');
    Route::get('manage_port_exp2', [Portfolio_experience2Controller::class, 'index'])->name('manage_port_exp2');
    Route::get('edit_port_exp2/{id}', [Portfolio_experience2Controller::class, 'edit'])->name('edit_port_exp2');
    Route::put('update_port_exp2/{id}', [Portfolio_experience2Controller::class, 'update'])->name('update_port_exp2');
    Route::get('destroy_port_exp2/{id}',[Portfolio_experience2Controller::class, 'destroy'])->name('destroy_port_exp2');
});

Route::group(['prefix' => '/portofolio2'],function(){
    Route::get('crate_port_exp3', [Portfolio_experience3Controller::class, 'create'])->name('crate_port_exp3');
    Route::post('store_port_exp3', [Portfolio_experience3Controller::class, 'store'])->name('store_port_exp3');
    Route::get('manage_port_exp3', [Portfolio_experience3Controller::class, 'index'])->name('manage_port_exp3');
    Route::get('edit_port_exp3/{id}', [Portfolio_experience3Controller::class, 'edit'])->name('edit_port_exp3');
    Route::put('update_port_exp3/{id}', [Portfolio_experience3Controller::class, 'update'])->name('update_port_exp3');
    Route::get('destroy_port_exp3/{id}',[Portfolio_experience3Controller::class, 'destroy'])->name('destroy_port_exp3');
});
Route::group(['prefix' => '/portofolio3'],function(){
    Route::get('create_work_exper',[Work_experienceController::class, 'create'])->name('create_work_exper');
    Route::post('store_work_exper',[Work_experienceController::class, 'store'])->name('store_work_exper');
    Route::get('manage_work_exper',[Work_experienceController::class, 'index'])->name('manage_work_exper');
    Route::get('edit_work_exper/{id}',[Work_experienceController::class, 'edit'])->name('edit_work_exper');
    Route::put('update_work_exper/{id}',[Work_experienceController::class, 'update'])->name('update_work_exper');
    Route::get('destroy_work_exper/{id}',[Work_experienceController::class, 'destroy'])->name('destroy_work_exper');
});

Route::group(['prefix' => '/education'],function(){
    Route::get('create_education',[EducationController::class, 'create'])->name('create_education');
    Route::post('store_education',[EducationController::class, 'store'])->name('store_education');
    Route::get('manage_education',[EducationController::class, 'index'])->name('manage_education');
    Route::get('edit_education/{id}',[EducationController::class, 'edit'])->name('edit_education');
    Route::put('update_education/{id}',[EducationController::class, 'update'])->name('update_education');
    Route::get('destroy_education/{id}',[EducationController::class, 'destroy'])->name('destroy_education');
});

Route::group(['prefix' => '/reference'],function(){
    Route::get('create_reference',[ReferencesController::class, 'create'])->name('create_reference');
    Route::post('store_reference',[ReferencesController::class, 'store'])->name('store_reference');
    Route::get('manage_reference',[ReferencesController::class, 'index'])->name('manage_reference');
    Route::get('edit_reference/{id}',[ReferencesController::class, 'edit'])->name('edit_reference');
    Route::put('update_reference/{id}',[ReferencesController::class, 'update'])->name('update_reference');
    Route::get('destroy_reference/{id}',[ReferencesController::class, 'destroy'])->name('destroy_reference');
});

Route::group(['prefix' => '/request'],function(){
    Route::post('store_contact',[RequestController::class, 'store'])->name('store_contact');
    Route::get('manage_contact',[RequestController::class, 'index'])->name('manage_contact');
    Route::get('edit_contact/{id}',[RequestController::class, 'edit'])->name('edit_contact');
    Route::put('update_contact/{id}',[RequestController::class, 'update'])->name('update_contact');
    Route::get('destroy_contact/{id}',[RequestController::class, 'destroy'])->name('destroy_contact');
});


