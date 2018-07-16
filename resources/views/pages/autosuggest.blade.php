  @foreach($words as $title)
  <?php
  $locatn->town = ucwords(strtolower($locatn->town));
  ?>
  <a href="{{asset('/post-full-view/'.$title->id)}}" onclick="set_item({{$title->title}})">
  {{$title->title}}
     </a>
  <br/>
  @endforeach