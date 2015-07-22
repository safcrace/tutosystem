<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use TeachMe\Entities\TicketComment;
use TeachMe\Entities\Ticket;

class CommentsController extends Controller {

	public function submit($id, Request $request, Guard $auth)
	{
		$this->validate($request, [
			'comment' => 'required|max:250',
			'link'	=>	'url'
		]);

		$comment = new TicketComment($request->only(['comment', 'link']));
		$comment->user_id = $auth->id();

		$ticket = Ticket::findOrFail($id);
		$ticket->comments()->save($comment);

		session()->flash('success', 'Tu comentario fue guardado exitosamente');

		return redirect()->back();
	}
}
