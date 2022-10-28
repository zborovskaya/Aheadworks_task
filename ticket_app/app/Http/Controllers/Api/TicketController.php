<?php

namespace App\Http\Controllers\Api;

use App\Models\Ticket;
use App\Services\TicketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTGuard;

class TicketController extends Controller
{
    private $service;

    public function __construct(TicketService $service)
    {
        $this->service = $service;
    }

    public function checkToken()
    {
        try {
            $user = auth('api')->userORFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 401);
        }
    }

    public function index()
    {
        return response()->json(Ticket::get(), 200);
    }

    public function ticketById($id)
    {
        $ticket = Ticket::find($id);
        if (is_null($ticket)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        return response()->json($ticket, 200);
    }

    public function ticketSave(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'uid' => 'required|unique:tickets|max:255',
            'subject' => 'required',
            'user_name' => 'required|string',
            'user_email' => 'required|string|email',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $ticket = Ticket::create($req->all());

        $this->service->sendEmail($ticket->user_email);
        return response()->json($ticket, 201);
    }

    public function ticketEdit(Request $req, $id)
    {
        $ticket = Ticket::find($id);
        if (is_null($ticket)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $ticket->update($req->all());
        return response()->json($ticket, 200);
    }

    public function ticketDelete(Request $req, $id)
    {
        $ticket = Ticket::find($id);
        if (is_null($ticket)) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $ticket->delete();
        return response()->json('', 200);
    }
}
