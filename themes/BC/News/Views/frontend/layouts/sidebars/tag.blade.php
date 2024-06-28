@if(!empty($model_tag))
<div class="sidebar-widget widget_tag_cloud">
    <div class="sidebar-title"><h2>{{ $item->title }}</h2></div>
    <div class="tagcloud">
        @php
            $list_tags = \Modules\News\Models\NewsTag::getTags();
            $limit = 5; 
        @endphp
        <ul id="tagList">
            @if($list_tags)
                @foreach($list_tags as $index => $tag)
                    @php $translation = $tag->translate() @endphp
                    @if($index < $limit)
                        <li><a href="{{ $tag->getDetailUrl(app()->getLocale()) }}" class="tag-cloud-link">{{$translation->name}}</a></li>
                    @else
                        <li class="more-tags" style="display: none;"><a href="{{ $tag->getDetailUrl(app()->getLocale()) }}" class="tag-cloud-link">{{$translation->name}}</a></li>
                    @endif
                @endforeach
            @endif
        </ul>
        </div>
        <div class="tag-readmore" style="margin-top: -15px;">
        @if(count($list_tags) > $limit)
        <a href="javascript:void(0);" id="readMoreBtn" class="btn-readmore">Read More</a>
        @endif
        </div>
</div>

<script>
    document.getElementById('readMoreBtn').addEventListener('click', function() {
        var moreTags = document.querySelectorAll('.more-tags');
        for (var i = 0; i < moreTags.length; i++) {
            moreTags[i].style.display = 'list-item';
        }
        this.style.display = 'none'; 
    });
</script>
@endif
