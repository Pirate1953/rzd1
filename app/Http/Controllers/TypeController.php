<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;

class TypeController extends Controller
{
    public function __construct()
    {
      $this->authorizeResource(Type::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Type $type)
    {
      $this->authorize('view', $type);
      $types = Type::orderBy('number', 'ASC')->get();
      return view('types.index')->withTypes($types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorizeResource(Type::class);
      $type = new Type();
      return view('types.create')->withType($type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
      $attributes = $request->only(['number', 'name']);
      $type = Type::create($attributes);
      $request->session()->flash(
          'message',
          __('Added type', ['name' => $type->name])
      );
      return redirect(route('types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
      return view('types.edit')->withType($type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
      $attributes = $request->only(['number', 'name']);
      $type->update($attributes);
      $request->session()->flash(
          'message',
          __('Updated type', ['name' => $type->name])
      );
      return redirect(route('types.index'));
    }

    /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function remove(Type $type)
    {
        $this->authorize('delete', $type);
        // Использовать шаблон resources/views/types/remove.blade.php, где…
        // …переменная $type ⁠— это объект типа.
        return view('types.remove')->withType($type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type, Request $request)
    {
      $type->delete();
      $request->session()->flash(
          'message',
          __('Removed type', ['name' => $type->name])
      );
      return redirect(route('types.index'));
    }
}
