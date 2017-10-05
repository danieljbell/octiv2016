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