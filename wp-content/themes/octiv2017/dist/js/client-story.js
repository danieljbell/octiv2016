window.htmlentities = {
  /**
   * Converts a string to its html characters completely.
   *
   * @param {String} str String with unescaped HTML characters
   **/
  encode : function(str) {
    var buf = [];
    
    for (var i=str.length-1;i>=0;i--) {
      buf.unshift(['&#', str[i].charCodeAt(), ';'].join(''));
    }
    
    return buf.join('');
  },
  /**
   * Converts an html characterSet into its original character.
   *
   * @param {String} str htmlSet entities
   **/
  decode : function(str) {
    return str.replace(/&#(\d+);/g, function(match, dec) {
      return String.fromCharCode(dec);
    });
  }
};

$.ajax({
    dataType: "json",
    async: false,
    url: "/wp-json/wp/v2/client-story",
    success: function(data) {
      var app = new Vue({
        el: '#searchable-resources',
        data: {
          keyword: '',
          postList: data,
          offset: 0
        },
        methods: {
          getMorePosts(postList) {
            var newOffset = this.offset += 9;
            var postList = this.postList;
            this.$el.querySelector('button').innerText = 'Loading...';
            $.ajax({
              dataType: "json",
              async: false,
              url: "/wp-json/wp/v2/client-story?per_page=9&offset=" + newOffset,
            }).done(function(data) {
              var resp = data;
              for (var i = 0; i < resp.length; i++) {
                postList.push(resp[i]);
              }
              $('#load-more-posts').text('Load More Posts');
            });
          }
        },
        computed: {
          filteredList() {
            return this.postList.filter((post) => {
              return post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase());
            });
          }
        }
      });
    }
});




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJjbGllbnQtc3RvcnkuanMiXSwic291cmNlc0NvbnRlbnQiOlsid2luZG93Lmh0bWxlbnRpdGllcyA9IHtcbiAgLyoqXG4gICAqIENvbnZlcnRzIGEgc3RyaW5nIHRvIGl0cyBodG1sIGNoYXJhY3RlcnMgY29tcGxldGVseS5cbiAgICpcbiAgICogQHBhcmFtIHtTdHJpbmd9IHN0ciBTdHJpbmcgd2l0aCB1bmVzY2FwZWQgSFRNTCBjaGFyYWN0ZXJzXG4gICAqKi9cbiAgZW5jb2RlIDogZnVuY3Rpb24oc3RyKSB7XG4gICAgdmFyIGJ1ZiA9IFtdO1xuICAgIFxuICAgIGZvciAodmFyIGk9c3RyLmxlbmd0aC0xO2k+PTA7aS0tKSB7XG4gICAgICBidWYudW5zaGlmdChbJyYjJywgc3RyW2ldLmNoYXJDb2RlQXQoKSwgJzsnXS5qb2luKCcnKSk7XG4gICAgfVxuICAgIFxuICAgIHJldHVybiBidWYuam9pbignJyk7XG4gIH0sXG4gIC8qKlxuICAgKiBDb252ZXJ0cyBhbiBodG1sIGNoYXJhY3RlclNldCBpbnRvIGl0cyBvcmlnaW5hbCBjaGFyYWN0ZXIuXG4gICAqXG4gICAqIEBwYXJhbSB7U3RyaW5nfSBzdHIgaHRtbFNldCBlbnRpdGllc1xuICAgKiovXG4gIGRlY29kZSA6IGZ1bmN0aW9uKHN0cikge1xuICAgIHJldHVybiBzdHIucmVwbGFjZSgvJiMoXFxkKyk7L2csIGZ1bmN0aW9uKG1hdGNoLCBkZWMpIHtcbiAgICAgIHJldHVybiBTdHJpbmcuZnJvbUNoYXJDb2RlKGRlYyk7XG4gICAgfSk7XG4gIH1cbn07XG5cbiQuYWpheCh7XG4gICAgZGF0YVR5cGU6IFwianNvblwiLFxuICAgIGFzeW5jOiBmYWxzZSxcbiAgICB1cmw6IFwiL3dwLWpzb24vd3AvdjIvY2xpZW50LXN0b3J5XCIsXG4gICAgc3VjY2VzczogZnVuY3Rpb24oZGF0YSkge1xuICAgICAgdmFyIGFwcCA9IG5ldyBWdWUoe1xuICAgICAgICBlbDogJyNzZWFyY2hhYmxlLXJlc291cmNlcycsXG4gICAgICAgIGRhdGE6IHtcbiAgICAgICAgICBrZXl3b3JkOiAnJyxcbiAgICAgICAgICBwb3N0TGlzdDogZGF0YSxcbiAgICAgICAgICBvZmZzZXQ6IDBcbiAgICAgICAgfSxcbiAgICAgICAgbWV0aG9kczoge1xuICAgICAgICAgIGdldE1vcmVQb3N0cyhwb3N0TGlzdCkge1xuICAgICAgICAgICAgdmFyIG5ld09mZnNldCA9IHRoaXMub2Zmc2V0ICs9IDk7XG4gICAgICAgICAgICB2YXIgcG9zdExpc3QgPSB0aGlzLnBvc3RMaXN0O1xuICAgICAgICAgICAgdGhpcy4kZWwucXVlcnlTZWxlY3RvcignYnV0dG9uJykuaW5uZXJUZXh0ID0gJ0xvYWRpbmcuLi4nO1xuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgZGF0YVR5cGU6IFwianNvblwiLFxuICAgICAgICAgICAgICBhc3luYzogZmFsc2UsXG4gICAgICAgICAgICAgIHVybDogXCIvd3AtanNvbi93cC92Mi9jbGllbnQtc3Rvcnk/cGVyX3BhZ2U9OSZvZmZzZXQ9XCIgKyBuZXdPZmZzZXQsXG4gICAgICAgICAgICB9KS5kb25lKGZ1bmN0aW9uKGRhdGEpIHtcbiAgICAgICAgICAgICAgdmFyIHJlc3AgPSBkYXRhO1xuICAgICAgICAgICAgICBmb3IgKHZhciBpID0gMDsgaSA8IHJlc3AubGVuZ3RoOyBpKyspIHtcbiAgICAgICAgICAgICAgICBwb3N0TGlzdC5wdXNoKHJlc3BbaV0pO1xuICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICQoJyNsb2FkLW1vcmUtcG9zdHMnKS50ZXh0KCdMb2FkIE1vcmUgUG9zdHMnKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgIH1cbiAgICAgICAgfSxcbiAgICAgICAgY29tcHV0ZWQ6IHtcbiAgICAgICAgICBmaWx0ZXJlZExpc3QoKSB7XG4gICAgICAgICAgICByZXR1cm4gdGhpcy5wb3N0TGlzdC5maWx0ZXIoKHBvc3QpID0+IHtcbiAgICAgICAgICAgICAgcmV0dXJuIHBvc3QudGl0bGUucmVuZGVyZWQudG9Mb3dlckNhc2UoKS5pbmNsdWRlcyh0aGlzLmtleXdvcmQudG9Mb3dlckNhc2UoKSk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgIH0pO1xuICAgIH1cbn0pO1xuXG5cblxuIl0sImZpbGUiOiJjbGllbnQtc3RvcnkuanMifQ==
