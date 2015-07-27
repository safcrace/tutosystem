<?php

namespace TeachMe\Repositories;

use TeachMe\Entities\Ticket;
/**
 * Class Reposiroty
 */
class TicketRepository
{
    protected function selectTikectsList()
	{
		return ticket::selectRaw(
		'tickets.*, '
		. '(SELECT COUNT(*) FROM ticket_comments WHERE ticket_comments.ticket_id = tickets.id) as num_comments,'
		. '(SELECT COUNT(*) FROM ticket_votes WHERE ticket_votes.ticket_id = tickets.id) as num_votes'
		)
		->with('author');
	}

    public function paginateLatest()
    {
        return $this->selectTikectsList()
		->orderBy('created_at', 'DESC')
		->paginate();
    }

    public function paginateOpen()
    {
        return $this->selectTikectsList()
        ->where('status', 'open')
		->orderBy('created_at', 'DESC')
		->paginate();
    }

    public function paginateClosed()
    {
        return $this->selectTikectsList()
        ->where('status', 'closed')
		->orderBy('created_at', 'DESC')
		->paginate();
    }

    public function findOrFail($id)
    {
        return Ticket::findOrFail($id);
    }

}
