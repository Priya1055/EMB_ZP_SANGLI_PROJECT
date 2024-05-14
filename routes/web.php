<?php

use App\Http\Controllers\Trial;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ABController;
use App\Http\Controllers\AAOController;
use App\Http\Controllers\EmbController;
use App\Http\Controllers\SdcController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\DeputyController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ChecklistController;


//Trupti
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\GotoEmbController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\AbstractController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FundHeadController;

//Priyanka
use App\Http\Controllers\UserpermController;
use App\Http\Controllers\AgencyViewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ExecutiveEngineerCnt;
use App\Http\Controllers\WorkMasterController;
use App\Http\Controllers\AgencyCheckController;
use App\Http\Controllers\CustomloginController;
use App\Http\Controllers\SubdivisionController;
use App\Http\Controllers\DivisionViewController;
use App\Http\Controllers\ExecutiveEngController;
use App\Http\Controllers\MaterialConsController;
use App\Http\Controllers\JuniorEngineerController;
use App\Http\Controllers\WorkMasterViewController;
use App\Http\Controllers\ViewSubdivisionController;
use App\Http\Controllers\ChecklistReportController;


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
// 
// Route::get('/', function () {
//     return view('agency');
//  });

Route::get('/', function () {
  return view('auth.login');
});


//user module
Route::get('listuser',[UserController::class,'indexleftjoin']);
// insert user
Route::view('InsertUser','user');
Route::get('InsertUser',[UserController::class,'leftjoinuser']);




//userpermision module
Route::view('userpermision','userpermision');
Route::View('trial','trial'); // Define a route for displaying the form
Route::post('trial', [Trial::class, 'upload'])->name('trial.upload'); // Define a route to handle the file upload
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


 Route::get('/login', function () {
  return view('auth.login');
});




Route::post('/login', [CustomloginController::class, 'authenticate'])->name('authenticate');
// Route::post('login', 'login');

// web.php

Route::group(['middleware' => 'auth.redirect'], function () {
  // Your protected routes here

//User
Route::get('adduser',[UserController::class,'createview']); // View User Form
Route::post('adduser',[UserController::class,'storeUsersData']); // Submit Records In Tb
Route::view('userslist', 'users')->name('users');//For List View
Route::get('userslist',[UserController::class,'allrecords']);
Route::get('edituser/{id}',[UserController::class,'editUsersData']); // Submit Records In Tb
Route::post('/Edituser', [UserController::class, 'storeeditUsersData'])->name('Edituser');
Route::POST('AddUsersgetDesignations',[UserController::class,'FunGetRelatedDesignation']); // View User Form
Route::delete('RouteDeleteUser/{id}', [UserController::class, 'FunDeleteUser'])->name('RouteDeleteUser');


// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//User permission
Route::get('addperm',[UserpermController::class,'createview']);// View User Form
   Route::post('addpermission',[UserpermController::class,'InsertTB']);//Save Data
   Route::post('ajaxaddpermission', [UserpermController::class, 'ajaxRequestcreateview'])->name('ajaxaddpermission');
   Route::post('ajaxUserPermission', [UserpermController::class, 'ajaxRequestUserPermission'])->name('ajaxUserPermission');
   Route::post('ajaxRemovePermission', [UserpermController::class, 'ajaxRemoveUserPermission'])->name('ajaxRemovePermission');

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


  Route::get('/add',[UserController::class,'addForm'])->name('add.user');

  // Route::get('/add',[UserpermController::class,'createview'])->name('add.user');
  
  // Define a route for form submission
  Route::post('/register',[UserController::class, 'register']);
  
//division----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

Route::get('get-regions', [DivisionController::class, 'getRegions']);
Route::get('get-circles', [DivisionController::class, 'getCircles']);
Route::get('get-divisions', [DivisionController::class, 'getDivisions']);

//data insert division
Route::post('divisioncreate',[DivisionController::class, 'funCreate']); //For List View

// list division in new button
Route::view('division', 'division');


 //list division data

 Route::get('listdivision',[DivisionController::class, 'index1'])->name('index1');
 
 
 //Edit

//  Route::view('editdivision', 'editdivision');

// get edit data division
 Route::get('editdivision/{id}', [DivisionController::class, 'edit']);
//  update edit data division
 Route::put('update-division/{id}', [DivisionController::class, 'update']);



//view
Route::get('view_division/{id}',[DivisionController::class, 'viewdivisiondata']);
Route::delete('delete_division/{id}', [DivisionController::class, 'deletedivision'])->name('delete_division');


//delete
//  Route::get('delete_division/{id}', [DivisionController::class, 'deletedivision']);

// get the data division
// Route::get('listdivision', [DivisionController::class, 'del'])->name('del');
// // delete the data division
// Route::delete('listdivision/{id}', [DivisionController::class, 'deletedivision'])->name('deletedivision');




//Agency----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



//data insert in agency table
 Route::view('agency','agency');
//  Route::get('agencycreate',[AgencyController::class, 'funcreateagency']);

  Route::post('agencycreate',[AgencyController::class, 'funcreateagency']);

//   view  listagency data
 Route::get('listagencies',[AgencyController::class, 'index']);


 //Edit agency

// get edit data agency
 Route::get('editagency/{id}', [AgencyController::class, 'edit']);
//  update edit data agency
 Route::put('update_agency/{id}', [AgencyController::class, 'update']);



 //View agency

//  Route::get('view_agency/{id}',[AgencyController::class, 'viewagencydata']);
 Route::get('view_agency/{id}',[AgencyController::class,'viewagencydata']);



 //delete agency

 //get delete data agency
 Route::get('listagencies', [AgencyController::class, 'del'])->name('del');
 //delete ageency data
 Route::delete('listagencies/{id}', [AgencyController::class, 'deleteagency'])->name('deleteagency');
// Route::delete('listagencies/{id}', [AgencyController::class, 'restoreagency'])->name('restoreagency');


// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// Junior Engineer



//listdivisions
Route::get('/get-divisions', [JuniorEngineerController::class, 'getDivisions']);
//list subdivivsions
Route::get('/get-subdivisions', [JuniorEngineerController::class, 'getSubdivisions']);

// insert junior engineer data
Route::post('insertjuniorengineer',[JuniorEngineerController::class, 'insertjuniorengineer']);


//pf number flag route
Route::post('update-pf-flag',[JuniorEngineerController::class, 'pfflag']);

// view list of junior engineer
Route::get('listjuniorengineer',[JuniorEngineerController::class, 'listjunioreengineer']);

// new data add onlist in new button
// Route::view('juniorengineer','juniorengineer');
Route::get('juniorengineerdropdown',[JuniorEngineerController::class, 'FunDropdownselectInsert']);




// Edit and update junior Engineer



// get edit data junior engineer
Route::get('editjuniorengineer/{id}',[JuniorEngineerController::class, 'editjuniorengineer']);
// update edit data junior engineer
Route::put('updatejuniorengineer/{id}' ,[JuniorEngineerController::class, 'updatejuniorengineer']);




// view data of junior engineers

Route::get('view_juniorengineer/{id}',[JuniorEngineerController::class, 'viewjuniorengineer']);



// Delete Junior engineer 

// get delete data junior engineer
Route::get('listjuniorengineer',[JuniorEngineerController::class, 'getalltablerows']);

// delete data junior engineer
Route::delete('listjuniorengineer/{id}', [JuniorEngineerController::class,'deletejuniorengineer'])->name('deletejuniorengineer');




// Fund-Head-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



Route::view('fundhead','fundhead');


// insert fund head data route

Route::post('insertfundhead',[FundHeadController::class, 'insertfundhead']);


// list data of fund head route
Route::get('listfundhead',[FundHeadController::class,'listfundhead']);



// edit and update the fundhead routes

// edit route
Route::get('editfundhead/{id}',[FundHeadController::class,'editfundhead']);

// update route
Route::put('updatefundhead/{id}',[FundHeadController::class,'updatefundhead']);



// view fund head route
Route::get('view_fundhead/{id}', [FundHeadController::class, 'viewfundhead']);


// get all table rows for delte in fund head
Route::get('listfundhead',[FundHeadController::class, 'getalltablerowsfundhead']);


// delete the fund head data routes
Route::delete('listfundhead/{id}', [FundHeadController::class,'deletefundhead'])->name('deletefundhead');





// e-mb---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



Route::view('listemb','listemb');

// fetch the workmaster data in list emb route

// Route::post('listemb',[EmbController::class, 'workmasterdata'])->name('workmasterdata');
 Route::get('listemb/{Work_Id}',[EmbController::class, 'workmasterdata']);

//Route   section2  data is present or not

Route::get('/get-embsection2-data',[EmbController::class, 'checkDataAvailability']);

// route for the ajax to billno dropdown
 Route::post('billnodropdown',[EmbController::class, 'ajaxbilldropdown']);

//edit tender item route
Route::get('edittender',[EmbController::class , 'tenderitemedit']);

//update tender item route
Route::post('updatetenderitem',[EmbController::class , 'Updatedtenderitem']);

//rate analysis of given item route
Route::post('rateanalysis',[EmbController::class , 'rateanalysis']);

//submit reduced rate data route
Route::post('submitratedata',[EmbController::class , 'reducedratedata']);

//  ajax table data for pop up emb table

Route::post('embdatatable',[EmbController::class, 'fetchmodaltabledata']);

// fetch item decription from bil_item table to emb popup table
Route::post('fetchitemdesc',[EmbController::class, 'fetchItemDesc']);

//NEW bills create route for new button
Route::post('newbills',[EmbController::class, 'newbillfunction']);

//New bill submit route
Route::post('newbillsubmit',[EmbController::class, 'submitForm']);

//update final bill routes
Route::post('update-final-bill',[EmbController::class, 'updateFinalBill']); 

//upload final bill routes
Route::post('uploadimgdocvdo',[EmbController::class, 'uploadimgdocvdo']); 

//upload final bill routes
Route::post('uploadimages',[EmbController::class, 'uploadimagesdoc']);  

//Add the tnd item with that route
Route::get('tnditem',[EmbController::class, 'Addtenditem']);

//store the selected tnd items in bill items
Route::post('storeSelectedItems',[Embcontroller::class, 'Seleteditems']);

//repeate data confirmation check for tender items
Route::post('repeatedatatnditem',[Embcontroller::class, 'Checkrepeatedata']);

//delete bill items 
Route::get('delete-bill-item',[EmbController::class, 'deletebillitem']);

//emb pop up table for edit
Route::post('editembbutton',[EmbController::class, 'fetchembdataedit']);


// Edit EMB data from section 3
Route::post('get_emb_item_data',[Embcontroller::class, 'getembdata']);

// Update EMB data from section 3
Route::post('update_emb_data',[Embcontroller::class, 'updateembdata']);

//mb edit button route inside embedit button 
Route::post('fetch_mb_data',[Embcontroller::class, 'editmbdata']);
//mb update the data edited Route
Route::post('update_mb_data',[EmbController::class, 'updatembdata']); 
//mb delete Route in emb table
Route::post('delete_mb_item', [EmbController::class, 'deletemb']);

//item description for manual entry form
Route::post('fetchItemDescription', [EmbController::class, 'fetchItemDescription']);

//submit the new mb data and upload files(photos,doc) in database
Route::post('submitmb', [EmbController::class, 'submitmeasurement']);

//images and document delete route in measurement
Route::post('/delete-image-or-doc', [Embcontroller::class, 'deleteImageOrDoc']);

//all measurements in single time route
Route::post('allmeasurements', [Embcontroller::class, 'Allmeasurement']);


//submit the selected excel file for new measurement
Route::post('uploadexcel', [Embcontroller::class, 'excelsubmit']);

// Define a route for editing a steel measurement
Route::get('manualsteelnew', [Embcontroller::class, 'steelmanualnew']);


//steel new measurement manually route
Route::get('/edit-steelmeas/{steelid}', [Embcontroller::class, 'editsteelmeas']);

//Update the data of steel measurements
Route::post('steelmeasupdate', [Embcontroller::class, 'submitsteelupdate']);

// Define a route for deleting a steel measurement
Route::post('/delete-steelmeas', [Embcontroller::class, 'deletesteelmeas']);

// edit route of bill rc steel bill measurements
Route::get('/edit-bill-member/{rcmbrid}', [Embcontroller::class, 'editrcbill']);

// submit the edited  bill rc steel bill measurements
Route::post('/save-edited-member/{rcmbrid}', [Embcontroller::class, 'submiteditrcbill']);

//update progressbar from measurement
Route::POST('/progressbarmeas', [Embcontroller::class, 'progressvalue']);



//Bills section-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//Route::post('billlist/{workid}', [BillController::class, 'Billlist'])->name('billlist');


Route::get('billlist/{workid}', [BillController::class, 'Billlist'])->name('billlist');
//NEW bills create route for new button
Route::post('Newbills',[BillController::class, 'newbillfunction']);


//New bill submit route
Route::post('Newbillsubmit',[BillController::class, 'submitForm']);


// Route for displaying the delete confirmation
Route::get('/delete-bill-confirmation/{id}', [YourController::class, 'deleteBillConfirmation'])->name('delete.bill.confirmation');

//delete the bill route
Route::get('/delete-bill/{id}', [BillController::class, 'deletebill']);

//view billlist
//Route::view('listbills','listbills');

//edit bill route
Route::get('editbill/{id}' , [BillController::class, 'editbilldata']);

//update final bill routes
Route::post('update-final-bill',[BillController::class, 'updateFinalBill']); 



//update the bill data
Route::post('updatebill/{id}' , [BillController::class, 'updatebilldata']);

//view bill route
Route::get('viewbill/{id}' , [BillController::class, 'workmasterdata']);


//EMB bill route
Route::get('emb/{id}', [Embcontroller::class, 'workmasterdata'])->name('emb.workmasterdata');

//pagination link refresh
Route::get('/pagination-route', [Embcontroller::class, 'pagination'])->name('pagination.route');
// Route::get('/pagination-route', 'YourController@pagination')->name('pagination.route');
Route::get('/get-paginated-data', [Embcontroller::class, 'getPaginatedData']);

//Route::get('/', [BillController::class, 'showEmployees']);

//bill progress bar
Route::POST('/progressbar', [BillController::class, 'billprogressbar']);
Route::POST('/progressbarSO', [BillController::class, 'billprogressbarSO']);


//view document EE and DE
Route::get('/viewdocument/{id}', [BillController::class, 'viewdocument']);

//delete image document video route
Route::POST('/delete-imgdoc' , [BillController::class, 'deleteimgdocvdo']);


// upload document for the work hand over certificate 
Route::POST('/uploadworkhandovercertfi' , [BillController::class , 'uploadWHOC']);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Report Controller


Route::view('Report','Report');
//report route for individual bill

Route::get('report/{tbillid}' , [ReportController::class, 'reportbill']);

//mb page route
Route::get('Mb/{tbillid}' , [ReportController::class, 'mbreport']);

//abstrat report route

Route::get('abstractrep/{tbillid}' , [ReportController::class, 'abstractreport']);

//bill report route
Route::get('BILL/{tbillid}' , [ReportController::class, 'billreport']);

// recovery statement
Route::get('Recovertstmt/{tbillid}' , [ReportController::class, 'recoveryreport']);

//Royalty statement
Route::get('Royaltystmt/{tbillid}' , [ReportController::class, 'royaltystatement']);

//royalty statement pdf route
Route::get('Royaltyreportpdf/{tbillid}' , [ReportController::class, 'royaltystatementreport']);
 
 
//material consumption satetment
Route::get('Materialconsstmt/{tbillid}' , [ReportController::class, 'materialconsreport']);


//material consumption satetment
Route::get('Materialconsstmtpdf/{tbillid}' , [ReportController::class, 'materialconsreportpdf']);


//Excess sacing statement
Route::get('Excesssavestmt/{tbillid}' , [ReportController::class, 'excesssavingreport']);

//completion certificate route
Route::get('Compcertf/{tbillid}' , [ReportController::class, 'compcertfreport']);

//completion certificate pdf route
Route::get('Certificatereportpdf/{tbillid}', [ReportController::class, 'compcertfreportPDF']);


//work hand over certificate
Route::get('Workhandcertf/{tbillid}' , [ReportController::class, 'workhandovereport']);


//report page open route
//Route::get('Report/{tbillid}' , [ReportController::class, 'reportbill']);

//pdf convert route

//mb report pdf convert route
Route::get('/mbreport/pdf/{tbillid}', [ReportController::class, 'mbreportpdf']);

//abstract report pdf convert route
Route::get('/abstractreport/pdf/{tbillid}', [ReportController::class, 'abstractreportpdf']);


//Excess saving report pdf convert route
Route::get('/excessreport/pdf/{tbillid}', [ReportController::class, 'excessreportpdf']);


//Recovery report pdf
Route::get('Recoveryreportpdf/{tbillid}' , [ReportController::class, 'recoveryreportpdf']);


//Bill report pdf
Route::get('billreportpdf/{tbillid}' , [ReportController::class, 'Billreportpdf']);


//Form XIV Report..........
Route::get('form_xiv/{tbillid}' , [ReportController::class, 'form_xivReport']);

//Form XIV Report..........
Route::get('form_xiv_Pdf/{tbillid}' , [ReportController::class, 'form_xiv_pdf_Fun']);
//Material consumption//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::post('materialcon' , [MaterialConsController::class, 'materialcon']);

//update material consumption 
Route::post('updatematerialcon' , [MaterialConsController::class, 'updatematerialcon']);


//materialdate from child table for edit
Route::get('/fetch-material-data', [MaterialConsController::class, 'fetchMaterialData']);

//update material quantity 
Route::post('/updatematqty', [MaterialConsController::class, 'updatematqty']);

Route::get('qrcode', [QrCodeController::class, 'show']);

//Royalty Consumption data
Route::post('/royaltycons', [MaterialConsController::class, 'royaltycons']);

//Royal material data from child table
Route::get('/fetch-Royal-data', [MaterialConsController::class, 'fetchroyaldata']);
Route::post('CloseMaterialconsumption',[MaterialConsController::class,'FunCloseMaterial']);













// Priyanka ROUTES////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//EMB common Part
Route::POST('JuniorEngineerEMB',[GotoEmbController::class,'GotoEmbCntlr']);


//Itemwise
Route::post('recordentry',[GotoEmbController::class,'fundata']);


//Junior Engineer
Route::post('recordentry1',[GotoEmbController::class,'FunRecordData']);


//Junior Engineer
Route::post('ReturnListBills/{workid}',[GotoEmbController::class,'FunReturnListBills']);

//Junior Engineer Submit Button...........
Route::post('submitje', [GotoEmbController::class, 'SubmitJE']);

// Deputy Check
 Route::POST('DeputyCheck', [GotoEmbController::class, 'DeputyCheck1Fun']);


// Deputy check Itemwise
Route::post('Checkdeputy2', [GotoEmbController::class, 'DeputyCheck1ItemFun']);

// DeputyCheck1 RecordEntrywise
 Route::post('Checkdeputy1', [GotoEmbController::class, 'DeputyCheck1RecordFun']);

// DeputyCheck1 RecordEntrywise Save Button...
Route::post('Checkdeputysave', [GotoEmbController::class, 'SaveDeputy1']);


// DeputyCheck1 RecordEntrywise Submit Button...
Route::post('SubmitDeputy1', [GotoEmbController::class, 'submitdeputy']);

// Executive Engineer ...SaveBtnExecutive
Route::post('ExecutiveEngineerEMB', [ExecutiveEngineerCnt::class, 'funExecutiveData']);


// Executive Engineer RecordEntrywise ...
Route::post('ExecutiveEngineerEMB1', [ExecutiveEngineerCnt::class, 'RecordWiseExecutiveCheckFun']);


// Executive Engineer  Itemwise...
Route::post('ExecutiveEngineerEMB2', [ExecutiveEngineerCnt::class, 'ItemwiseExecutiveCheckFun']);

// Executive Engineer  Itemwise...
Route::post('ExecutiveEngineerEMBSave', [ExecutiveEngineerCnt::class, 'SaveBtnExecutive']);

// Executive Engineer  Percentage ...
Route::post('ExecutiveEngineerPercentIndicator', [ExecutiveEngineerCnt::class, 'PercentIndicator']);


// Executive Engineer  Percentage ...
Route::post('ExecutiveEngineerPercentLoad', [ExecutiveEngineerCnt::class, 'PercentageLoad']);

// Executive Engineer  Percentage by input quantity...
Route::post('ExecutiveEngineerPercentIndicatorInputqty', [ExecutiveEngineerCnt::class, 'precentageloadquantity']);


//pop when click yes 
Route::get('yesSubmitview/{workid}/{tbillid}', [ExecutiveEngineerCnt::class, 'funYesSubmit'])->middleware('web');


// Agency Check ...
Route::post('AgencyCheck', [AgencyCheckController::class, 'AgencyCnt']);

// Agency Check  Submit ...
Route::post('SubmitAgency', [AgencyCheckController::class, 'FunctionSubmitAgency']);



// TRUPTI MADAM ROUTES////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//SdcController controller
Route::get('listSDC',[SdcController::class,'FunindexSDC']);
Route::get('sdcdropdown',[SdcController::class, 'FunDropdownselectInsertsdc']);
Route::post('insertsdcengineer',[SdcController::class, 'FuninsertSDCengineer']);
Route::GET('editSDCengineer/{SDC_id}',[SdcController::class, 'FuneditSDCengineer']);
Route::post('UpdateSdcRoute/{SDC_id}',[SdcController::class,'FunSdcUpdate'])->name('update');         
Route::delete('deletesdc/{SDC_id}', [SdcController::class, 'FunSdcDelete'])->name('deletesdc');
Route::get('viewSdc/{SDC_id}',[SdcController::class,'FunViewSdc']);




//AAO controller
Route::get('listAAO',[AAOController::class,'FunindexAAO']);
Route::get('AAOdropdown',[AAOController::class, 'FunDropdownselectInsertAAO']);
Route::get('editAccountant/{DAO_id}',[AAOController::class, 'FunEditAAO']);
Route::post('updateAAORoute/{DAO_id}',[AAOController::class, 'FunUpdateAAO']);
Route::delete('deleteAccountant/{DAO_id}', [AAOController::class, 'FunDeleteAAO'])->name('deleteAccountant');
Route::get('showAccount/{DAO_id}',[AAOController::class, 'FunshowAAO']);


//AB Controller
Route::get('listAB',[ABController::class,'FunindexAB']);
Route::get('RouteeditAuditor/{AB_Id}', [ABController::class, 'FunEditAB']);

Route::post('updateauditorRoute/{abid}', [ABController::class, 'FunUpdateauditor']);
Route::get('RouteViewAuditor/{AB_Id}', [ABController::class, 'FunViewAB']);







//select query subdivision
Route::get('listsubdivisions',[SubdivisionController::class,'index']);
//insert subdivision
Route::view("subdivision" ,"subdivision");
Route::get('/get-division', [SubdivisionController::class, 'getDivision']);
Route::get('/get-subdivision', [SubdivisionController::class, 'getSubDivision']);
Route::post('subdivision' ,[SubdivisionController::class,'funCreate']);
//update subdivision
Route::get('EditSubdivisionRoute/{Sub_Div_Id}',[SubdivisionController::class,'FunEditSubdivision'])->name('edit');
Route::put('update/{Sub_Div_Id}', [SubdivisionController::class, 'update']);
//show indivisual record
Route::get('showsubdivision/{Sub_Div_Id}',[SubdivisionController::class,'show'])->name('show');
// delete quey subdivision
Route::delete('DeleteSubdivisionRoute/{Sub_Div_Id}', [SubdivisionController::class, 'funDeleteSubdivision'])->name('delete');










//select workmaster
//Route::view('listworkmasters','listworkmasters');
Route::get('listworkmasters',[WorkMasterController::class,'index']);
//import excel file
// Route::post('ImportExcelRoute',[WorkMasterController::class,'funimport_user'])->name('ImportExcelRoute');
//First Sheet upload
Route::post('/upload-excel', [WorkMasterController::class, 'uploadExcel'])->name('upload.excel');
//First Sheet upload
//second  Sheet Upload
Route::post('/newbtnajax', [WorkMasterController::class, 'funnewbtnajaxsheet2read'])->name('newbtnajax');
//insert workmaster
// new form also open
Route::view('workmaster','workmaster');
Route::get('workmaster/{Work_Id}', [WorkMasterController::class, 'funshowImportData']);
Route::post('workmaster', [WorkMasterController::class, 'funCreate']);
//show indivisual record in workmaster
Route::get('showworkmaster/{Work_Id}',[WorkMasterController::class,'show']);
//update workmaster
Route::get('editworkmasterroute/{Work_Id}', [WorkMasterController::class,'editworkmaster']);
Route::post('updateworkroute/{Work_Id}',[WorkMasterController::class,'funupdateworkmaster']);

// Example route definition with a name
Route::get('/get-villages', [WorkMasterController::class, 'getVillages'])->name('getVillages');
Route::get('/get-related-ids-by-village', [WorkMasterController::class, 'getRelatedIdsByVillage']);
Route::get('/get-mla-by-mp', [WorkMasterController::class, 'getMLAByMP'])->name('getMLAByMP');
//find agency name
// Route::get('searchAgencyName', [WorkMasterController::class,'FunagencyNameSearch']);
Route::get('/searchAgencyName', [WorkMasterController::class, 'FunagencyNameSearch'])->name('searchAgencyName');
// Route for searching place names
Route::get('/searchPlaceName', [WorkMasterController::class, 'FunplaceNameSearch'])->name('searchPlaceName');
// Route for searching contacts
Route::get('/searchContact', [WorkMasterController::class, 'FuncontactSearch'])->name('searchContact');
//find agency name
Route::get('searchpanno',[WorkMasterController::class, 'FunpanSearch']);
Route::post('relatedAgencynameDBDetail',[WorkMasterController::class, 'FunAgencynameResult']);


//update tnd item
// Route::get('RouteEdit_tnd_item', [WorkMasterController::class,'FunUpdateTnd_item']);
Route::get('RouteEditTndItemsIndiviual/{tItemId}', [WorkMasterController::class, 'FunEditTndItems'])->name('RouteEditTndItemsIndiviual');
Route::post('RouteUpdatedtnditem', [WorkMasterController::class,'FunUpdateTnd_item']);
Route::delete('/deleteTndItem/{t_item_id}', [WorkMasterController::class, 'deleteTndItem'])->name('deleteTndItem');

//delete workmaster
Route::delete('users.delete/{Work_Id}', [WorkMasterController::class, 'FundeleteWorkmaster'])->name('users.delete');
// Route::delete('users/{Work_Id}', [WorkMasterController::class, 'delete'])->name('users.delete');
//find work master route
Route::get('viewfindworkmaster', [WorkMasterController::class, 'Funfindiworkmaster']);
Route::get('Routeindworkid', [WorkMasterController::class, 'FunworkidFind']);





//Abstract controller
Route::view('Abstract','Abstract');
Route::get('Abstract/{t_bill_Id}', [AbstractController::class, 'FunAbstractcalculation']);
Route::get('RoutetbillnorelateddataDisplay', [AbstractController::class, 'FunshowdataRelatedbillno']);
Route::get('Deduction',[AbstractController::class, 'FunDeduction']);
Route::get('Routededudropdown', [AbstractController::class, 'FunDeductionDropdown']);
Route::post('RouteTolDedchequeAmt', [AbstractController::class, 'FunTotdedchequeAmt']);

//show dedu remove row  deduction Delete
// Route::post('RouteShowDedRemoverow', [AbstractController::class, 'Funshowdedremoverow']);
//show dedu remove row  deduction Delete
//Excess Saving 
Route::get('ExcessStatement/{t_bill_Id}', [AbstractController::class, 'FunExcesssave']);
Route::post('/saveremark/{tbiilid}', [AbstractController::class, 'saveRemark']);
//recovery Statement
// Route::view('RecoveryStatement','RecoveryStatement');
// Route::match(['get', 'post'], 'RecoveryStatement/{t_bill_Id}', [AbstractController::class, 'FunRecoverystatementIndex']);
// Route::post('ListRecoveryStatement', [AbstractController::class, 'FunRecoverystatementIndex']);
Route::get('ListRecoveryStatement', [AbstractController::class, 'FunRecoverystatementIndex']);
Route::post('/save-recovery', [AbstractController::class, 'saveRecovery']);
Route::post('RouteTotRecovery/{tbiilid}/{workid}', [AbstractController::class, 'FunTotalRecovery']);

Route::post('billitemrecordinsert', [AbstractController::class, 'Funbillitemrecordinsert']);
Route::get('EditRecovery/{id}/{tbiilid}', [AbstractController::class, 'FunEditRecovery']);
Route::post('UpdateRecovery', [AbstractController::class, 'updateRecovery']);
Route::post('/RouteDeleteRecovery', [AbstractController::class, 'FunDeleteRecovery']);
Route::post('RouteCloseRecovery', [AbstractController::class, 'FunclosepageRecovery']);








//insert executiveEngineer
Route::post('executive' ,[ExecutiveEngController::class,'funCreateExecutiveEng']);
//Display executiveEngineer
Route::get("executivedivsubdivlist",[ExecutiveEngController::class,'funBeforCreateExecutiveEng']);
Route::get('listexecutive',[ExecutiveEngController::class,'funindexexecutiveEng']);
//update executiveEngineer
Route::get('editexecutiveRoute/{eeid}',[ExecutiveEngController::class,'FunEditExecutiveEng']);
Route::post('updateexecuteRoute/{eeid}', [ExecutiveEngController::class, 'FunUpdateExecutiveEng']);
//show indivisual record in executiveEngineer
Route::get('ShowExecutiveRoute/{eeid}',[ExecutiveEngController::class,'FunshowExecutiveEng']);
//delete executiveEngineer
Route::delete('deleteexe/{eeid}', [ExecutiveEngController::class, 'funDeleteExecutiveEng']);





//Deputy Engineer
// display deputy
Route::get('listdeputy',[DeputyController::class,'funindexdeputyEng'])->name('index');
//insert deputy
Route::get('Deputy_EngDivSubdivList',[DeputyController::class,'funDropdowndeputyEng']);
Route::POST('Deputy_Eng' ,[DeputyController::class,'funCreateDeputyEng'])->name('insert');
//update deputy
Route::get('editdeputyRoute/{id}',[DeputyController::class,'funEditDeputyEng']);
Route::post('UpdateDeputyRoute/{id}',[DeputyController::class,'FunDeputyUpdate']);
//delete deputy
Route::delete('deletedpt/{id}', [DeputyController::class, 'funDeleteDeputyEng']);
Route::get('ShowDeputyRoute/{Id}',[DeputyController::class,'FunShowDeputyEng']);


Route::view('Certificate' ,'Certificate');

//ChecklistController------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Route::post('RouteCheckListSO',[ChecklistController::class,'FunChecklistJE']);
Route::post('SaveChklstJe',[ChecklistController::class,'FunSaveChecklistJE']);
Route::post('RouteCheckListSDC',[ChecklistController::class,'FunChecklistSDC']);
Route::post('SaveChklstSDC',[ChecklistController::class,'FunSaveChecklistSDC']);
Route::post('RouteCheckListDYE',[ChecklistController::class,'FunChecklistDYE']);
Route::post('submitDyeChkAndDate',[ChecklistController::class,'FunDyeChkAndDate']);
Route::post('RouteCheckListPO',[ChecklistController::class,'FunChecklistPO']);
Route::post('SaveChklstPO',[ChecklistController::class,'FunSaveChecklistPO']);
Route::post('RouteCheckListAB', [ChecklistController::class, 'FunChecklistAB']);
Route::post('SaveChklstAB',[ChecklistController::class,'FunSaveChecklistAB']);
Route::get('RouteCheckListAAO',[ChecklistController::class,'FunChecklistAAO']);
Route::post('submitAAOChkAndDate',[ChecklistController::class,'FunAAOChkAndDateUpdate']);
Route::get('RouteCheckListEE',[ChecklistController::class,'FunChecklistEE']);
Route::post('submitEEChkAndDate',[ChecklistController::class,'FunEEChkAndDateUpdate']);



//ChecklistReportController------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//subdivisionchecklistreport report route

Route::get('deputychecklist/{tbillid}' , [ChecklistReportController::class, 'subdivisionchecklist']);

//subdivisionchecklistreport pdf route
Route::get('subdivisionchecklistreport/{tbillid}' , [ChecklistReportController::class, 'subdivisionchecklistreportpdf']);
 
//bill report route
Route::get('EEchecklist/{tbillid}' , [ChecklistReportController::class, 'divisionchecklist']);

//bill report route
Route::get('DivisionChecklist/{tbillid}' , [ChecklistReportController::class, 'Fundivisionchecklist']);

//bill report route
Route::get('DivisionChecklistpdf/{tbillid}' , [ChecklistReportController::class, 'FundivisionchecklistPDF']);








Route::get('/clear-cache', function () {
  $exitCode = Artisan::call('cache:clear');
  return '<h1>Application Cache Cleared</h1>';
});

// Route to clear route cache
Route::get('/clear-route-cache', function () {
  $exitCode = Artisan::call('route:clear');
  return '<h1>Route Cache Cleared</h1>';
});



});
