<div class="news-story {{ post.data.class }}">
  <h3 class="news-title">{{ post.data.title }}</h3>
  <h3 class="news-date">{{ post.data.dateString }}</h3>
  <div class="news-thumbnail">
    <a href="{{ post.data.hyperlink }}">
      <img class="news-thumbnail-image" src="{{ post.data.thumbnailImage }}">
    </a>
    {{ post.data.videoLink | safe}}
  </div>
  <div class="main-content">
    <h3 class="post-title"><a href="{{ post.data.postUrl }}" target="_blank">{{ post.data.postTitle }}</a></h3>

    {{ post.templateContent | safe }}
  </div>
</div>
