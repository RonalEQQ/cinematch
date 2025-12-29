<?php

namespace App\Livewire;

use App\Events\CommentCreated;
use Livewire\Component;
use App\Models\Comment;
use App\Models\Movie;

class MovieComments extends Component
{
    public Movie $movie;
    public $content = '';
    public $editingId = null;

    protected $rules = [
        'content' => 'required|min:2'
    ];
    protected $listeners = [
    'echo:movie.{movie.id},CommentCreated' => '$refresh'
    ];

    public function add()
    {
        $this->validate();

        $comment = Comment::create([
                'user_id' => auth()->id(),
                'movie_id' => $this->movie->id,
                'content' => $this->content
            ]);

        broadcast(new CommentCreated($comment))->toOthers();

        $this->content = '';
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        $this->editingId = $id;
        $this->content = $comment->content;
    }

    public function update()
    {
        Comment::find($this->editingId)
            ->update(['content' => $this->content]);

        $this->editingId = null;
        $this->content = '';
    }

    public function delete($id)
    {
        Comment::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.movie-comments', [
            'comments' => Comment::where('movie_id', $this->movie->id)
                ->latest()->get()
        ]);
    }
}

