<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function submitFormToAddProducts(Request $request)
    {

        $validatedData = $request->validate([
            'productName' => 'required|string|max:255',
            'productPrice' => 'required|numeric|min:0',
            'productDescription' => 'required|string',
        ]);

        $product = new Product;
        $product->productName = $validatedData['productName'];
        $product->productPrice = $validatedData['productPrice'];
        $product->productDescription = $validatedData['productDescription'];

        $product->save();

        return redirect()->route('home')->with('success', 'Product added successfully!');
    }
    public function viewUserInfo()
    {
        $userInfo = User::all();

        return response()->json(['users' => $userInfo]);
    }

    public function updateUser($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            abort(404);
        }

        return response()->json(['users' => $user]);
    }

    public function saveUpdatedUser(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            abort(404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'usertype' => 'required|in:user,admin',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->usertype = $validatedData['usertype'];
        $user->save();

        return redirect()->back()->with('success', 'User information updated successfully.');
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            abort(404);
        }

        $user->delete();

        return redirect()->back()->with('success', 'User account deleted successfully.');
    }
    
}
