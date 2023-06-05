<!-- Task 1: Request Validation -->

<!-- Create a new form request using the artisan command: -->
php artisan make:request RegistrationRequest

public function rules()
{
    return [
        'name' => 'required|string|min:2',
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ];
}

<!-- RegistrationRequest -->
public function messages()
{
    return [
        'name.required' => 'The name field is required.',
        'name.min' => 'The name must be at least 2 characters.',
        'email.required' => 'The email field is required.',
        'email.email' => 'The email must be a valid email address.',
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 8 characters.',
    ];
}

<!-- RegistrationRequest class: -->

use App\Http\Requests\RegistrationRequest;

public function register(RegistrationRequest $request)
{
    // Validation passed, continue with registration logic
}

<!-- Task 2: Request Redirect -->

Route::get('/home', function () {
    return redirect('/dashboard');
});

<!-- Create a new middleware class using the artisan command: -->

php artisan make:middleware LogRequests

<!-- Modify the handle() method to log the request method and URL: -->

public function handle($request, Closure $next)
{
    \Log::info('Request: ' . $request->method() . ' ' . $request->fullUrl());

    return $next($request);
}


<!-- Register the middleware globally by adding it to the $middleware property in the App\Http\Kernel class located in the app/Http directory: -->

protected $middleware = [
    // Other middleware entries...
    \App\Http\Middleware\LogRequests::class,
];

<!-- Task 4: Route Middleware -->

php artisan make:middleware AuthMiddleware

<!-- handle() method to check if the user is authenticated: -->
public function handle($request, Closure $next)
{
    if (!auth()->check()) {
        return redirect('/login'); // Redirect to the login page if not authenticated
    }

    return $next($request);
}

<!-- Register the middleware in the $routeMiddleware -->

protected $routeMiddleware = [
    // Other middleware entries...
    'auth' => \App\Http\Middleware\AuthMiddleware::class,
];

<!-- Create the route group in your routes/web.php file and apply the auth middleware to it: -->

Route::middleware('auth')->group(function () {
    Route::get('/profile', 'ProfileController@index');
    Route::get('/settings', 'SettingsController@index');
});

<!-- Task 5: Controller -->

php artisan make:controller ProductController --resource

<!-- Open the generated ProductController class  -->

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate and store the newly created product
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the specified product
    }

    public function destroy($id)
    {
        // Delete the specified product
    }
}
<!-- Task 6: Single Action Controller -->

php artisan make:controller ContactController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __
