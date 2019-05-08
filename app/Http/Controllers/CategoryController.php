<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function getMany(Request $request)
    {
        $paginatedResult = Category::with('coverages')->orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getSimpleList()
    {
        return response()->json(Category::all('ID', 'Name'));
    }

    public function getOne($id)
    {
        return response()->json(Category::with('coverages')->findOrFail($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required|unique:categories,Name'
        ]);

        $category = Category::create($request->all());

        $data = [
            'message' => 'Successfully created a Category',
            'data' => $category
        ];

        return response()->json($data, 201);
    }

    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        $data = [
            'message' => 'Successfully updated a category',
            'data' => $category
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function restore($id)
    {
        Category::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restored Successfully', 200);
    }
}
