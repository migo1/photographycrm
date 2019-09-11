<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="card-body">
                        <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Category :</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category_id">
                                        @foreach ( $categories as $category)
                                    <option value=""></option>
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" >
                    <div class="form-group row">
                        <label  class="col-sm-3 text-right control-label col-form-label">Date:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="date" placeholder="YYYY-MM-DD">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label  class="col-sm-3 text-right control-label col-form-label">Time:</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" name="time" >
                        </div>
                    </div>
                        
                    <div class="form-group row">
                        <label  class="col-sm-3 text-right control-label col-form-label">Total photos:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="total_photos" >
                        </div>
                    </div>
                    <input type="hidden" name="charges">
                        
                    
                </div>
        </div>
    </div>
</div>