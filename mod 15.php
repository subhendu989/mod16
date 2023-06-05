<!-- Question 1: -->

$name = $request->input('name');

use Illuminate\Http\Request;


<!-- Question 2: -->

$userAgent = $request->header('User-Agent');

use Illuminate\Http\Request;

<!-- Question 3: -->
$page = $request->query('page');

use Illuminate\Http\Request;

<!-- Question 4: To create a JSON response in Laravel with the provided data -->

$response = [
    'message' => 'Success',
    'data' => [
        'name' => 'John Doe',
        'age' => 25,
    ],
];

return response()->json($response);
<!-- Question 5: -->

if ($request->hasFile('avatar')) {
    $file = $request->file('avatar');
    $filePath = $file->store('public/uploads');
    $fileName = $file->getClientOriginalName();
}

use Illuminate\Http\Request;

<!-- Question 6: -->

$rememberToken = $request->cookie('remember_token');

