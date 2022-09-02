<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoFormController extends Controller
{
    //一覧表示
    public function index() {
        $todolists = Todo::all();
        return view('MessageBoard.index', compact('todolists'));
    }
    //絞り込み表示
    public function search(Request $request) {
        if ($request->done == 0 && $request->has('keywords'))
        {
            $todolists = Todo::where('done', False)
            ->Where('detail', 'LIKE', '%'.$request->keywords.'%')
            ->orWhere('title', 'LIKE', '%'.$request->keywords.'%')
            ->where('done', False)
            ->get();
            return view('MessageBoard.index', compact('todolists'));
        }
        elseif ($request->done == 1 && $request->has('keywords'))
        {
            $todolists = Todo::where('done','=', True)
            ->Where('detail', 'LIKE', '%'.$request->keywords.'%')
            ->orWhere('title', 'LIKE', '%'.$request->keywords.'%')
            ->where('done','=', True)
            ->get();
            return view('MessageBoard.index', compact('todolists'));
        }else{
            $todolists = Todo::where('detail', 'LIKE', '%'.$request->keywords.'%')
            ->orWhere('title', 'LIKE', '%'.$request->keywords.'%')
            ->get();
            return view('MessageBoard.index', compact('todolists'));
        }
    }

    //詳細表示
    public function detail($id){
        $todolist = Todo::find($id);
        return view('MessageBoard.detail', compact('todolist'));
    }


    //入力画面表示
    public function input(){
        return view('MessageBoard.add');
    }

    //登録
    public function add(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'min:2', 'max:20'],
            'detail' => ['required', 'min:2', 'max:100']
            ]);

        if ($request->has('send')) {
            $new_todo = new Todo();
            $new_todo->title = $request->title;
            $new_todo->detail = $request->detail;
            $new_todo->done = $request->done;
            $new_todo->save();
            /* 完了画面を表示する */
            return redirect('/MessageBoard/index');
            }
    }
        //論理削除
        protected function change($id)
        {
            $todo_change = Todo::find($id);
            if($todo_change-> done == 0){
                $todo_change-> done = 1;
            }elseif($todo_change-> done == 1){
                $todo_change-> done = 0;
            }
            $todo_change->save();
            return redirect('/MessageBoard/index');
        }

    //論理削除
    protected function performDeleteOnModel($id)
    {
        Todo::find($id)->delete();
        return redirect('/MessageBoard/index');
    }

    //ごみ箱
    public function remove(){
        $deletelists = Todo::onlyTrashed()->get();
        return view('MessageBoard.remove', compact('deletelists'));
    }

    //復元
    public function remove_acction($id)
    {
        Todo::withTrashed()->find($id)->restore();
        return redirect('/MessageBoard/index');
    }

    //削除実行
    public function deleted($id){
        Todo::withTrashed()->find($id)->forceDelete();
        return redirect('/MessageBoard/index');
    }

    //編集
    public function edit($id){
        $todo = Todo::find($id);
        return view('MessageBoard.edit', compact('todo'));
    }

    //編集保存
    public function update(Request $request, $id)
    {
        if ($request->has('back')) {
            return redirect('/MessageBoard/index');
        }

        $this->validate($request, [
            'title' => ['required', 'min:2', 'max:20'],
            'detail' => ['required', 'min:2', 'max:100']
            ]);

        if ($request->has('send')) {
            $new_todo = Todo::find($id);
            $new_todo->title = $request->title;
            $new_todo->detail = $request->detail;
            $new_todo->save();
            /* 完了画面を表示する */
            return redirect('/MessageBoard/index');
            }
    }
}
