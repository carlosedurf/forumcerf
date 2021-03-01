<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use function Psy\debug;

class ReplyController extends Controller
{

    public function store(ReplyRequest $request)
    {

        try{
            $reply = $request->all();
            $reply['user_id'] = 1;

            $thread = Thread::find($request->thread_id);
            $thread->replies()->create($reply);

            flash('Resposta criada com sucesso!')->success();
            return redirect()->back();

        }catch (\Exception $e){
            $message = config('app.debug') ? $e->getMessage() : 'Erro ao provessar sua requisição!';
            flash($message)->warning();
            return redirect()->back();
        }

    }

}
