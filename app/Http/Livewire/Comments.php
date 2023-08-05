<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\File;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Comments extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $photo;
    // public $comments;
    public $newComment;
    public $teckitId = 1;
    protected $listeners = ['ticketSelected'];


    protected $rules = [
        'newComment' => 'required|min:6',
        'photo' => 'image|max:1024', // 1MB Max
    ];

    // protected function rules()
    // {
    //     return ['newComment' => 'required|min:6'];
    // }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    // public function mount()
    // {
    //     $this->comments = Comment::latest()->get();
    // }
    public function addComment()
    {
        // if ($this->comments == "") {
        //     return;
        // }
        // array_unshift($this->comments, [
        //     'creator' => 'me',
        //     'created_at' => Carbon::now()->diffForHumans(),
        //     'body' => $this->newComment,
        // ]);
        try {

            $validatedData = $this->validate();

            DB::beginTransaction();
            // dd(Comment::create([
            //     'user_id' => 1,
            //     'body' => $validatedData['newComment'],
            //     'tiket_id' => $this->teckitId
            // ]));
            $createdComment = Comment::create([
                'user_id' => 1,
                'body' => $validatedData['newComment'],
                'tiket_id' => $this->teckitId
            ]);
            // dd($createdComment);
            $this->storeImage($this->photo, $createdComment);
            $this->newComment = "";
            $this->photo = "";
            DB::commit();
            session()->flash('message', 'comment  successfully created.😊 ');
        } catch (\Exception $th) {
            DB::rollBack();
            return $th;
        }
    }
    public function ticketSelected($id)
    {
        $this->teckitId = $id;
    }

    public function storeImage($file, $type)
    {
        $imageName = Str::random() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('images', $imageName, 'public');
        File::create([
            'File_name' => 'images/' . $imageName,
            'Fileable_id' => $type->id,
            'Fileable_type' => get_class($type)
        ]);
    }
    public function remove($commentId)
    {
        // dd($commentId);
        $comment = Comment::find($commentId);
        $this->deleteImage($commentId);
        $comment->delete();
        // $this->comments = $this->comments->except($commentId);
        session()->flash('message', 'comment  successfully deleted.😊 ');


    }
    public function deleteImage($id)
    {
        $image = File::where('Fileable_id', $id)->get();
        foreach ($image as $file) {
            Storage::disk('public')->delete($file->File_name);
            $file->delete();
        }

    }
    public function render()
    {
        $comments = Comment::where('tiket_id', $this->teckitId)->with('file')->paginate(3);
        return view('livewire.comments', [
            'comments' => $comments
        ]);
    }
}