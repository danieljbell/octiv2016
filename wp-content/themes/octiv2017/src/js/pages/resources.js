$.ajax({
  dataType: "json",
  async: false,
  url: "/wp-json/wp/v2/" + pagePostType + "?_embed&order=" + postOrder + "&orderby=" + postOrderBy + "&per_page=" + postsPerPage,
  error: function() {
    console.log('oops!');
  },
  success: function(data) {
    var app = new Vue({
      el: '#searchable-resources',
      data: {
        keyword: '',
        postList: data,
        offset: 0,
        selectedCats: []
      },
      methods: {
        getMorePosts(postList) {
          var newOffset = this.offset += postsPerPage;
          var postList = this.postList;
          $.ajax({
            dataType: "json",
            async: false,
            url: "/wp-json/wp/v2/" + pagePostType + "?_embed&order=" + postOrder + "&per_page=" + postsPerPage + "&offset=" + newOffset,
          }).done(function(data) {
            var prettyPageType;
            if (pagePostType === 'posts') {
              prettyPageType = 'Blog Posts';
            } else if (pagePostType === 'client-story') {
              prettyPageType = 'Client Stories';
            } else if (pagePostType === 'library') {
              prettyPageType = 'Library Content';
            } else if (pagePostType === 'events') {
              prettyPageType = 'Events';
            }
            var resp = data;
            for (var i = 0; i < resp.length; i++) {
              postList.push(resp[i]);
            }
            if (resp.length < postsPerPage) {
              $('#load-more-posts').parent().html('<h2 class="mar-t-more">All ' + prettyPageType + ' loaded</h2>');
            }
          });
        }
      },
      computed: {
        filteredList() {
          return this.postList.filter((post) => {
            if (window.location.href.indexOf("client-stories") > -1) {
              return post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase());
            } else if (window.location.href.indexOf("library") > -1) {
              if (post.parent <= 0) {
                return (post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase())) && (post._embedded['wp:term'][0][0].slug.includes(this.selectedCats));
              }
            } else {
              return (post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase())) && (post._embedded['wp:term'][0][0].slug.includes(this.selectedCats));
            }
          });
        }
      }
    });
  }
});



