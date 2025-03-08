Composer create-project laravel/laravel Admin “11.*”
Cd Admincd
composer require laravel/breeze –dev
php artisan breeze:install
npm install && npm run dev
Php artisan migrate
composer require laravel/socialite

now setup google login client id
go to this link

https://console.cloud.google.com/

create new project 
and then go to api and services
click on enable api services
inside .env fil
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=

Then go to config/services.php
'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT_URI'),
],
Then:
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
Now go to User Model
use Spatie\Permission\Traits\HasRoles;
use HasRoles;

now
php artisan tinker
use Spatie\Permission\Models\Role;
Role::create(['name' => 'superadmin']);
Role::create(['name' => 'admin']);
Role::create(['name' => 'user']);

Add this in users migrate
$table->boolean('is_active')->default(false);
Again run to add these modified users table
Php artisan migrate:refresh

php artisan make:middleware EnsureUserIsActive
register middleware in bootstrap/app.php
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'active' => \App\Http\Middleware\EnsureUserIsActive::class,
        ]);
    })
php artisan make:controller AdminController
public function activateUser(User $user) { $user->update(['is_active' => true]); Mail::to($user->email)->send(new UserActivatedMail($user)); return back()->with('success', 'User activated successfully'); }

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('/admin/activate-user/{user}', [AdminController::class, 'activateUser']);
});
php artisan make:mail UserActivatedMail
    public function build()
    {
        return $this->subject('Your account is activated!')
                    ->view('emails.user_activated');
    }
resources/views/emails/user_activated.blade.php:
php artisan db:seed
Php artisan make:controller googlecontroller



