<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\CategoryRepositories;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.category.index');
    }

    public function getList(Request $request, CategoryRepositories $categoryRepositories)
    {
        $input = $request->all();
        $data = array();

        $results = $categoryRepositories->getList($input);

        $data['iTotalRecords'] = $data['iTotalDisplayRecords'] = $results['total'];
        $ranking = $results['model'];

        $data['aaData'] = array();
        if (count($ranking) > 0)
        {
            foreach ($ranking as $row) {
                if($row->parent_id == 0) {
                    $showName = 'Danh mục cha';
                } else {
                    $showName = $categoryRepositories->getNameParent($row->parent_id);
                }

                $data['aaData'][] = [
                    "",
                    "<input type='checkbox' class='checkboxes'  name='chk[]' value='{$row->id}'>",
                    Str::words($row->name, 5, '...'),
                    Str::words($showName, 5, '...'),
                    showStatus($row->status),
                    $row->created_at->toDateTimeString(),
                    $row->updated_at->toDateTimeString(),
                    showAction('category', $row->id)
                ];
            }    
        }
        
        return json_encode($data);
    }

    public function create()
    {
        $parentCategories = Category::select('name', 'id')->where('parent_id', 0)->get();
        return view('backend.category.create',[
            'parentCategories' => $parentCategories
        ]);
    }

    public function store(Request $request, CategoryRepositories $categoryRepositories)
    {
        $input = $request->only([
            'name',
            'description',
            'parent_id',
            'meta_keyword',
            'meta_description'
        ]);
        $input['slug'] = Str::slug($input['name'], '-');
        $create = $categoryRepositories->firstOrCreate($input);
        return redirect()->route('admin.category.index');
    }

    public function status($id, CategoryRepositories $categoryRepositories) 
    {
        $row = $categoryRepositories->findOrFail($id);
        $input = [];
        if($row->status == STATUS_ACTIVE) {
            $input['status'] = STATUS_INACTIVE;
        } else {
            $input['status'] = STATUS_ACTIVE;
        }
        Category::where('id', $row->id)->update($input);
        return redirect()->route('admin.category.index');
    }

    public function softDeletes($id, CategoryRepositories $categoryRepositories)
    {
        $row = $categoryRepositories->findOrFail($id);
        $row->delete(); 
        return redirect()->route('admin.category.index');
    }

    public function multiDestroy(Request $request, CategoryRepositories $categoryRepositories)
    {
        $input = $request->get('data');
        parse_str($input, $result);

        if (isset($result['chk']) && is_array($result['chk'])) {
            if ($categoryRepositories->multiDelete($result['chk'])) {
                $data['result'] = true;
                $data['message'] = 'OK';
                return json_encode($data);
            }
        }

        $data['result'] = false;
        $data['message'] = 'NO OK';
        return json_encode($data);
    }
}
