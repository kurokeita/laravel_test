<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;
Use App\Http\Requests\CreateUserRequest;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function list(Request $request)
    {
        // $sortBy = $request->query('sortby');
        // $orderBy = $request->query('orderby');
        // if($sortBy != null) echo 'yup'; else echo 'nope';
        // echo $sortBy.' '.$orderBy;
        // $users = users::paginate(20)->where('id', 150);
        // $users = users::orderBy($sortBy, $orderBy)->where('id', '>', '0')->paginate(20);
        // $users->appends(['sortby' => $sortBy, 'orderby' => $orderBy]);
        // $users->withPath('list');
        // $id = array(1,2,3,4);
        // $users = users::whereIn('id', $id)->paginate(2);
        // return view('resourcesUsers', compact('users'));
    }


    public function index(Request $request)
    {   
        $sortby = $request->query('sortby');
        $orderby = $request->query('orderby');
        $orderby = ($orderby != null)?$orderby:'asc';
        if($sortby != null) {
            $users = users::orderBy($sortby, $orderby)->paginate(20);
            $users->appends(['sortby' => $sortby, 'orderby' => $orderby]);
        }
        else $users = users::paginate(20);
        $sort = $sortby.' '.$orderby;
        // $users = users::paginate(20)->where('id', 150);
        
        // $users->withPath('list');
        // $id = array(1,2,3,4);
        // $users = users::whereIn('id', $id)->paginate(2);
        return view('resourcesUsers', compact('users', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resourcesCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        // $_user = $request->all();
        $validated = $request->validated();
        $user = new users;
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->dob = $request->input('dob');
        $user->save();
        return redirect('test/resources');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = users::findOrFail($id);
        echo $user->firstName.'<br>'.$user->lastName.'<br>'.$user->dob.'<br>'.$user->created_at.'<br>'.$user->updated_at;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = users::findOrFail($id);
        return view('resourcesEdit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserRequest $request, $id)
    {
        $validated = $request->validated();
        $user = users::findOrFail($id);
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->dob = $request->input('dob');
        $user->save();
        return redirect('test/resources/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = users::findOrFail($id);
        $user->delete();
        return redirect('test/resources');
    }
}
