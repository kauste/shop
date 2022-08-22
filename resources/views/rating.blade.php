<div class="mb-3">
    <div class="flex">
        <label for="comment">Rating: @if($cloth->amount_of_rates !== 0) {{round($cloth->rate / $cloth->amount_of_rates, 2)}} @else 0 @endif</label>
        <form class="rating-form" method="post" action="{{route('rate', $cloth)}}">
            @for($i = 1; $i < 6; $i++) <div class="rating-item">
                <input class="rating-input" type="radio" id="rating-{{$i}}" name="rating" value="{{$i}}" required/>
                <label for="rating-{{$i}}">{{$i}}</label>
    </div>
    @endfor
    @csrf
    @method('put')
    <button class="btn btn-danger">Rate</button>
    </form>
</div>
</div>
