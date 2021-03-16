<?php

use Illuminate\Support\Str;

function showAction($type, $id)
{
    $html = '';
    switch ($type) {
        case 'category':
            $html .= '<div class="dropdown">';
            $html .= '<span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"';
            $html .= 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">';
            $html .= '</span>';
            $html .= '<div class="dropdown-menu dropdown-menu-right">';
            $html .= '<a class="dropdown-item" href="' . route('admin.category.edit', $id) . '"><i class="bx bx-edit-alt mr-1"></i> edit</a>';
            $html .= '<a class="dropdown-item" href="' . route('admin.category.status', $id) . '"><i class="bx bx-pencil mr-1"></i> status</a>';
            $html .= '<a class="dropdown-item" href="' . route('admin.category.softDeletes', $id) . '"><i class="bx bx-trash mr-1"></i> delete</a>';
            $html .= '</div>';
            $html .= '</div>';
            break;

        default:
            # code...
            break;
    }

    return $html;
}

function showStatus($status)
{
    $html = '';
    if ($status == STATUS_INACTIVE) {
        $html .= '<span class="badge badge-light-danger badge-pill">OFF</span>';
    } else {
        $html .= '<span class="badge badge-light-success badge-pill">ON</span>';
    }

    return $html;
}

function getMenuActive($patterns, $activeClass = "active", $except = '')
{
    $currentRequest = Request::url();
    if (!$currentRequest) {
        return false;
    }
    if (!is_array($patterns)) {
        $patterns = array($patterns);
    }
    foreach ($patterns as $p) {
        if (Str::is($p, $currentRequest) && (empty($except) || !Str::is($except, $currentRequest))) {
            return $activeClass;
        }
    }
    return false;
}
