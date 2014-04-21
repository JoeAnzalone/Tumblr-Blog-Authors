<h1>Authors for <a href="http://{{ $blog }}.tumblr.com" target="_blank">{{ $blog }}</a></h1>
<ul class="authors">
@foreach ($authors as $author)
    <li>[<a title="Follow {{ $author }}" href="http://tumblr.com/follow/{{ $author }}" target="_blank">+</a>] <a href="http://{{ $author }}.tumblr.com" target="_blank">{{ $author }}</a></li>
@endforeach
</ul>

<p><a href="/" class="back"><span class="icon">&circlearrowleft;</span> Do again?</a></p>
