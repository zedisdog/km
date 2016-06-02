<?php

namespace App\Http\Controllers;

use App\Model\Topic;
use App\Repositories\TopicRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use TomLingham\Searchy\Facades\Searchy;
use YuanChao\Editor\EndaEditor;

class TopicController extends Controller
{
    public $topic;

    public function __construct(TopicRepository $topic)
    {
        $this->middleware('auth',['except' => ['show','search']]);
        $this->topic = $topic;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(null,404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $this->topic->create($request->all());
        return redirect(route('topic.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=1)
    {
        //
        if($topic = $this->topic->find($id,['title','content','created_at','updated_at'])){
            $topic = $topic->toArray();
            $topic['content'] = EndaEditor::MarkDecode($topic['content']);
        }else{
            $topic = [];
        }
        
        return view('topics.show',$topic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Topic $topic
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Topic $topic)
    {
        //
        return view('topics.edit',['topic' => $topic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->topic->update($request->all(), $id);
        return redirect(route('topic.edit',['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function uploadImage()
    {
        $data = EndaEditor::uploadImgFile('topic-image');

        return json_encode($data);
    }
    
    public function search(Request $request)
    {
        $this->validate($request,[
            'query' => 'required'
        ]);
        
        $topics = Searchy::topics('title','ab','content')->query($request->input('query'))->get();

        $topics = collect(array_map(function($result) {
            return (new Topic())->fill(get_object_vars($result));
        }, Searchy::topics('title', 'ab','content')->query($request->input('query'))->get()));

        
        return view('topics.search')->withTopics($topics)->withQuery($request->input('query'));
    }
    
    public function ajaxTopics(Request $request){
        $query = $request->input('query');
        if($query){
            $collection = collect(array_map(function($result) {
                return (new Topic())->fill(get_object_vars($result));
            }, Searchy::topics('title')->select('id','title')->query($query)->get()));

            $result = [];
            foreach ($collection as $item){
                $result[$item->title] = route('topic.show',['id' => $item->id]);
            }

            return $result;
        }else{
            return array_pluck(Topic::all('title')->toArray(),'title');
        }
    }
}
