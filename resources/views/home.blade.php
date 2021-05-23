@extends('layouts.master')
@section('content')

    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Please Select a Category</h2>

                    <div class="boxes">
                        <div class="main-box">
                            <select name="selectbox" id="mainCategory" class="form-control">
                                <option value="">Select Category</option>
                                <option value="A" data-id="1">Category A</option>
                                <option value="B" data-id="2">Category B</option>
                            </select>
                        </div>
                    </div>

                </div>
    
                <div class="col-md-6">
                    <div class="right-box">
                        @if (count(array($categories)))
                            <div>
                                <button class="btn btn-primary pull-right reset">Reset Tree</button>
                            </div><br><br>
                        @endif
                        <div class="alert alert-success" style="display: none">
                            <p>Tree Reseted Successfully!</p>
                        </div>
                        <table id="tree-table" class="table">
                            <tbody>
                                {{-- <i class="fa fa-plus open-all" style="cursor: pointer"></i> <mark>فتح الجميع</mark> --}}
                                @foreach($categories as $cat)
                                    <tr data-id="{{$cat->id}}" data-leaf="{{count(array($cat->childrencategories)) > 0 ? 0 : 1}}" data-parent="0" data-level="1" style="color: #57585a;">
                                        <td data-column="name" data-leaf="{{count(array($cat->childrencategories)) > 0 ?  : 1}}" style=" border-top: none">
                                            @if(count($cat->childrencategories))
                                                <i class="fa fa-folder"> </i>
                                            @else 
                                                <i class="fa fa-file"> </i>
                                            @endif 
                                            {{$cat->cat_name}}
                                        </td>
                                    </tr>
                                    @if(count($cat->childrencategories))
                                        @include('categories.cat-partial',['categorychilds' => $cat->childrencategories, 'dataParent' => $cat->id , 'dataLevel' => 1])
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
    </section>

    @section('scripts')
        <script src="{{asset('assets/js/app.js')}}" type="text/javascript"></script>
    @endsection

@endsection