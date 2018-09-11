<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Products\Transformations\ProductTransformable;
use App\Shop\Products\Repositories\ProductRepository;
use App\Shop\Products\Product;

class HomeController extends Controller
{
    use ProductTransformable;

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->productRepo = $productRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    // public function index()
    // {
    //     $cat1 = $this->categoryRepo->findCategoryById(12);
    //     $cat2 = $this->categoryRepo->findCategoryById(16);

    //     return view('front.index', compact('cat1', 'cat2'));
    // }
    public function index()
    {
        $list = $this->productRepo->getListProductsWithCondition();
        $products = $list->map(function (Product $item) {
            return $this->transformProduct($item);
        })->all();
        
        return view('front.index', [
            'products' => $products
        ]);
    }

}
