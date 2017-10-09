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
    url: "/wp-json/wp/v2/posts?per_page=9&categories=" + page_cat,
    success: function(data) {
      var app = new Vue({
        el: '#searchable-resources',
        data: {
          keyword: ' ',
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
              url: "/wp-json/wp/v2/posts?per_page=9&offset=" + newOffset + "&categories=" + page_cat,
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




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJjYXRlZ29yeS5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJ3aW5kb3cuaHRtbGVudGl0aWVzID0ge1xuICAvKipcbiAgICogQ29udmVydHMgYSBzdHJpbmcgdG8gaXRzIGh0bWwgY2hhcmFjdGVycyBjb21wbGV0ZWx5LlxuICAgKlxuICAgKiBAcGFyYW0ge1N0cmluZ30gc3RyIFN0cmluZyB3aXRoIHVuZXNjYXBlZCBIVE1MIGNoYXJhY3RlcnNcbiAgICoqL1xuICBlbmNvZGUgOiBmdW5jdGlvbihzdHIpIHtcbiAgICB2YXIgYnVmID0gW107XG4gICAgXG4gICAgZm9yICh2YXIgaT1zdHIubGVuZ3RoLTE7aT49MDtpLS0pIHtcbiAgICAgIGJ1Zi51bnNoaWZ0KFsnJiMnLCBzdHJbaV0uY2hhckNvZGVBdCgpLCAnOyddLmpvaW4oJycpKTtcbiAgICB9XG4gICAgXG4gICAgcmV0dXJuIGJ1Zi5qb2luKCcnKTtcbiAgfSxcbiAgLyoqXG4gICAqIENvbnZlcnRzIGFuIGh0bWwgY2hhcmFjdGVyU2V0IGludG8gaXRzIG9yaWdpbmFsIGNoYXJhY3Rlci5cbiAgICpcbiAgICogQHBhcmFtIHtTdHJpbmd9IHN0ciBodG1sU2V0IGVudGl0aWVzXG4gICAqKi9cbiAgZGVjb2RlIDogZnVuY3Rpb24oc3RyKSB7XG4gICAgcmV0dXJuIHN0ci5yZXBsYWNlKC8mIyhcXGQrKTsvZywgZnVuY3Rpb24obWF0Y2gsIGRlYykge1xuICAgICAgcmV0dXJuIFN0cmluZy5mcm9tQ2hhckNvZGUoZGVjKTtcbiAgICB9KTtcbiAgfVxufTtcblxuJC5hamF4KHtcbiAgICBkYXRhVHlwZTogXCJqc29uXCIsXG4gICAgYXN5bmM6IGZhbHNlLFxuICAgIHVybDogXCIvd3AtanNvbi93cC92Mi9wb3N0cz9wZXJfcGFnZT05JmNhdGVnb3JpZXM9XCIgKyBwYWdlX2NhdCxcbiAgICBzdWNjZXNzOiBmdW5jdGlvbihkYXRhKSB7XG4gICAgICB2YXIgYXBwID0gbmV3IFZ1ZSh7XG4gICAgICAgIGVsOiAnI3NlYXJjaGFibGUtcmVzb3VyY2VzJyxcbiAgICAgICAgZGF0YToge1xuICAgICAgICAgIGtleXdvcmQ6ICcgJyxcbiAgICAgICAgICBwb3N0TGlzdDogZGF0YSxcbiAgICAgICAgICBvZmZzZXQ6IDBcbiAgICAgICAgfSxcbiAgICAgICAgbWV0aG9kczoge1xuICAgICAgICAgIGdldE1vcmVQb3N0cyhwb3N0TGlzdCkge1xuICAgICAgICAgICAgdmFyIG5ld09mZnNldCA9IHRoaXMub2Zmc2V0ICs9IDk7XG4gICAgICAgICAgICB2YXIgcG9zdExpc3QgPSB0aGlzLnBvc3RMaXN0O1xuICAgICAgICAgICAgdGhpcy4kZWwucXVlcnlTZWxlY3RvcignYnV0dG9uJykuaW5uZXJUZXh0ID0gJ0xvYWRpbmcuLi4nO1xuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgZGF0YVR5cGU6IFwianNvblwiLFxuICAgICAgICAgICAgICBhc3luYzogZmFsc2UsXG4gICAgICAgICAgICAgIHVybDogXCIvd3AtanNvbi93cC92Mi9wb3N0cz9wZXJfcGFnZT05Jm9mZnNldD1cIiArIG5ld09mZnNldCArIFwiJmNhdGVnb3JpZXM9XCIgKyBwYWdlX2NhdCxcbiAgICAgICAgICAgIH0pLmRvbmUoZnVuY3Rpb24oZGF0YSkge1xuICAgICAgICAgICAgICB2YXIgcmVzcCA9IGRhdGE7XG4gICAgICAgICAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgcmVzcC5sZW5ndGg7IGkrKykge1xuICAgICAgICAgICAgICAgIHBvc3RMaXN0LnB1c2gocmVzcFtpXSk7XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgJCgnI2xvYWQtbW9yZS1wb3N0cycpLnRleHQoJ0xvYWQgTW9yZSBQb3N0cycpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgfVxuICAgICAgICB9LFxuICAgICAgICBjb21wdXRlZDoge1xuICAgICAgICAgIGZpbHRlcmVkTGlzdCgpIHtcbiAgICAgICAgICAgIHJldHVybiB0aGlzLnBvc3RMaXN0LmZpbHRlcigocG9zdCkgPT4ge1xuICAgICAgICAgICAgICByZXR1cm4gcG9zdC50aXRsZS5yZW5kZXJlZC50b0xvd2VyQ2FzZSgpLmluY2x1ZGVzKHRoaXMua2V5d29yZC50b0xvd2VyQ2FzZSgpKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgfSk7XG4gICAgfVxufSk7XG5cblxuXG4iXSwiZmlsZSI6ImNhdGVnb3J5LmpzIn0=
