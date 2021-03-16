<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepositories
{
    public function getList($input = array())
    {
        $model = Category::withoutTrashed()
            ->select('id', 'name', 'parent_id', 'status', 'created_at', 'updated_at');

        if (isset($input['search']['name']) && $input['search']['name'] != "") {
            $model->where('name', 'LIKE', '%' . trim($input['search']['name']) . '%');
        }

        if (isset($input['search']['status']) && $input['search']['status'] != "") {
            $model->where('status', $input['search']['status']);
        }

        $result['total'] = $model->count();

        if (isset($input['iSortCol_0'])) {
            $sorting_mapping_array = array(
                '2' => 'name',
                '5' => 'created_at',
                '6' => 'updated_at',
            );

            $order = "desc";
            if (isset($input['sSortDir_0'])) {
                $order = $input['sSortDir_0'];
            }

            if (isset($sorting_mapping_array[$input['iSortCol_0']])) {
                $model->orderBy($sorting_mapping_array[$input['iSortCol_0']], $order);
            }
        }

        $model->skip($input['iDisplayStart'])->take($input['iDisplayLength']);

        $result['model'] = $model->get();
        return $result;
    }

    public function getNameParent($id)
    {
        $row = Category::select('name')->find($id);
        return $row->name;
    }

    public function firstOrCreate($data = [])
    {
        return Category::firstOrCreate(['slug' => $data['slug']], $data);
    }

    public function findOrFail($id)
    {
        return Category::findOrFail($id);
    }

    public function multiDelete($ids)
    {
        return Category::whereIn('id', $ids)->delete();
    }
}
