<?php

namespace App\Http\Controllers\Jdih\Legislation;

use App\Http\Controllers\Jdih\Legislation\LegislationController;
use App\Http\Traits\VisitorTrait;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Legislation;

class MonographController extends LegislationController
{
    use VisitorTrait;

    private $categories;

    public function __construct(Request $request)
    {
        // Record visitor
        $this->recordVisitor($request);

        $this->categories = Category::ofType(2)
            ->sorted()
            ->pluck('name', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $legislations = Legislation::ofType(2)
            ->with(['category', 'category.type'])
            ->filter($request)
            ->published()
            ->sorted($request)
            ->paginate($this->limit)
            ->withQueryString();

        $vendors = [
            'assets/jdih/js/vendor/forms/selects/select2.min.js',
        ];

        return view('jdih.legislation.monograph.index', compact(
            'legislations',
            'vendors',
        ))->with('categories', $this->categories)
            ->with('orderOptions', $this->orderOptions);
    }

    public function category(Category $category, Request $request)
    {
        $legislations = Legislation::ofType(2)
            ->where('category_id', $category->id)
            ->published()
            ->sorted($request)
            ->paginate($this->limit)
            ->withQueryString();

        $categories = Category::ofType(2)
            ->sorted()
            ->pluck('name', 'id');

        $vendors = [
            'assets/jdih/js/vendor/forms/selects/select2.min.js',
        ];

        return view('jdih.legislation.monograph.index', compact(
            'legislations',
            'category',
            'vendors',
        ))->with('categories', $this->categories)
            ->with('orderOptions', $this->orderOptions);
    }

}
