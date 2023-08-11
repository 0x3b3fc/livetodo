<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|min:5|max:50')]
    public $name;

    public $search;

    public $EditingTodoId;

    #[Rule('required|min:5|max:50')]
    public $EditingName;

    public function create()
    {
        //validate
        $this->validateOnly('name');
        //create todo
        Todo::create([
            'name' => $this->name,
        ]);
        //clean input
        $this->reset('name');
        //flash message
        request()->session()->flash('success', 'Task Saved Successfully!');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        request()->session()->flash('success', 'Task Deleted Successfully!');
    }

    public function toggle($todoID)
    {
        $todo = Todo::find($todoID);
        $todo->completed = ! $todo->completed;
        $todo->save();
    }

    public function edit($todoID)
    {
        $this->EditingTodoId = $todoID;
        $this->EditingName = Todo::find($todoID)->name;
    }

    public function cancelEdit()
    {
        $this->reset('EditingTodoId', 'EditingName');
    }

    public function update()
    {
        $this->validateOnly('EditingName');
        Todo::find($this->EditingTodoId)->update([
            'name' => $this->EditingName,
        ]);
        $this->cancelEdit();
    }

    public function render()
    {
        $todos = Todo::OrderBy('created_at', 'DESC')->where('name', 'like', "%{$this->search}%")->paginate(3);

        return view('livewire.todo-list', compact('todos'));
    }
}
