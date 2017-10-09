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
    url: "/wp-json/wp/v2/posts?per_page=9",
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
              url: "/wp-json/wp/v2/posts?per_page=9&offset=" + newOffset,
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




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJyZXNvdXJjZXMuanMiXSwic291cmNlc0NvbnRlbnQiOlsid2luZG93Lmh0bWxlbnRpdGllcyA9IHtcbiAgLyoqXG4gICAqIENvbnZlcnRzIGEgc3RyaW5nIHRvIGl0cyBodG1sIGNoYXJhY3RlcnMgY29tcGxldGVseS5cbiAgICpcbiAgICogQHBhcmFtIHtTdHJpbmd9IHN0ciBTdHJpbmcgd2l0aCB1bmVzY2FwZWQgSFRNTCBjaGFyYWN0ZXJzXG4gICAqKi9cbiAgZW5jb2RlIDogZnVuY3Rpb24oc3RyKSB7XG4gICAgdmFyIGJ1ZiA9IFtdO1xuICAgIFxuICAgIGZvciAodmFyIGk9c3RyLmxlbmd0aC0xO2k+PTA7aS0tKSB7XG4gICAgICBidWYudW5zaGlmdChbJyYjJywgc3RyW2ldLmNoYXJDb2RlQXQoKSwgJzsnXS5qb2luKCcnKSk7XG4gICAgfVxuICAgIFxuICAgIHJldHVybiBidWYuam9pbignJyk7XG4gIH0sXG4gIC8qKlxuICAgKiBDb252ZXJ0cyBhbiBodG1sIGNoYXJhY3RlclNldCBpbnRvIGl0cyBvcmlnaW5hbCBjaGFyYWN0ZXIuXG4gICAqXG4gICAqIEBwYXJhbSB7U3RyaW5nfSBzdHIgaHRtbFNldCBlbnRpdGllc1xuICAgKiovXG4gIGRlY29kZSA6IGZ1bmN0aW9uKHN0cikge1xuICAgIHJldHVybiBzdHIucmVwbGFjZSgvJiMoXFxkKyk7L2csIGZ1bmN0aW9uKG1hdGNoLCBkZWMpIHtcbiAgICAgIHJldHVybiBTdHJpbmcuZnJvbUNoYXJDb2RlKGRlYyk7XG4gICAgfSk7XG4gIH1cbn07XG5cbiQuYWpheCh7XG4gICAgZGF0YVR5cGU6IFwianNvblwiLFxuICAgIGFzeW5jOiBmYWxzZSxcbiAgICB1cmw6IFwiL3dwLWpzb24vd3AvdjIvcG9zdHM/cGVyX3BhZ2U9OVwiLFxuICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpIHtcbiAgICAgIHZhciBhcHAgPSBuZXcgVnVlKHtcbiAgICAgICAgZWw6ICcjc2VhcmNoYWJsZS1yZXNvdXJjZXMnLFxuICAgICAgICBkYXRhOiB7XG4gICAgICAgICAga2V5d29yZDogJyAnLFxuICAgICAgICAgIHBvc3RMaXN0OiBkYXRhLFxuICAgICAgICAgIG9mZnNldDogMFxuICAgICAgICB9LFxuICAgICAgICBtZXRob2RzOiB7XG4gICAgICAgICAgZ2V0TW9yZVBvc3RzKHBvc3RMaXN0KSB7XG4gICAgICAgICAgICB2YXIgbmV3T2Zmc2V0ID0gdGhpcy5vZmZzZXQgKz0gOTtcbiAgICAgICAgICAgIHZhciBwb3N0TGlzdCA9IHRoaXMucG9zdExpc3Q7XG4gICAgICAgICAgICB0aGlzLiRlbC5xdWVyeVNlbGVjdG9yKCdidXR0b24nKS5pbm5lclRleHQgPSAnTG9hZGluZy4uLic7XG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICBkYXRhVHlwZTogXCJqc29uXCIsXG4gICAgICAgICAgICAgIGFzeW5jOiBmYWxzZSxcbiAgICAgICAgICAgICAgdXJsOiBcIi93cC1qc29uL3dwL3YyL3Bvc3RzP3Blcl9wYWdlPTkmb2Zmc2V0PVwiICsgbmV3T2Zmc2V0LFxuICAgICAgICAgICAgfSkuZG9uZShmdW5jdGlvbihkYXRhKSB7XG4gICAgICAgICAgICAgIHZhciByZXNwID0gZGF0YTtcbiAgICAgICAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCByZXNwLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgICAgICAgICAgcG9zdExpc3QucHVzaChyZXNwW2ldKTtcbiAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAkKCcjbG9hZC1tb3JlLXBvc3RzJykudGV4dCgnTG9hZCBNb3JlIFBvc3RzJyk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgICB9XG4gICAgICAgIH0sXG4gICAgICAgIGNvbXB1dGVkOiB7XG4gICAgICAgICAgZmlsdGVyZWRMaXN0KCkge1xuICAgICAgICAgICAgcmV0dXJuIHRoaXMucG9zdExpc3QuZmlsdGVyKChwb3N0KSA9PiB7XG4gICAgICAgICAgICAgIHJldHVybiBwb3N0LnRpdGxlLnJlbmRlcmVkLnRvTG93ZXJDYXNlKCkuaW5jbHVkZXModGhpcy5rZXl3b3JkLnRvTG93ZXJDYXNlKCkpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9KTtcbiAgICB9XG59KTtcblxuXG5cbiJdLCJmaWxlIjoicmVzb3VyY2VzLmpzIn0=
