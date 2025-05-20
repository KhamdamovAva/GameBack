<?php
namespace App\Http\Controllers\v1\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Product\ProductResource;
use App\Interfaces\Services\ProductServiceInterface;

class ProductController extends Controller
{
    public function __construct(protected ProductServiceInterface $productService)
    {

    }
    public function index(Request $request)
    {
        $page = intval($request->p ?? 12);
        $products = $this->productService->getAllProducts($page);
        return $this->responsePagination($products,ProductResource::collection($products), __('successes.products.all'));
    }
    public function show(string $slug)
    {
        $product = $this->productService->getProduct($slug);
        $relatedProducts = $product->relatedProducts();
        return $this->success( [
            'product' => new ProductResource($product),
            'related_products' => ProductResource::collection($relatedProducts)
        ], __('successes.products.show'));
    }
    public function search(Request $request){
        $products = $this->productService->searchProductByName($request->q);
        return $this->responsePagination($products, ProductResource::collection($products), __('successes.products.search'));
    }

}
