<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    function __construct()
    {
        $this->middleware(
            'permission:jurusan-list|jurusan-create|jurusan-edit|jurusan-delete',
            ['only' => ['index', 'show']]
        );
        $this->middleware(
            'permission::jurusan-create',
            ['only' => ['store', 'create']]
        );
        $this->middleware(
            'permission::jurusan-edit',
            ['only' => ['edit', 'update']]
        );
        $this->middleware(
            'permission::jurusan-delete',
            ['only' => ['destroy']]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = jurusan::latest()->paginate(5);
        return view('jurusan.index', compact('jurusan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'jurusan' => 'required'
        ]);

        Jurusan::create($request->all());

        return redirect()->route('jurusan.index')
            ->with('success', 'Data Jurusan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(jurusan $jurusan)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jurusan $jurusan)
    {
        request()->validate([
            'jurusan'   => 'required'
        ]);

        $jurusan->update($request->all());

        return redirect()->route('jurusan.index')
            ->with('success', 'Data Jurusan berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index')
            ->with('success', 'Data Jurusan berhasil diapus');
    }
}
