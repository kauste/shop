<div class="card mb-4">
    <div class="card-header">Sort Filter Search</div>
    <div class="card-body">
        <form class="delete" action="" method="get">
            <div class="container">
                <div class="row">
                    <form method="get" action="{{route('clothes-list')}}">
                        <div class="col-3">
                            <div class="form-group">
                                <label>What sort do you want?</label>
                                <select class="form-control" name="sort">
                                    <option value="default" @if($sort=='default' ) selected @endif>Default sort</option>
                                    <option value="name-asc" @if($sort=='name-asc' ) selected @endif>Name, A-Z</option>
                                    <option value="name-desc" @if($sort=='name-desc' ) selected @endif>Name, Z-A</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Which shop?</label>
                                <select class="form-control" name="filter">
                                    <option value="0" @if($filter==0) selected @endif>No Filter, please</option>
                                    @foreach($shops as $shop)
                                    <option value="{{$shop->id}}" @if($filter==$shop->id) selected @endif>{{$shop->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-outline-warning m-2 mt-4">Sort!</button>
                            <a class="btn btn-outline-success m-2 mt-4" href="{{route('clothes-list')}}">Clear!</a>
                        </div>
                    </form>
                </div>
            </div>
        </form>
        <form  method="get" action="{{route('clothes-list')}}">
            <div class="container">
                <div class="row">
                    <div class="col-10">
                        <div class="form-group">
                            <label>Do search</label>
                            <input class="form-control" type="text" name="s" value="" />
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-outline-warning mt-4">Search!</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
