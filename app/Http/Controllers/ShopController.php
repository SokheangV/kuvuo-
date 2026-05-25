<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Support\ProductCategoryResolver;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        return $this->renderShopPage($request);
    }

    public function category(Request $request, $slug)
    {
        $selectedCategory = Category::where('slug', $slug)->firstOrFail();

        return $this->renderShopPage($request, $selectedCategory);
    }

    private function renderShopPage(Request $request, ?Category $selectedCategory = null)
    {
        $categories = ProductCategoryResolver::menuCategories();

        $products = Product::with('category')
            ->when($selectedCategory, fn ($query) => $query->where('category_id', $selectedCategory->id))
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->string('search')->trim();

                $query->where(function ($searchQuery) use ($search) {
                    $searchQuery->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");
                });
            })
            ->when($request->input('sort') === 'low', fn ($query) => $query->orderBy('price'))
            ->when($request->input('sort') === 'high', fn ($query) => $query->orderByDesc('price'))
            ->when(! in_array($request->input('sort'), ['low', 'high'], true), fn ($query) => $query->latest())
            ->paginate(12)
            ->withQueryString();

        $pageTitle = $selectedCategory?->name ?? 'All Products';
        $pageDescription = $selectedCategory
            ? 'Browse all products in the ' . $selectedCategory->name . ' category.'
            : 'Browse premium equipment for construction, logistics and industrial performance.';
        $resultsLabel = $selectedCategory
            ? $selectedCategory->name . ' Products'
            : 'All Products';
        $shopFormAction = $selectedCategory
            ? route('shop.category', $selectedCategory->slug)
            : route('shop');

        return view('shop', compact(
            'categories',
            'products',
            'selectedCategory',
            'pageTitle',
            'pageDescription',
            'resultsLabel',
            'shopFormAction'
        ));
    }

    // ATTACHMENTS MAIN PAGE
public function attachments()
{
    $products = $this->attachmentQuery()->latest()->get();
    $category = (object) ['name' => 'All Attachments'];

    return view('shop-category', compact('category', 'products'));
}

    // ATTACHMENT CATEGORY PAGE
public function attachmentCategory($slug)
{
    $normalizedSlug = $this->normalizeAttachmentSlug($slug);
    $titles = [
        'mini-excavator' => 'Mini Excavator Attachments',
        '2-ton-and-below' => '2 Ton and Below Attachments',
        'x2' => 'X2 Attachments',
        'xxv' => 'XXV Attachments',
        'skid-steer' => 'Skid Steer Attachments',
        'compact-series-501-507' => 'Compact Series 501-507 Attachments',
        'standard-series-x1300-509' => 'Standard Series (X1300-509) Attachments',
    ];

    abort_unless(isset($titles[$normalizedSlug]), 404);

    $products = $this->attachmentQuery($normalizedSlug)->latest()->get();
    $category = (object) ['name' => $titles[$normalizedSlug]];

    return view('shop-category', compact('category', 'products'));
}

private function attachmentQuery(?string $slug = null)
{
    return Product::query()
        ->where(function ($query) {
            $query->where('name', 'LIKE', '%attachment%')
                ->orWhere('name', 'LIKE', '%bucket%')
                ->orWhere('name', 'LIKE', '%ripper%')
                ->orWhere('name', 'LIKE', '%auger%')
                ->orWhere('name', 'LIKE', '%grapple%')
                ->orWhere('name', 'LIKE', '%grabber%')
                ->orWhere('name', 'LIKE', '%thumb clip%')
                ->orWhere('name', 'LIKE', '%quick hitch%')
                ->orWhere('name', 'LIKE', '%quick coupler%')
                ->orWhere('name', 'LIKE', '%hammer%')
                ->orWhere('name', 'LIKE', '%breaker%')
                ->orWhere('name', 'LIKE', '%rake%')
                ->orWhere('name', 'LIKE', '%tiller%')
                ->orWhere('name', 'LIKE', '%pallet fork%')
                ->orWhere('name', 'LIKE', '%fork pallet%')
                ->orWhere('name', 'LIKE', '%sweeper%')
                ->orWhere('name', 'LIKE', '%stump grinder%')
                ->orWhere('name', 'LIKE', '%lawn mower%')
                ->orWhere('name', 'LIKE', '%scarifier%')
                ->orWhere('name', 'LIKE', '%trench filler%')
                ->orWhere('name', 'LIKE', '%land leveler%')
                ->orWhere('name', 'LIKE', '%dozer%')
                ->orWhere('name', 'LIKE', '%mulcher%')
                ->orWhere('name', 'LIKE', '%hedge trimmer%')
                ->orWhere('name', 'LIKE', '%tree digging blade%');
        })
        ->when($slug === 'mini-excavator', function ($query) {
            $query->where(function ($platform) {
                $platform->where('name', 'LIKE', '%mini excavator%')
                    ->orWhere('name', 'LIKE', '%excavator attachment%')
                    ->orWhere('name', 'LIKE', '%excavator%')
                    ->orWhere('name', 'LIKE', '%mini digger%')
                    ->orWhere('name', 'LIKE', '%terror x%')
                    ->orWhere('name', 'LIKE', '%terror xxv%')
                    ->orWhere('name', 'LIKE', '%2-3 ton%')
                    ->orWhere('name', 'LIKE', '%2.5 ton%');
            });
        })
        ->when($slug === 'skid-steer', function ($query) {
            $query->where(function ($platform) {
                $platform->where('name', 'LIKE', '%skid steer%')
                    ->orWhere('name', 'LIKE', '%stomp%')
                    ->orWhere('name', 'LIKE', '%x1300%')
                    ->orWhere('name', 'LIKE', '%509%');
            });
        })
        ->when($slug === '2-ton-and-below', function ($query) {
            $query->where(function ($size) {
                $size->where('name', 'LIKE', '%2 ton%')
                    ->orWhere('name', 'LIKE', '%2ton%')
                    ->orWhere('name', 'LIKE', '%2 tons%')
                    ->orWhere('name', 'LIKE', '%0.8-2 ton%')
                    ->orWhere('name', 'LIKE', '%800kg%')
                    ->orWhere('name', 'LIKE', '%mini excavators usa%');
            });
        })
        ->when($slug === 'x2', function ($query) {
            $query->where(function ($series) {
                $series->where('name', 'LIKE', '%x2%')
                    ->orWhere('name', 'LIKE', '%terror x%')
                    ->orWhere('name', 'LIKE', '%2-3 ton%')
                    ->orWhere('name', 'LIKE', '%2.5 ton%')
                    ->orWhere('name', 'LIKE', '%3.5 ton%');
            });
        })
        ->when($slug === 'xxv', function ($query) {
            $query->where(function ($series) {
                $series->where('name', 'LIKE', '%xxv%')
                    ->orWhere('name', 'LIKE', '%terror xxv%');
            });
        })
        ->when($slug === 'compact-series-501-507', function ($query) {
            $query->where(function ($model) {
                $model->where('name', 'LIKE', '%501%')
                    ->orWhere('name', 'LIKE', '%507%')
                    ->orWhere('name', 'LIKE', '%skid steer loader%');
            })
                ->where('name', 'NOT LIKE', '%x1300%')
                ->where('name', 'NOT LIKE', '%stomp%')
                ->where('name', 'NOT LIKE', '%509%');
        })
        ->when($slug === 'standard-series-x1300-509', function ($query) {
            $query->where(function ($model) {
                $model->where('name', 'LIKE', '%x1300%')
                    ->orWhere('name', 'LIKE', '%509%')
                    ->orWhere('name', 'LIKE', '%standard%');
            });
        });
}

private function normalizeAttachmentSlug(string $slug): string
{
    return match ($slug) {
        '2ton', '2-ton', '2-ton-below' => '2-ton-and-below',
        '507-509', 'compact', 'compact-series' => 'compact-series-501-507',
        'standard', 'x1300-509', 'standard-series' => 'standard-series-x1300-509',
        default => $slug,
    };
}


public function search(Request $request)
{
    return $this->renderShopPage($request);
}

}
