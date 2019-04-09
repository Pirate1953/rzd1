<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Http\Request;
use App\Http\Requests\ZoneRequest;

class ZoneController extends Controller
{
  public function __construct()
   {
     $this->authorizeResource(Zone::class);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Zone $zone)
    {
      $this->authorize('view', $zone);
      // Извлекаем из БД коллекцию товаров,
      // отсортированных по возрастанию значений атрибута number
      $zones = Zone::orderBy('number', 'ASC')->paginate(6);
      // Использовать шаблон resources/views/zones/index.blade.php, где…
      return view('zones.index')->withZones($zones);
      //return view('zones.index', compact('zones', 'prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorizeResource(Zone::class);
      // Форма добавления продукта в БД.
      // Создаём в ОЗУ новый экземпляр (объект) класса Zone.
      $zone = new Zone();
      // Использовать шаблон resources/views/zones/create.blade.php, в котором…
      return view('zones.create')->withZone($zone);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZoneRequest $request)
    {
      $this->authorizeResource(Zone::class);
      // Добавление продукта в БД
      // Принимаем из формы значения полей.
      $attributes = $request->only(['number', 'name', 'price']);
      // Создаём кортеж в БД.
      $zone = Zone::create($attributes);
      // Создаём всплывающее сообщение об успешном сохранении в БД:
      // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
      // (см. resources/lang/ru/messages.php).
      $request->session()->flash(
          'message',
          __('Added zone', ['name' => $zone->name])
      );
      // Перенаправляем клиент HTTP на маршрут с именем zones.index
      // (см. routes/web.php).
      return redirect(route('zones.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        //
    }

    public function sort(Request $request, Zone $zone)
    {
      $this->authorize('search', Zone::class);
      $attributes = $request->only(['price']);
      $zones = Zone::where('price', '=', $attributes['price'])->get();
      return view('zones.indexsort')->withZones($zones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
      $this->authorizeResource(Zone::class);
      // Форма редактирования продукта в БД.
      // Использовать шаблон resources/views/zones/edit.blade.php, в котором…
      return view('zones.edit')->withZone($zone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(ZoneRequest $request, Zone $zone)
    {
      $this->authorizeResource(Zone::class);
      // Редактирование продукта в БД.
      // Принимаем из формы значения полей
      $attributes = $request->only(['number', 'name', 'price']);
      // Обновляем кортеж в БД.
      $zone->update($attributes);
      // Создаём всплывающее сообщение об успешном обновлении БД
      $request->session()->flash(
          'message',
          __('Updated zone', ['name' => $zone->name])
      );
      // Перенаправляем клиент HTTP на маршрут с именем zones.index
      // (см. routes/web.php).
      return redirect(route('zones.index'));
    }

    /**
     * Show the form for removing the specified resource.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function remove(Zone $zone)
    {
        $this->authorize('delete', $zone);
        // Использовать шаблон resources/views/zones/remove.blade.php, где…
        // …переменная $zones объект.
        return view('zones.remove')->withZone($zone);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone, Request $request)
    {
      $this->authorizeResource(Zone::class);
      // Удаляем товар из БД.
      $zone->delete();

      // Создаём всплывающее сообщение об успешном удалении из БД
      $request->session()->flash(
          'message',
          __('Removed zone', ['name' => $zone->name])
      );

      // Перенаправляем клиент HTTP на маршрут с именем zones.index
      // (см. routes/web.php).
      return redirect(route('zones.index'));
    }
}
