  @foreach($words as $title)
  <?php
  $title->title = ucwords(strtolower($title->title));
  ?>
  <a href="{{asset('/post-full-view/'.$title->id)}}" onclick="set_item({{$title->title}})">
  {{$title->title}}
     </a>
  <br/>
  @endforeach