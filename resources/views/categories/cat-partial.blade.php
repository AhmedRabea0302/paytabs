@foreach($categorychilds as $child)
    <tr data-id="{{$child->id}}" data-leaf="{{count(array($child->categorychilds)) > 0 ? 0 : 1}}"  data-parent="{{$dataParent}}" data-level = "{{++$dataLevel}}" style="color: #0173ba">
        <td data-column="name" data-leaf="{{count(array($child->categorychilds) ) > 0 ? 0 : 1}}" style="border-top:none; cursor: pointer">
            @if(count(array($child->categorychilds)) > 0)
                <i class="fa fa-folder" style="padding-right: 5px"> </i>{{$child->cat_name}}
            @else 
                <i class="fa fa-file" style="padding-right: 5px"> </i>
            @endif
            @if(!(count(array($child->categorychilds) )) > 0)
                {{$child->title}}
            @endif
        </td>
    </tr>
    @if(count(array($child->categorychilds) ))
        @include('categories.cat-partial',['categorychilds' => $child->childrencategories, 'dataParent' => $child->id , 'dataLevel' => $dataLevel])
    @endif
@endforeach
