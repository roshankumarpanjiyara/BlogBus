@forelse ($posts as $post)
    <a href="{{route('post.show',[$post->id,$post->slug])}}?category={{$post->category->name}}&author={{$post->created_by}}" style="color:#222d32"><p>{{$post->title}}</p></a>
@empty
    <p>no data found!</p>
@endforelse
