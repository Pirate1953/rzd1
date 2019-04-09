<?php

namespace App\Http\Controllers;

use App\Image;
use App\Http\Requests\CreateImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct()
    {
        // Имя «диска».
        $this->disk = 'image_disk';
    }

    // Просмотр перечня изображений.
    public function index()
    {
        return view('images.index', [
            'images' => Image::orderBy('id')->get()
        ]);
    }

    // Просмотр одного изображения.
    public function show($id)
    {
        return view('images.show', [
            'image' => Image::findOrFail($id)
        ]);
    }

    // Формуляр добавления.
    public function new()
    {
        return view('stations.addimage', [
            'image' => new Image()
        ]);
    }

    // Добавление.
    public function create(CreateImageRequest $request)
    {
        // Извлекаем из запроса информацию о загруженном файле:
        // $file ⁠— объект класса Illuminate\Http\UploadedFile;
        // 'file' ⁠— имя (атрибут name) соответствующего виджета из формуляра.
        $file = $request->file('file');

        // Загруженный файл хранится на сервере до останова сценария PHP.
        // Полный путь к нему можно получить через вызов: $file->getPathName().
        // Наша задача ⁠— скопировать этот файл в хранилище (на «диск»).

        // Сохраняем файл на «диске»:
        // - каталог указан в настройках image_disk в config/filesystems.php;
        // - дочерние каталоги не будут использованы ('');
        // - имя и расширение будут назначены автоматически и возвращено.
        // Можно было бы вызвать $filename = $file->store('', $this->disk),
        // но есть проблема: <https://github.com/laravel/internals/issues/161/>.
        $filename = $this->fixedStore($file, '', $this->disk);

        try {
            // Пытаемся создать запись в БД.
            $image = Image::create([
                'filename' => $filename,
            ]);
        } catch (\Exception $exception) {
            // При возникновении исключительной ситуации…
            // …удаляем файл с «диска»…
            Storage::disk($this->disk)->delete($filename);
            // …пробрасываем исключительную ситуацию.
            throw $exception;
        }

        return redirect(route('images.show', [
            'id' => $image->id
        ]));
    }

    private function fixedStore($file, $path, $disk)
    {
        // Копируем в $folder путь к каталогу «диска».
        $folder = Storage::disk($disk)->getAdapter()->getPathPrefix();

        // В каталоге $folder создаём пустой временный файл с уникальным именем
        // (без префикса) и заносим абсолютный путь к этому файлу в $temp.
        // Примечание: встроенная функция PHP tempnam() потокобезопасна.
        $temp = tempnam($folder, '');

        // Копируем в $filename имя временного файла без пути и расширения.
        $filename = pathinfo($temp, PATHINFO_FILENAME);

        // Копируем в $extension расширение загруженного файла.
        $extension = $file->extension();

        try {
            // Пытаемся сохранить загруженный файл на «диске».
            $basename = $file->storeAs($path, "$filename.$extension", $disk);
        } catch (\Exception $exception) {
            // Пробрасываем исключительную ситуацию после finally.
            throw $exception;
        } finally {
            // Независимо от результата, удаляем временный файл.
            unlink($temp);
        }

        // Возвращаем базовое (с расширением) имя сохранённого файла.
        return $basename;
    }

    // Формуляр удаления.
    public function remove($id)
    {
        return view('images.remove', [
            'image' => Image::findOrFail($id)
        ]);
    }

    // Удаление.
    public function destroy($id)
    {
        // Транзакция на извлечение кортежа по значению первичного ключа.
        $image = Image::findOrFail($id);
        // Удаляем файл с «диска».
        Storage::disk($this->disk)->delete($image->filename);
        // Удаляем кортеж.
        $image->delete();
        return redirect(route('images.index'));
    }
}
