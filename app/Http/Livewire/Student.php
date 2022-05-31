<?php

namespace App\Http\Livewire;

use App\Models\Student as ModelsStudent;
use Livewire\Component;
use Livewire\WithPagination;

class Student extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        return view('livewire.student', [
            'datas' => ModelsStudent::query()
                ->where(function($query){
                    $query->where('name', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('studentID', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('email', 'LIKE', '%'.$this->search.'%');
                })
                ->orderBy('name', 'ASC')
                ->paginate(3),
        ]);
    }

}
