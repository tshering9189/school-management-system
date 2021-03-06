<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackendController\Account\AccountSalaryController;
use App\Http\Controllers\BackendController\Account\OtherCostController;
use App\Http\Controllers\BackendController\Account\StudentFeeController;

use App\Http\Controllers\BackendController\Employee\EmployeeAttendanceController;
use App\Http\Controllers\BackendController\ProfileController;
use App\Http\Controllers\BackendController\UserController;

use App\Http\Controllers\BackendController\Employee\EmployeeLeaveController;
use App\Http\Controllers\BackendController\Employee\EmployeeRegController;
use App\Http\Controllers\BackendController\Employee\EmployeeSalaryController;
use App\Http\Controllers\BackendController\Employee\MonthlySalaryController;

use App\Http\Controllers\BackendController\Marks\DefaultController;
use App\Http\Controllers\BackendController\Marks\GradeController;
use App\Http\Controllers\BackendController\Marks\MarksController;
use App\Http\Controllers\BackendController\Report\AttendReportController;
use App\Http\Controllers\BackendController\Report\MarkSheetController;
use App\Http\Controllers\BackendController\Report\ProfitController;
use App\Http\Controllers\BackendController\Report\ResultReportController;
use App\Http\Controllers\BackendController\Setup\AssignSubjectController;
use App\Http\Controllers\BackendController\Setup\DesignationController;
use App\Http\Controllers\BackendController\Setup\ExamTypeController;
use App\Http\Controllers\BackendController\Setup\FeeAmountController;
use App\Http\Controllers\BackendController\Setup\FeeCategoryController;
use App\Http\Controllers\BackendController\Setup\SchoolSubjectController;
use App\Http\Controllers\BackendController\Setup\StudentClassController;
use App\Http\Controllers\BackendController\Setup\StudentGroupController;
use App\Http\Controllers\BackendController\Setup\StudentShiftController;
use App\Http\Controllers\BackendController\Setup\StudentYearController;

use App\Http\Controllers\BackendController\Student\ExamFeeController;
use App\Http\Controllers\BackendController\Student\MonthlyFeeController;
use App\Http\Controllers\BackendController\Student\RegistrationFeeController;
use App\Http\Controllers\BackendController\Student\StudentRegController;
use App\Http\Controllers\BackendController\Student\StudentRollController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'prevent-back-history'],function(){

    Route::get('/', function () {
        return view('auth.login');
    });

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // Admin Routes
    Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

    Route::group(['middleware' => 'auth'], function(){
        //User Management All Route
        //Group Route
        Route::prefix('users')->group(function(){
            Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
            Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');
            Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
            Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
            Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
            Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
        });

        // User Profile and change password
        Route::prefix('profile')->group(function(){
            Route::get('/view', [ProfileController::class, 'UserProfileView'])->name('profile.view');
            Route::get('/edit', [ProfileController::class, 'UserProfileEdit'])->name('profile.edit');
            Route::post('/store', [ProfileController::class, 'UserProfileStore'])->name('profile.store');
            Route::get('/password/view', [ProfileController::class, 'UserPasswordView'])->name('password.view');
            Route::post('/password/update', [ProfileController::class, 'UserPasswordUpdate'])->name('password.update');
        });

        // Setup Management
        Route::prefix('setups')->group(function(){
            // Student Class
            Route::get('/student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
            Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
            Route::post('/student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');
            Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
            Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');
            Route::get('/student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

            //Student Year
            Route::get('/student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
            Route::get('/student/year/add', [StudentYearController::class, 'AddYear'])->name('student.year.add');
            Route::post('/student/year/store', [StudentYearController::class, 'StoreYear'])->name('store.student.year');
            Route::get('/student/year/edit/{id}', [StudentYearController::class, 'EditYear'])->name('student.year.edit');
            Route::post('/student/year/update/{id}', [StudentYearController::class, 'UpdateYear'])->name('student.year.update');
            Route::get('/student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');

            //Student Group
            Route::get('/student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
            Route::get('/student/group/add', [StudentGroupController::class, 'AddGroup'])->name('student.group.add');
            Route::post('/student/group/store', [StudentGroupController::class, 'StoreGroup'])->name('store.student.group');
            Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'EditGroup'])->name('student.group.edit');
            Route::post('/student/group/update/{id}', [StudentGroupController::class, 'UpdateGroup'])->name('student.group.update');
            Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');

            //Student Shift
            Route::get('/student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
            Route::get('/student/shift/add', [StudentShiftController::class, 'AddShift'])->name('student.shift.add');
            Route::post('/student/shift/store', [StudentShiftController::class, 'StoreShift'])->name('store.student.shift');
            Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'EditShift'])->name('student.shift.edit');
            Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'UpdateShift'])->name('student.shift.update');
            Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');

            //Fee Category
            Route::get('/fee/category/view', [FeeCategoryController::class, 'ViewFeeCat'])->name('fee.category.view');
            Route::get('/fee/category/add', [FeeCategoryController::class, 'FeeCatAdd'])->name('fee.category.add');
            Route::post('/fee/category/store', [FeeCategoryController::class, 'FeeCatStore'])->name('store.fee.category');
            Route::get('/fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCatEdit'])->name('fee.category.edit');
            Route::post('/fee/category/update/{id}', [FeeCategoryController::class, 'UpdateFeeCat'])->name('fee.category.update');
            Route::get('/fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');

            //Fee Category Amount
            Route::get('/fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
            Route::get('/fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add');
            Route::post('/fee/amount/store', [FeeAmountController::class, 'StoreFeeAmount'])->name('store.fee.amount');
            Route::get('/fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
            Route::post('/fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('update.fee.amount');
            Route::get('/fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'DetailsFeeAmount'])->name('fee.amount.details');

            //Exam Type
            Route::get('/exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
            Route::get('/exam/type/add', [ExamTypeController::class, 'AddExamType'])->name('exam.type.add');
            Route::post('/exam/type/store', [ExamTypeController::class, 'StoreExamType'])->name('store.exam.type');
            Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'EditExamType'])->name('exam.type.edit');
            Route::post('/exam/type/update/{id}', [ExamTypeController::class, 'UpdateExamType'])->name('update.exam.type');
            Route::get('/exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');

            //School Subject
            Route::get('/school/subject/view', [SchoolSubjectController::class, 'ViewSchoolSubject'])->name('school.subject.view');
            Route::get('/school/subject/add', [SchoolSubjectController::class, 'AddSchoolSubject'])->name('school.subject.add');
            Route::post('/school/subject/store', [SchoolSubjectController::class, 'StoreSchoolSubject'])->name('store.school.subject');
            Route::get('/school/subject/edit/{id}', [SchoolSubjectController::class, 'EditSchoolSubject'])->name('school.subject.edit');
            Route::post('/school/subject/update/{id}', [SchoolSubjectController::class, 'UpdateSchoolSubject'])->name('update.school.subject');
            Route::get('/school/subject/delete/{id}', [SchoolSubjectController::class, 'SchoolSubjectDelete'])->name('school.subject.delete');

            //Assign Subject
            Route::get('/assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
            Route::get('/assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');
            Route::post('/assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');
            Route::get('/assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');
            Route::post('/assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');
            Route::get('/assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');

            //Designation
            Route::get('/designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');
            Route::get('/designation/add', [DesignationController::class, 'AddDesignation'])->name('designation.add');
            Route::post('/designation/store', [DesignationController::class, 'StoreDesignation'])->name('store.designation');
            Route::get('/designation/edit/{id}', [DesignationController::class, 'EditDesignation'])->name('designation.edit');
            Route::post('/designation/update/{id}', [DesignationController::class, 'UpdateDesignation'])->name('update.designation');
            Route::get('/designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');

        });

        // Student Registration
        Route::prefix('students')->group(function(){
            Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
            Route::get('/reg/add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');
            Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');
            Route::post('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');
            Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
            Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
            Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromote'])->name('student.registration.promotion');
            Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdateRegPromote'])->name('promotion.student.registration');
            Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');

            //Student Roll Generate
            Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');
            Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');
            Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');

            //Registration Fee
            Route::get('/registration/fee/view', [RegistrationFeeController::class, 'RegistrationFeeView'])->name('registration.fee.view');
            Route::get('/registration/fee/classwise', [RegistrationFeeController::class, 'RegistrationFeeClassData'])->name('student.registration.fee.classwise.get');
            Route::get('/registration/fee/payslip', [RegistrationFeeController::class, 'RegistrationFeePayslip'])->name('student.registration.fee.payslip');

            //Monthly Fee
            Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
            Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
            Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');
            
            //Exam Fee
            Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
            Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
            Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');

        });


        // Employee Profile
        Route::prefix('employee')->group(function(){
            Route::get('/reg/employee/view', [EmployeeRegController::class, 'EmployeeView'])->name('employee.registration.view');
            Route::get('/reg/employee/add', [EmployeeRegController::class, 'EmployeeAdd'])->name('employee.registration.add');
            Route::post('/reg/employee/store', [EmployeeRegController::class, 'EmployeeStore'])->name('store.employee.registration');
            Route::get('/reg/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit'])->name('employee.registration.edit');
            Route::post('/reg/employee/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('update.employee.registration');
            Route::get('/reg/employee/details/{id}', [EmployeeRegController::class, 'EmployeeDetails'])->name('employee.registration.details');

            // Employee Salary
            Route::get('/salary/employee/view', [EmployeeSalaryController::class, 'SalaryView'])->name('employee.salary.view');
            Route::get('/salary/employee/increment/{id}', [EmployeeSalaryController::class, 'SalaryIncrement'])->name('employee.salary.increment');
            Route::post('/salary/employee/store/{id}', [EmployeeSalaryController::class, 'SalaryIncrementStore'])->name('update.increment.store');
            Route::get('/salary/employee/details/{id}', [EmployeeSalaryController::class, 'SalaryDetails'])->name('employee.salary.details');
        
            // Employee leave
            Route::get('/leave/employee/view', [EmployeeLeaveController::class, 'LeaveView'])->name('employee.leave.view');
            Route::get('/leave/employee/add', [EmployeeLeaveController::class, 'LeaveAdd'])->name('employee.leave.add');
            Route::post('/leave/employee/store/', [EmployeeLeaveController::class, 'LeaveStore'])->name('store.employee.leave');
            Route::get('/leave/employee/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit'])->name('employee.leave.edit');
            Route::post('/leave/employee/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate'])->name('update.employee.leave');
            Route::get('/leave/employee/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete'])->name('employee.leave.delete');

            // Employee Attendance
            Route::get('/attendance/employee/view', [EmployeeAttendanceController::class, 'AttendanceView'])->name('employee.attendance.view');
            Route::get('/attendance/employee/add', [EmployeeAttendanceController::class, 'AttendanceAdd'])->name('employee.attendance.add');
            Route::post('/attendance/employee/store/', [EmployeeAttendanceController::class, 'AttendanceStore'])->name('store.employee.attendance');
            Route::get('/attendance/employee/edit/{date}', [EmployeeAttendanceController::class, 'AttendanceEdit'])->name('employee.attendance.edit');
            Route::get('/attendance/employee/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails'])->name('employee.attendance.details');

            // Employee Monthly Salary
            Route::get('/monthly/salary/view', [MonthlySalaryController::class, 'MonthlySalaryView'])->name('employee.monthly.salary');
            Route::get('/monthly/salary/get', [MonthlySalaryController::class, 'MonthlySalaryGet'])->name('employee.monthly.salary.get');
            Route::get('/monthly/salary/payslip{employee_id}', [MonthlySalaryController::class, 'MonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');
            
        });

        // Student Marks Management
        Route::prefix('marks')->group(function(){
            Route::get('/entry/add', [MarksController::class, 'MarksAdd'])->name('marks.entry.add');
            Route::post('/entry/store', [MarksController::class, 'MarksStore'])->name('marks.entry.store');
            Route::get('/entry/edit', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit');
            Route::get('/entry/edit/getstudent', [MarksController::class, 'MarksEditGetStudents'])->name('student.edit.getstudents');
            Route::post('/entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');

            // Grade
            Route::get('/entry/grade', [GradeController::class, 'MarksGradeView'])->name('marks.entry.grade');
            Route::get('/grade/add', [GradeController::class, 'MarksGradeAdd'])->name('marks.grade.add');
            Route::post('/grade/store', [GradeController::class, 'MarksGradeStore'])->name('store.marks.grades');
            Route::get('/grade/edit/{id}', [GradeController::class, 'MarksGradeEdit'])->name('marks.grade.edit');
            Route::post('/grade/update/{id}', [GradeController::class, 'MarksGradeUpdate'])->name('update.marks.grades');
        });

        //Outside of prefix
        Route::get('/marks/getsubject', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');
        Route::get('student/marks/getstudents', [DefaultController::class, 'GetStudents'])->name('student.marks.getstudents');


        // Account Management
        Route::prefix('accounts')->group(function(){
            Route::get('/student/fee/view', [StudentFeeController::class, 'StudentFeeView'])->name('student.fee.view');
            Route::get('/student/fee/add', [StudentFeeController::class, 'StudentFeeAdd'])->name('student.fee.add');
            Route::get('/student/fee/getstudent', [StudentFeeController::class, 'StudentFeeGetStudent'])->name('account.fee.getstudent');
            Route::post('/student/fee/store', [StudentFeeController::class, 'StudentFeeStore'])->name('account.fee.store');

            //Employee Salary
            Route::get('/account/salary/view', [AccountSalaryController::class, 'AccountSalaryView'])->name('account.salary.view');
            Route::get('/account/salary/add', [AccountSalaryController::class, 'AccountSalaryAdd'])->name('account.salary.add');
            Route::get('/account/salary/getemployee', [AccountSalaryController::class, 'AccountSalaryGetEmployee'])->name('account.salary.getemployee');
            Route::post('/account/salary/store', [AccountSalaryController::class, 'AccountSalaryStore'])->name('account.salary.store');

            //Other Costs
            Route::get('/other/cost/view', [OtherCostController::class, 'OtherCostView'])->name('other.cost.view');
            Route::get('/other/cost/add', [OtherCostController::class, 'OtherCostAdd'])->name('other.cost.add');
            Route::post('/other/cost/store', [OtherCostController::class, 'OtherCostStore'])->name('store.other.cost');
            Route::get('/other/cost/edit/{id}', [OtherCostController::class, 'OtherCostEdit'])->name('edit.other.cost');
            Route::post('/other/cost/update/{id}', [OtherCostController::class, 'OtherCostUpdate'])->name('update.other.cost');
        });   
        
        // Report Management
        Route::prefix('reports')->group(function(){
            Route::get('/monthly/profit/view', [ProfitController::class, 'MonthlyProfitView'])->name('monthly.profit.view');
            Route::get('/monthly/profit/datewise', [ProfitController::class, 'MonthlyProfitDatewise'])->name('report.profit.datewise.get');
            Route::get('/monthly/profit/pdf', [ProfitController::class, 'MonthlyProfitPdf'])->name('report.profit.pdf');

            //Marksheet Generate
            Route::get('/marksheet/generate/view', [MarkSheetController::class, 'MarkSheetView'])->name('marksheet.generate.view');
            Route::get('/marksheet/generate/get', [MarkSheetController::class, 'MarkSheetGet'])->name('report.marksheet.get');

            //Attendance Report
            Route::get('/attendance/report/get', [AttendReportController::class, 'AttendReportView'])->name('attendance.report.view');
            Route::get('/report/attendance/get', [AttendReportController::class, 'AttendReportGet'])->name('report.attendance.get');

            //Student Result
            Route::get('/student/result/view', [ResultReportController::class, 'StudentResultView'])->name('student.result.view');
            Route::get('/student/result/get', [ResultReportController::class, 'StudentResultGet'])->name('report.student_result.get');

            //Student ID Card
            Route::get('/student/idcard/view', [ResultReportController::class, 'IdcardView'])->name('student.idcard.view');
            Route::get('/student/idcard/get', [ResultReportController::class, 'IdcardGet'])->name('report.student.idcard.get');
        });         

        
    }); //End Middleware auth Route


}); //End prevent-back-history