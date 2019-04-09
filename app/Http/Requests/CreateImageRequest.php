<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      // Полный перечень правил доступен по веб‑адресу:
      // https://laravel.com/docs/5.4/validation#available-validation-rules
      return [
          'filename' => [

              // Копия файла должна быть успешно загружена на сервер.
              'file',

              // Максимальное количество информации, кБ
              // (В конфигурационном файле PHP ⁠— php.ini по умолчанию
              // директива upload_max_filesize = 2M, т. е. 2000 кБ.)
              'max:2000',

              // Допустимые медиатипы (без учёта расширений имён файлов).
              // Правило image не подходит, т. к. помимо GIF, JPEG, PNG, SVG
              // допускает формат BMP, который браузеры не обязаны понимать.
              // Способ 1. По медиаподтипу
              // (<https://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types/>).
              //'mimes:gif,jpeg,png,svg',
              // Способ 2. По медиатипу и медиаподтипу
              // (<https://www.iana.org/assignments/media-types/>).
              'mimetypes:image/gif,image/jpeg,image/png,image/svg+xml',

              // Обязательное поле.
              'required',

          ]
      ];
    }
}
