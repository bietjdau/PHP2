<div class="post-entry-1">
    <a href="/post/{{ $post['id'] }}"><img src="{{ $post['image'] }}" alt="" class="img-fluid"></a>
    <div class="post-meta"><span class="date">{{ $post['category_name'] }}</span> <span class="mx-1">&bullet;</span>
        <span>{{ $post['date'] }}</span>
    </div>
    <h2><a href="/post/{{ $post['id'] }}">{{ $post['title'] }}</a></h2>
</div>
