<?php namespace TeachMe\Http\Controllers;

use TeachMe\Http\Requests;
use TeachMe\Http\Controllers\Controller;
use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;

use Illuminate\Http\Request;

class TicketsController extends Controller {

	public function latest()
	{
		$tickets = Ticket::orderBy('created_at', 'DESC')->paginate();
		return view('tickets.list', compact('tickets'));
	}

	public function popular()
	{
		$tickets = Ticket::orderBy('created_at', 'DESC')->paginate();
		return view('tickets.list', compact('tickets'));
	}

	public function open()
	{
		$tickets = Ticket::orderBy('created_at', 'DESC')->paginate();
		return view('tickets.list', compact('tickets'));
	}

	public function closed()
	{
		$tickets = Ticket::orderBy('created_at', 'DESC')->paginate();
		return view('tickets.list', compact('tickets'));
	}

	public function details($id)
	{
		$ticket = Ticket::findOrFail($id);
		return view('tickets.details', compact('ticket'));
	}

	public function create()
	{
		return view('tickets.create');
	}

	public function store(Request $request)
	{
		dd($request->all());
	}

}
