<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getById($id)
    {
        return Category::findOrFail($id);
    }
    
    public function create(array $data)
    {
        return Category::create($data);
    }
    public function getAll()
    {
        return Category::all();
    }

    public function update($id, array $data)
    {
        $category = $this->getById($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = $this->getById($id);
        $category->delete();
    }
}