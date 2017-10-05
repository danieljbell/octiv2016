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

var stuff;

$.ajax({
    dataType: "json",
    async: false,
    url: "/wp-json/wp/v2/posts?per_page=9",
    success: function(data) {
        stuff = data;
    }
});

var app = new Vue({
  el: '#searchable-resources',
  data: {
    keyword: ' ',
    postList: stuff
  },
  computed: {
    filteredList() {
      return this.postList.filter((post) => {
        return post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase());
      });
    }
  }
});
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInJlc291cmNlcy5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsImZpbGUiOiJyZXNvdXJjZXMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJ3aW5kb3cuaHRtbGVudGl0aWVzID0ge1xuICAvKipcbiAgICogQ29udmVydHMgYSBzdHJpbmcgdG8gaXRzIGh0bWwgY2hhcmFjdGVycyBjb21wbGV0ZWx5LlxuICAgKlxuICAgKiBAcGFyYW0ge1N0cmluZ30gc3RyIFN0cmluZyB3aXRoIHVuZXNjYXBlZCBIVE1MIGNoYXJhY3RlcnNcbiAgICoqL1xuICBlbmNvZGUgOiBmdW5jdGlvbihzdHIpIHtcbiAgICB2YXIgYnVmID0gW107XG4gICAgXG4gICAgZm9yICh2YXIgaT1zdHIubGVuZ3RoLTE7aT49MDtpLS0pIHtcbiAgICAgIGJ1Zi51bnNoaWZ0KFsnJiMnLCBzdHJbaV0uY2hhckNvZGVBdCgpLCAnOyddLmpvaW4oJycpKTtcbiAgICB9XG4gICAgXG4gICAgcmV0dXJuIGJ1Zi5qb2luKCcnKTtcbiAgfSxcbiAgLyoqXG4gICAqIENvbnZlcnRzIGFuIGh0bWwgY2hhcmFjdGVyU2V0IGludG8gaXRzIG9yaWdpbmFsIGNoYXJhY3Rlci5cbiAgICpcbiAgICogQHBhcmFtIHtTdHJpbmd9IHN0ciBodG1sU2V0IGVudGl0aWVzXG4gICAqKi9cbiAgZGVjb2RlIDogZnVuY3Rpb24oc3RyKSB7XG4gICAgcmV0dXJuIHN0ci5yZXBsYWNlKC8mIyhcXGQrKTsvZywgZnVuY3Rpb24obWF0Y2gsIGRlYykge1xuICAgICAgcmV0dXJuIFN0cmluZy5mcm9tQ2hhckNvZGUoZGVjKTtcbiAgICB9KTtcbiAgfVxufTtcblxudmFyIHN0dWZmO1xuXG4kLmFqYXgoe1xuICAgIGRhdGFUeXBlOiBcImpzb25cIixcbiAgICBhc3luYzogZmFsc2UsXG4gICAgdXJsOiBcIi93cC1qc29uL3dwL3YyL3Bvc3RzP3Blcl9wYWdlPTlcIixcbiAgICBzdWNjZXNzOiBmdW5jdGlvbihkYXRhKSB7XG4gICAgICAgIHN0dWZmID0gZGF0YTtcbiAgICB9XG59KTtcblxudmFyIGFwcCA9IG5ldyBWdWUoe1xuICBlbDogJyNzZWFyY2hhYmxlLXJlc291cmNlcycsXG4gIGRhdGE6IHtcbiAgICBrZXl3b3JkOiAnICcsXG4gICAgcG9zdExpc3Q6IHN0dWZmXG4gIH0sXG4gIGNvbXB1dGVkOiB7XG4gICAgZmlsdGVyZWRMaXN0KCkge1xuICAgICAgcmV0dXJuIHRoaXMucG9zdExpc3QuZmlsdGVyKChwb3N0KSA9PiB7XG4gICAgICAgIHJldHVybiBwb3N0LnRpdGxlLnJlbmRlcmVkLnRvTG93ZXJDYXNlKCkuaW5jbHVkZXModGhpcy5rZXl3b3JkLnRvTG93ZXJDYXNlKCkpO1xuICAgICAgfSk7XG4gICAgfVxuICB9XG59KTsiXX0=
