<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(){
        $contents = Content::with(['subject', 'topic'])->get();
        return view('admin.contents.index', compact('contents'));
    }

    public function create(){
        $subjects = Subject::all();
        $topics = Topic::all();
        return view('admin.contents.create', compact('subjects', 'topics'));
    }

    public function edit($c_id){
        $content = Content::query()->find($c_id);
        if (!$content)
            return redirect()->route('content.index');
        $subjects = Subject::all();
        $topics = Topic::all();

        return view('admin.contents.edit', compact('subjects', 'content', 'topics'));
    }

    public function update($c_id, Request $request){
        $content = Content::query()->find($c_id);
        if (!$content)
            return redirect()->route('content.index');
        $content->update([
            'content' => $request->get('content'),
            'subject_id' => $request->get('subject_id'),
            'topic_id' => $request->get('topic_id'),
            'animation' => $request->get('animation'),
        ]);
        return redirect()->route('content.index')->with('success', 'created successfully!');

    }
    public function delete($c_id){
        $content = Content::query()->find($c_id);
        if (!$content)
            return redirect()->route('content.index');
        $content->delete();
        return redirect()->route('content.index')->with('success', 'created successfully!');
    }

    public function store(Request $request){
        Content::query()->create([
            'content' => $request->get('content'),
            'subject_id' => $request->get('subject_id'),
            'topic_id' => $request->get('topic_id'),
            'animation' => $request->get('animation'),

        ]);

        return redirect()->route('content.index');
    }


}
