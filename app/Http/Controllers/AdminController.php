<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class AdminController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');

        $users = users::latest()->paginate(5);

        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}

// crud.....

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
 */

/**
public function index()
{
    //
    $users = users::latest()->paginate(5);

    return view('users.index',compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
 */

/**
 *public function create()
{
    //
    return view('users.create');
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\RedirectResponse
 */
/**
public function store(Request $request)
{
    //
    $request->validate([
        'name' => 'required',
        'detail' => 'required',
    ]);

    users::create($request->all());

    return redirect()->route('users.index')
        ->with('success','users created successfully.');
}

/**
 * Display the specified resource.
 *
 * @param  \App\Models\users  $users
 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
 */

/**
public function show(users $users)
{
    //
    return view('users.show',compact('users'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\users  $users
 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
 */

/**
public function edit(users $users)
{
    //
    return view('users.edit',compact('users'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\users  $users
 * @return \Illuminate\Http\RedirectResponse
 */

/**
public function update(Request $request, users $users)
{
    //
    $request->validate([
        'name' => 'required',
        'detail' => 'required',
    ]);

    $users->update($request->all());

    return redirect()->route('users.index')
        ->with('success','users updated successfully');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\users  $users
 * @return \Illuminate\Http\RedirectResponse
 */

/**
public function destroy(users $users)
{
    //
    $users->delete();

    return redirect()->route('users.index')
        ->with('success','users deleted successfully');
}

}
}*/





