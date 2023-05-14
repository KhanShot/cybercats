<?php

namespace App\Http\Controllers;

use App\Http\Traits\TJsonResponse;
use App\Models\Content;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    use TJsonResponse;
    public function index(){
        $subjects = Subject::all();
        return view('admin.subjects.index', compact('subjects'));
    }

    public function create(){
        return view('admin.subjects.create');
    }

    public function edit($s_id){
        $subject = Subject::query()->find($s_id);
        if (!$subject)
            return redirect()->route('subject.index');

        return view('admin.subjects.edit', compact('subject'));
    }

    public function update($s_id, Request $request){
        $subject = Subject::query()->find($s_id);
        if (!$subject)
            return redirect()->route('subject.index');
        $data = array(
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        );
        if ($request->hasFile("image")){
            unlink(public_path($subject->image));
            $path = "/assets/subjects";
            $name = $request->file("image")->hashName();
            $request->file("image")->move(public_path( $path), $name);
            $data['image'] = $path."/".$name;
        }
        $subject->update($data);
        return redirect()->route('subject.index')->with('success', 'updated successfully!');
    }

    public function delete($s_id){
        $subject = Subject::query()->find($s_id);
        if (!$subject)
            return redirect()->route('subject.index');
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'deleted successfully!');
    }

    public function store(Request $request){
        $data = array(
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        );
        if ($request->hasFile("image")){
            $path = "/assets/subjects";
            $name = $request->file("image")->hashName();
            $request->file("image")->move(public_path( $path), $name);
            $data['image'] = $path."/".$name;
        }
        Subject::query()->create($data);
        return redirect()->route('subject.index')->with('success', 'created successfully!');
    }

    public function getSubjects(){
        $data = Subject::query()->get();
        return $this->successResponse(null, $data);
    }

    public function getSubjectTopics($subj_id){
        $data = Topic::query()->where('subject_id', $subj_id)->get();
        return $this->successResponse(null, $data);

    }

    public function getSubjectContents($subj_id){
        $data = Content::query()->where('subject_id', $subj_id)->get();
        return $this->successResponse(null, $data);

    }
}
