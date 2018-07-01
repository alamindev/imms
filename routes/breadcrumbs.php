<?php 
//Home
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('dashboard', route('dashboard'));
});

 //for all users
Breadcrumbs::register('User', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('users', route('User'));
});
// add User
Breadcrumbs::register('addUser', function ($breadcrumbs) { 
    $breadcrumbs->parent('User');
    $breadcrumbs->push('add', route('addUser'));
});
Breadcrumbs::register('viewUser', function ($breadcrumbs, $id) {
    $post = App\User::findOrFail($id); 
    $breadcrumbs->parent('User');
    $breadcrumbs->push($post->userName, route('viewUser', $post));
});
Breadcrumbs::register('editUser', function ($breadcrumbs, $id) {
    $post = App\User::findOrFail($id); 
    $breadcrumbs->parent('User');
    $breadcrumbs->push($post->userName, route('editUser', $post));
});

/* add new employee */
 Breadcrumbs::register('employees', function ($breadcrumbs) { 
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Employee', route('employees'));
});
  Breadcrumbs::register('add-employee', function ($breadcrumbs) { 
    $breadcrumbs->parent('employees');
    $breadcrumbs->push('Add new Employee', route('add-employee'));
});  
Breadcrumbs::register('view-employee', function ($breadcrumbs, $id) {
    $employee = App\Employee::findOrFail($id); 
    $breadcrumbs->parent('employees');
    $breadcrumbs->push($employee->first_name.' '.$employee->last_name, route('view-employee', $employee));
});
Breadcrumbs::register('edit-employee', function ($breadcrumbs, $id) {
    $employee = App\Employee::findOrFail($id); 
    $breadcrumbs->parent('employees');
    $breadcrumbs->push($employee->first_name.' '.$employee->last_name, route('edit-employee', $employee));
});
// for search
Breadcrumbs::register('search-employee', function ($breadcrumbs) { 
    $breadcrumbs->parent('employees');
    $breadcrumbs->push('Search-employee', route('search-employee'));
});

//breadcrumbs for asal
 
Breadcrumbs::register('asals', function ($breadcrumbs) { 
    $breadcrumbs->parent('employees');
    $breadcrumbs->push('asals', route('asals'));
});
Breadcrumbs::register('asal_create', function ($breadcrumbs, $id) {
    $employee = App\Employee::findOrFail($id); 
    $breadcrumbs->parent('asals');
    $breadcrumbs->push($employee->first_name.' '.$employee->last_name, route('asal_create', $employee));
});
Breadcrumbs::register('asal_show', function ($breadcrumbs, $id) {
    $asal = App\Asal::findOrFail($id); 
    $breadcrumbs->parent('asals');
    $breadcrumbs->push($asal->daripada, route('asal_show', $asal));
});
Breadcrumbs::register('asal_edit', function ($breadcrumbs, $id) {
    $asal = App\Asal::findOrFail($id); 
    $breadcrumbs->parent('asals');
    $breadcrumbs->push($asal->daripada, route('asal_edit', $asal));
});
//breadcrumbs for asalbill
Breadcrumbs::register('asalbills', function ($breadcrumbs) { 
    $breadcrumbs->parent('employees');
    $breadcrumbs->push('asalbills', route('asalbills'));
});
Breadcrumbs::register('asalbill_create', function ($breadcrumbs, $id) {
    $asal = App\Asal::findOrFail($id); 
    $breadcrumbs->parent('asalbills');
    $breadcrumbs->push($asal->no_resit, route('asalbill_create', $asal));
});
Breadcrumbs::register('asalbill_show', function ($breadcrumbs, $id) {
    $asalbills = App\AsalBill::findOrFail($id); 
    $breadcrumbs->parent('asalbills');
    $breadcrumbs->push($asalbills->cod_imm, route('asalbill_show', $asalbills));
});
Breadcrumbs::register('asalbill_edit', function ($breadcrumbs, $id) {
    $asalbills = App\AsalBill::findOrFail($id); 
    $breadcrumbs->parent('asalbills');
    $breadcrumbs->push($asalbills->cod_imm, route('asalbill_edit', $asalbills));
});
// breadcrumbs for recycle bin
Breadcrumbs::register('user_re', function ($breadcrumbs) { 
    $breadcrumbs->parent('User');
    $breadcrumbs->push('recycle/ user', route('user_re'));
});
Breadcrumbs::register('employee_re', function ($breadcrumbs) { 
    $breadcrumbs->parent('User');
    $breadcrumbs->push('recycle / Employee', route('employee_re'));
});
 Breadcrumbs::register('asalbill_re', function ($breadcrumbs) { 
    $breadcrumbs->parent('asals');
    $breadcrumbs->push('recycle / asal bill', route('asalbill_re'));
});
 
 