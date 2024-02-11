<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function destroy(Commentaire $comment)
    {
        // Ensure the comment exists
        if (!$comment) {
            return redirect()->back()->with('error', 'Comment not found.');
        }

        // Delete the comment
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
