<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\AgentProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class AgentProductController extends Controller
{
    public function sotish(Request $request, int $id)
    {
        $product_id = $request->input('product_id');
        $price = $request->input('price');

        $parentAgent = Agent::find($id);
        if (!$parentAgent) {
            return redirect()->back()->with('error', 'Agent topilmadi!');
        }

        $product = Product::find($product_id);
        if (!$product) {
            return redirect()->back()->with('error', 'Mahsulot topilmadi!');
        }

        $this->sellProductRecursively($parentAgent, $product_id, $price, $id);

        return redirect()->back()->with('success', 'Mahsulot barcha agentlarga sotildi!');
    }

    private function sellProductRecursively(Agent $agent, $product_id, $price, $parent_id)
    {
        AgentProduct::create([
            'product_id' => $product_id,
            'parent_id' => $parent_id,
            'price' => $price
        ]);

        foreach ($agent->children as $child) {
            $this->sellProductRecursively($child, $product_id, $price, $parent_id);
        }
    }
}
