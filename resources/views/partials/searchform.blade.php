<section class="search-area">
    <div class="col-md-12">
        <div class="container">
            <form method="post" action="{{ route('search') }}" id="search-form">
                {{ csrf_field() }}
                <div class="controls col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <input type="text" id="profession_field" name="profession_title" placeholder="Find Service  e.g Orange Lab" class="form-control" onkeyup="showFields();">
                            </div>
                        </div>
                        <div class="hidden" id="filters">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <input type="text" id="location" name="location" placeholder="Enter location you want to find service" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="search-category-container">
                                    <label class="styled-select">
                                        <select class="dropdown-product selectpicker form-control" name="service_category">
                                            <option value="">Select Service Category</option>
                                                @foreach ($category as $name)
                                <option value="{{$name->name}}">{{$name->name}}</option>
                                @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-6">
                            <button type="submit" class="btn btn-common"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>