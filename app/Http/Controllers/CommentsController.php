<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function destroy(Commentaire $comment)
    {
        if (!$comment) {
            return redirect()->back()->with('error', 'Comment not found.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
