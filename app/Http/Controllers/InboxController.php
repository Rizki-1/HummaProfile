<?php

namespace App\Http\Controllers;

use App\Http\Requests\InboxStoreRequest;
use App\Http\Requests\ReplyStoreRequest;
use App\Mail\InboxMail;
use App\Models\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inboxes = Inbox::orderBy("created_at", "desc")->paginate(10);
        return view("inbox.index", compact("inboxes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InboxStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $inbox = new Inbox;
            $inbox->name = $request->name;
            $inbox->email = $request->email;
            $inbox->message = $request->message;
            $inbox->save();

            DB::commit();

            return to_route('inbox.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil mengirim pesan!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Ada kesalahan saat membuat berita!'
            ]);
        }
    }

    public function show(string $id)
    {
        $inbox = Inbox::where('id', $id)->first();
        if (!$inbox) {
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Gagal mereply, id inbox tidak ditemukan!'
            ]);
        }

        return view('inbox.show', compact('inbox'));
    }
    public function reply(ReplyStoreRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $inbox = Inbox::where('id', $id)->first();
            $email = $inbox->email;
            if (!$inbox) {
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => 'Gagal mereply, id inbox tidak ditemukan!'
                ]);
            }

            $data = array_merge($inbox->toArray(), $request->all());

            Mail::to($email)->send(new InboxMail($data));

            $inbox->status = 2;
            $inbox->save();

            DB::commit();
            return back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil mereply ke email: ' . $email
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Gagal mereply, ada suatu kesalahan!'
            ]);
        }
    }
}