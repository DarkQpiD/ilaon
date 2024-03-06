<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\User;

class AdminIndex extends Component
{
    public $books;
    public $users;
    public $selectedBookId;
    public $selectedUserId;

    public function render()
    {
        $this->books = Book::all();
        $this->users = User::all();

        return view('livewire.admin.index');
    }

    public function editBook($bookId)
    {
        // ตัวอย่างการใช้งานเพียงแสดง Alert
        $this->selectedBookId = $bookId;
        $this->dispatchBrowserEvent('showEditBookModal');
    }

    public function deleteBook($bookId)
    {
        // ตัวอย่างการใช้งานเพียงแสดง Alert
        $this->selectedBookId = $bookId;
        $this->dispatchBrowserEvent('showDeleteBookModal');
    }

    public function editUser($userId)
    {
        // ตัวอย่างการใช้งานเพียงแสดง Alert
        $this->selectedUserId = $userId;
        $this->dispatchBrowserEvent('showEditUserModal');
    }

    public function deleteUser($userId)
    {
        // ตัวอย่างการใช้งานเพียงแสดง Alert
        $this->selectedUserId = $userId;
        $this->dispatchBrowserEvent('showDeleteUserModal');
    }
}
