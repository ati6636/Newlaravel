<div>
    <input wire:model="search" name="search" type="text" class="input" list="myList" placeholder="Search product..." />

    @if(!empty($query))
        <datalist id="myList">
            @foreach($dataList as $data)
                <option value="{{$data->title}}"> {{$data->category->title}}</option>
            @endforeach
        </datalist>
    @endif
</div>
