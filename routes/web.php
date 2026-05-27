<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\QuoteRequest;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactInquiry;
use App\Mail\ContactInquiryMail;
use App\Http\Controllers\ShopController;
use App\Services\CsvProductRepository;



Route::get('/', function () {
    // Homepage categories come from the CSV catalog, not the DB.
    $categories = CsvProductRepository::categories();

    return view('welcome', compact('categories'));
});
/*
|--------------------------------------------------------------------------
| SHOP ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/shop/search', [ShopController::class, 'search'])
    ->name('shop.search');

Route::get('/shop', [ShopController::class, 'index'])
    ->name('shop');

Route::get('/shop/{slug}', [ShopController::class, 'category'])
    ->name('shop.category');

Route::get('/attachments', [ShopController::class, 'attachments'])
    ->name('attachments');

Route::get('/attachments/{slug}', [ShopController::class, 'attachmentCategory'])
    ->name('attachments.category');


/*
|--------------------------------------------------------------------------
| Product Details
|--------------------------------------------------------------------------
*/

Route::get('/product/{slug}', function (string $slug) {
    $product = CsvProductRepository::findBySlug($slug);

    if (! $product) {
        abort(404);
    }

    $relatedProducts = CsvProductRepository::related(
        categorySlug: $product->primaryCategorySlug,
        excludeSlug:  $product->slug,
        limit:        3,
    );

    return view('product-details', compact('product', 'relatedProducts'));
})->name('product.details');


/*
|--------------------------------------------------------------------------
| Quote Request
|--------------------------------------------------------------------------
*/

Route::get('/quote/{slug}', function (string $slug) {
    $product = CsvProductRepository::findBySlug($slug);

    if (! $product) {
        abort(404);
    }

    return view('quote-request', compact('product'));
})->name('quote.form');

Route::post('/quote-submit', function (Request $request) {

    $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'phone'   => 'nullable|string|max:50',
        'company' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:100',
        'message' => 'nullable|string|max:5000',
    ]);

    // Products are now CSV-based (no DB IDs). We store the product name in
    // the message field so the quote record is still self-contained.
    $productName = $request->filled('product_name')
        ? '[Product: ' . $request->input('product_name') . '] '
        : '';

    QuoteRequest::create([
        'name'       => $request->name,
        'email'      => $request->email,
        'phone'      => $request->phone,
        'company'    => $request->company,
        'country'    => $request->country,
        'product_id' => null,
        'message'    => $productName . $request->message,
        'status'     => 'new',
    ]);

    return redirect()->back()->with('success', 'Quote request submitted! We will be in touch shortly.');
})->name('quote.submit');


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::get('/admin/products', function () {
    return view('admin-products');
})->name('admin.products');


/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact-submit', function (Request $request) {

    $inquiry = ContactInquiry::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'company' => $request->company,
        'country' => $request->country,
        'message' => $request->message,
        'status' => 'new',
    ]);

    Mail::to('sales@americanminiexcavator.com')
        ->send(new ContactInquiryMail($inquiry));

    return redirect()->back()->with('success', 'Your message has been sent successfully!');
})->name('contact.submit');


/*
|--------------------------------------------------------------------------
| Static Pages
|--------------------------------------------------------------------------
*/

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/mini-excavator-landing', function () {
    $topics = [
        [
            'slug' => 'buying-guides',
            'eyebrow' => 'Buying Guides',
            'title' => 'Choose the right mini excavator for your crew and budget',
            'description' => 'Compare machine size, digging depth, transport needs, and attachment compatibility before you buy.',
            'points' => ['Machine size match', 'Transport planning', 'Return on investment'],
        ],
        [
            'slug' => 'attachments-tools',
            'eyebrow' => 'Attachments-Tools',
            'title' => 'Build one machine into a multi-jobsite tool carrier',
            'description' => 'Pair your excavator with buckets, breakers, augers, grapples, and trenching tools for more billable work.',
            'points' => ['Bucket options', 'Hydraulic tool matching', 'Quick-change workflow'],
        ],
        [
            'slug' => 'maintenance-repair',
            'eyebrow' => 'Maintenance & Repair',
            'title' => 'Protect uptime with simple service habits',
            'description' => 'Keep hydraulic components, filters, tracks, grease points, and cooling systems in a reliable service rhythm.',
            'points' => ['Daily checks', 'Service intervals', 'Wear-part monitoring'],
        ],
        [
            'slug' => 'safety-training',
            'eyebrow' => 'Safety-Training',
            'title' => 'Train operators to work safely around people and utilities',
            'description' => 'Use practical checklists for start-up inspections, swing radius awareness, trench work, and trailer loading.',
            'points' => ['Pre-start inspection', 'Stability awareness', 'Crew communication'],
        ],
        [
            'slug' => 'operator-tips',
            'eyebrow' => 'Operator-Tips',
            'title' => 'Help new operators work smoother and faster',
            'description' => 'Share habits that improve trench accuracy, cycle times, visibility, and confidence in tight residential jobsites.',
            'points' => ['Smoother controls', 'Cleaner trench lines', 'Less rework'],
        ],
        [
            'slug' => 'jobsite-project-guides',
            'eyebrow' => 'Jobsite-Project-Guides',
            'title' => 'Plan compact excavation work from setup to finish',
            'description' => 'Use mini excavators more effectively for landscaping, drainage, utility prep, foundation digging, and cleanup.',
            'points' => ['Site preparation', 'Task sequencing', 'Finish-grade support'],
        ],
    ];

    $highlights = [
        'Compact mini excavator focus built around the TYPHON KUVUO 4.0 product context you shared.',
        'Content structure designed for future articles, videos, buying resources, and SEO landing sections.',
        'Clear jump links so visitors can scan by topic and reach the right resource faster.',
    ];

    $checklist = [
        'Match machine size to the narrowest access point on your most common jobs.',
        'Confirm hydraulic flow before choosing breakers, augers, or other powered attachments.',
        'Plan daily inspections for tracks, hoses, pins, grease points, and fluid levels.',
        'Train operators on trench edges, overhead hazards, bystander zones, and trailer loading.',
    ];

    return view('mini-excavator-landing', compact('topics', 'highlights', 'checklist'));
})->name('mini-excavator.landing');


/*
|--------------------------------------------------------------------------
| Blog Details
|--------------------------------------------------------------------------
*/

Route::get('/blog/{slug}', function ($slug) {

    $posts = [

        'mini-excavator-buying-guide' => [
            'category' => 'Buying Guide',
            'title' => 'Mini Excavator Buying Guide: 7 Things to Know Before Buying',
            'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd',
            'content' => '
                <p>Buying a mini excavator is a major investment for contractors, landscapers, farmers, and businesses.</p>

                <h2>1. Understand Your Job Requirements</h2>
                <p>Think about digging depth, lifting capacity, and jobsite space.</p>

                <h2>2. Check Engine & Hydraulic Performance</h2>
                <p>Hydraulic flow and engine horsepower affect machine performance.</p>

                <h2>3. Compare Attachments</h2>
                <p>Attachments improve machine versatility and ROI.</p>
            '
        ],

        'forklift-safety-tips' => [
            'category' => 'Safety',
            'title' => 'Forklift Safety Tips Every Operator Should Know',
            'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952',
            'content' => '
                <p>Forklift safety is essential in warehouses and job sites.</p>

                <h2>1. Inspect Before Use</h2>
                <p>Always inspect tires, brakes, forks, and hydraulics before operation.</p>

                <h2>2. Follow Load Limits</h2>
                <p>Never exceed rated load capacity.</p>

                <h2>3. Train Operators</h2>
                <p>Certified training reduces accidents and equipment damage.</p>
            '
        ],

        'wheel-loader-vs-skid-steer' => [
            'category' => 'Industry Tips',
            'title' => 'Wheel Loader vs Skid Steer: Which One Should You Buy?',
            'image' => 'https://images.unsplash.com/photo-1489515217757-5fd1be406fef',
            'content' => '
                <p>Choosing between a wheel loader and skid steer depends on your workload.</p>

                <h2>Wheel Loader Advantages</h2>
                <p>Great for bulk material handling and heavy lifting.</p>

                <h2>Skid Steer Advantages</h2>
                <p>Compact, agile, and attachment-friendly.</p>

                <h2>Which One Is Best?</h2>
                <p>Depends on your jobsite size and work requirements.</p>
            '
        ],

    ];

    if (!isset($posts[$slug])) {
        abort(404);
    }

    $post = $posts[$slug];

    return view('blog-details', compact('post'));

})->name('blog.details');

Route::get('/scriptb', function () {
    return view('scriptb');
})->name('scriptb');
