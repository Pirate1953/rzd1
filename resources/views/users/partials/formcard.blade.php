<h4 class="mb-3">{{__('Данные карты')}}</h4>
@if ($errors->count())
    {{-- Перечень ошибок. --}}
    <div class="alert alert-danger">
        {{ Html::ul($errors->all()) }}
    </div>
@endif

  <label>{{__('Card Number')}}</label>
  <input type="number" name="number" class="form-control" placeholder="Введите номер карты" required>

  <label>{{__('Choose pay way')}}</label>
  {{ Form::select('paymethod_id', $paymethods, null, ['class' => 'custom-select d-block w-100'])}}
  <hr>
