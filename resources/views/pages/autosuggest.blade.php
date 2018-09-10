  @foreach($words as $title)
  <?php
  $title->title = ucwords(strtolower($title->title));
  ?>
  <a href="{{asset('/post-full-view/'.$title->id.'/'.str_replace(' ', '-', strtolower($title->title)))}}" onclick="set_item({{$title->title}})">
  {{$title->title}}
     </a>
  <br/>
  @endforeach