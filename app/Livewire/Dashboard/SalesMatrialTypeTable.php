<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\SalesMatrialType;

class SalesMatrialTypeTable extends Component
{
    use WithPagination;

    public $name;

    public function render()
    {

        $query = SalesMatrialType::query();

        if ($this->name) {
            $query->where('name', 'LIKE', '%' . $this->name . '%');
        }

        $com_code  = Auth::user()->com_code;
        $data = $query->with(['createdBy:id,name', 'updatedBy:id,name'])->where('com_code', $com_code)->orderByDesc('id')->paginate(10);
        return view('dashboard.settings.sales_matrial_types.sales-matrial-type-table', compact('data'));
    }
}
