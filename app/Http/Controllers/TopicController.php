<?php

namespace App\Http\Controllers;

use App\Http\Traits\TJsonResponse;
use App\Models\Content;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    use TJsonResponse;
    public function index(){
        $topics = Topic::query()->with('subject')->get();
        return view('admin.topics.index', compact('topics'));
    }

    public function create(){
        $subjects = Subject::query()->get();
        return view('admin.topics.create', compact('subjects'));
    }
    public function edit($t_id){
        $topic = Topic::query()->find($t_id);
        if (!$topic)
            return redirect()->route('topics.index');
        $subjects = Subject::query()->get();

        return view('admin.topics.edit', compact('topic', 'subjects'));
    }


    public function update($t_id, Request $request){
        $topic = Topic::query()->find($t_id);
        if (!$topic)
            return redirect()->route('topics.index');
        $topic->update([
            'name' => $request->get('name'),
            'subject_id' => $request->get('subject_id')
        ]);
        return redirect()->route('topics.index')->with('success', 'updated successfully!');

    }

    public function delete($t_id){
        $topic = Topic::query()->find($t_id);
        if (!$topic)
            return redirect()->route('topics.index');
        $topic->delete();
        return redirect()->route('topics.index')->with('success', 'deleted successfully!');
    }

    public function store(Request $request){
        Topic::query()->create([
            'name' => $request->get('name'),
            'subject_id' => $request->get('subject_id')
        ]);

        return redirect()->route('topics.index')->with('success', 'created successfully!');
    }


    public function getTopicContents($topic_id){
        $data = Content::query()->where('topic_id', $topic_id)->first();
        return $this->successResponse(null, $data);
    }
}
