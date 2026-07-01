<?php

use App\Http\Controllers\WelcomePageController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TerminalPageController;
use App\Http\Controllers\GitMonitorController;
use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\ComposerController;
use App\Http\Controllers\OptimizationController;
use App\Http\Controllers\QueueMonitorController;
use App\Http\Controllers\CronController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ServerHealthController;
use App\Http\Controllers\EnvironmentController;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SystemUserController;
use App\Http\Controllers\BanUserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SystemProblemController;
use App\Http\Controllers\Auth\LoginController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//Welcome Section
Route::get('/', [WelcomePageController::class, 'index'])->name('welcome');
Route::get('/faq', [WelcomePageController::class, 'faq'])->name('faq');
//Contact Section
Route::get('/contact', [WelcomePageController::class, 'contact'])->name('contact');

Route::post('/system-problem/store', [WelcomePageController::class, 'system_problem_store'])->name('system_problem.store');
Route::post('/contact/store', [WelcomePageController::class, 'contactStore'])->name('contact.store');
Route::get('/user_profile', function () {
    return view('user_profile');
})->middleware(['auth', 'verified'])->name('profile');

Route::group(['middleware' => ['auth', 'permission']], function () {
    // Profile Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/system_dashboard', [DashboardController::class, 'system_index'])->name('dashboard.system');
    Route::get('/global-search', [DashboardController::class, 'globalSearch'])->name('global.search');
    Route::get('/search/result', [DashboardController::class, 'searchResult'])->name('search.result');

    //Profile Section
    Route::get('/user_profile', [ProfileController::class, 'user_profile_show'])->name('user_profile_show');
    Route::get('/user_profile_edit', [ProfileController::class, 'user_profile_edit'])->name('user_profile_edit');
    Route::put('/user_profile_update', [ProfileController::class, 'user_profile_update'])->name('user_profile_update');

    Route::get('/terminal', [TerminalPageController::class, 'index'])->name('terminal.index');
    Route::post('/terminal/run', [TerminalPageController::class, 'run'])->name('terminal.run');

    /*PROJECT PART*/
    Route::get('projects/{project}/repository/search', [ProjectController::class, 'repositorySearch'])->name('projects.repository.search');
    Route::get('projects/{project}/repository/timeline', [ProjectController::class, 'repositoryTimeline'])->name('projects.repository.timeline');
    Route::get('projects/{project}/repository/filter', [ProjectController::class, 'repositoryFilter'])->name('projects.repository.filter');
    Route::get('projects/{project}/repository/commit/{hash}', [ProjectController::class, 'repositoryCommit'])->name('projects.repository.commit');
    Route::get('projects/{project}/repository/hash/{hash}', [ProjectController::class, 'repositoryHash'])->name('projects.repository.hash');
    Route::get('/projects/{project}/repository', [ProjectController::class, 'projectRepository'])->name('projects.repository');
    Route::get('/projects/{project}/repository/diff', [ProjectController::class, 'repositoryDiff'])->name('projects.repository.diff');
    Route::get('/projects/{project}/repository/file', [ProjectController::class, 'repositoryFile'])->name('projects.repository.file');
    Route::get('/projects-install', [ProjectController::class, 'projectInstall'])->name('projects.install');
    Route::resource('projects', ProjectController::class);

    Route::resource('gits', GitMonitorController::class);
    Route::get('gits/ajax', [GitMonitorController::class, 'gitAjax'])->name('gits.ajax');

    Route::resource('deployments', DeploymentController::class);

    /*COMPOSER PART*/
    Route::get('composer/{project}/json', [ComposerController::class, 'show'])->name('composer.json');
    Route::get('composer/{project}/packages', [ComposerController::class, 'packages'])->name('composer.packages');
    Route::post('composer/{project}/terminal', [ComposerController::class, 'terminal'])->name('composer.terminal');
    Route::get('composer/installed-packages', [ComposerController::class, 'installedPackages'])->name('composer.installed-packages');
    Route::get('/composer/terminal', [ComposerController::class, 'terminalPage'])->name('composer.terminal-page');
    Route::resource('composer', ComposerController::class);

    Route::resource('optimization', OptimizationController::class)->only(['index']);
    Route::post('/optimization/local', [OptimizationController::class, 'localOptimize'])->name('optimization.local');
    Route::post('/optimization/live', [OptimizationController::class, 'liveOptimize'])->name('optimization.live');
    Route::post('/optimization/hosting',[OptimizationController::class, 'liveHostingForm'])->name('optimization.hosting');
    Route::post('optimization/run', [OptimizationController::class, 'run'])->name('optimization.run');
    Route::post('/optimization/check-server',[OptimizationController::class, 'checkServer'])->name('optimization.checkServer');
    Route::get('/queue-monitor', [QueueMonitorController::class, 'index'])->name('queue.index');

    /*CRON PART*/
    Route::get('/cron', [CronController::class, 'index'])->name('cron.index');
    Route::post('/cron/{project}/run', [CronController::class, 'run'])->name('cron.run');
    Route::get('/cron/{project}/logs', [CronController::class, 'logs'])->name('cron.logs');
    Route::get('/cron/{project}/status', [CronController::class, 'status'])->name('cron.status');
    Route::get('/cron/{project}/history', [CronController::class, 'history'])->name('cron.history');

    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
    Route::get('/server-health', [ServerHealthController::class, 'index'])->name('server.index');
    Route::resource('environment', EnvironmentController::class);

    //Setting Management
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::post('/permissions/delete-selected', [PermissionController::class, 'deleteSelected'])->name('permissions.deleteSelected');
    Route::resource('system_users', SystemUserController::class);
    Route::resource('ban_users', BanUserController::class);
    Route::resource('system_problems', SystemProblemController::class);
    Route::post('/system-users/{user}/change-password', [SystemUserController::class, 'updatePassword'])->name('system_users.password.update');

    //Setting Routes
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/settings/password_policy', [SettingController::class, 'password_policy'])->name('settings.password_policy');
    Route::get('/settings/2fa', [SettingController::class, 'show2FA'])->name('settings.2fa');
    Route::post('/settings/toggle-2fa', [SettingController::class, 'toggle2FA'])->name('settings.toggle2fa');
    Route::get('/settings/2fa/resend', [SettingController::class, 'resend'])->name('settings.2fa.resend');
    Route::post('/settings/2fa/verify', [SettingController::class, 'verify'])->name('settings.2fa.verify');
    Route::get('/settings/timeout', [SettingController::class, 'showTimeout'])->name('settings.timeout');
    Route::post('/settings/timeout', [SettingController::class, 'updateTimeout'])->name('settings.timeout.update');
    Route::get('/settings/database-backup', [SettingController::class, 'databaseBackup'])->name('settings.database.backup');
    Route::post('/settings/database-backup/download', [SettingController::class, 'downloadDatabase'])->name('settings.database.backup.download');
    Route::get('/settings/logs', [SettingController::class, 'logs'])->name('settings.logs');
    Route::post('/settings/logs/clear', [SettingController::class, 'clearLogs'])->name('settings.clearLogs');
    Route::get('/settings/maintenance', [SettingController::class, 'maintenance'])->name('settings.maintenance');
    Route::post('/settings/maintenance', [SettingController::class, 'maintenanceUpdate'])->name('settings.maintenance.update');
    Route::get('/settings/language', [SettingController::class, 'language'])->name('settings.language');
    Route::post('/settings/language/update', [SettingController::class, 'updateLanguage'])->name('settings.language.update');
});

require __DIR__ . '/auth.php';
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');
