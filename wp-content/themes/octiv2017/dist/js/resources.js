$.ajax({
    dataType: "json",
    async: false,
    url: "/wp-json/wp/v2/" + pagePostType + "?_embed&order=" + postOrder + "&per_page=" + postsPerPage,
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
            this.$el.querySelector('button').innerText = 'Loading...';
            $.ajax({
              dataType: "json",
              async: false,
              url: "/wp-json/wp/v2/" + pagePostType + "?_embed&per_page=" + postsPerPage + "&offset=" + newOffset,
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
              if (document.body.classList.contains('page-id-3622')) {
                return post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase());
              } else {
                return (post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase())) && (post._embedded['wp:term'][0][0].slug.includes(this.selectedCats));
              }
            });
          }
        }
      });
    }
});




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJyZXNvdXJjZXMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiJC5hamF4KHtcbiAgICBkYXRhVHlwZTogXCJqc29uXCIsXG4gICAgYXN5bmM6IGZhbHNlLFxuICAgIHVybDogXCIvd3AtanNvbi93cC92Mi9cIiArIHBhZ2VQb3N0VHlwZSArIFwiP19lbWJlZCZvcmRlcj1cIiArIHBvc3RPcmRlciArIFwiJnBlcl9wYWdlPVwiICsgcG9zdHNQZXJQYWdlLFxuICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpIHtcbiAgICAgIHZhciBhcHAgPSBuZXcgVnVlKHtcbiAgICAgICAgZWw6ICcjc2VhcmNoYWJsZS1yZXNvdXJjZXMnLFxuICAgICAgICBkYXRhOiB7XG4gICAgICAgICAga2V5d29yZDogJycsXG4gICAgICAgICAgcG9zdExpc3Q6IGRhdGEsXG4gICAgICAgICAgb2Zmc2V0OiAwLFxuICAgICAgICAgIHNlbGVjdGVkQ2F0czogW11cbiAgICAgICAgfSxcbiAgICAgICAgbWV0aG9kczoge1xuICAgICAgICAgIGdldE1vcmVQb3N0cyhwb3N0TGlzdCkge1xuICAgICAgICAgICAgdmFyIG5ld09mZnNldCA9IHRoaXMub2Zmc2V0ICs9IHBvc3RzUGVyUGFnZTtcbiAgICAgICAgICAgIHZhciBwb3N0TGlzdCA9IHRoaXMucG9zdExpc3Q7XG4gICAgICAgICAgICB0aGlzLiRlbC5xdWVyeVNlbGVjdG9yKCdidXR0b24nKS5pbm5lclRleHQgPSAnTG9hZGluZy4uLic7XG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICBkYXRhVHlwZTogXCJqc29uXCIsXG4gICAgICAgICAgICAgIGFzeW5jOiBmYWxzZSxcbiAgICAgICAgICAgICAgdXJsOiBcIi93cC1qc29uL3dwL3YyL1wiICsgcGFnZVBvc3RUeXBlICsgXCI/X2VtYmVkJnBlcl9wYWdlPVwiICsgcG9zdHNQZXJQYWdlICsgXCImb2Zmc2V0PVwiICsgbmV3T2Zmc2V0LFxuICAgICAgICAgICAgfSkuZG9uZShmdW5jdGlvbihkYXRhKSB7XG4gICAgICAgICAgICAgIHZhciByZXNwID0gZGF0YTtcbiAgICAgICAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCByZXNwLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgICAgICAgICAgcG9zdExpc3QucHVzaChyZXNwW2ldKTtcbiAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAkKCcjbG9hZC1tb3JlLXBvc3RzJykudGV4dCgnTG9hZCBNb3JlIFBvc3RzJyk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgICB9XG4gICAgICAgIH0sXG4gICAgICAgIGNvbXB1dGVkOiB7XG4gICAgICAgICAgZmlsdGVyZWRMaXN0KCkge1xuICAgICAgICAgICAgcmV0dXJuIHRoaXMucG9zdExpc3QuZmlsdGVyKChwb3N0KSA9PiB7XG4gICAgICAgICAgICAgIGlmIChkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5jb250YWlucygncGFnZS1pZC0zNjIyJykpIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gcG9zdC50aXRsZS5yZW5kZXJlZC50b0xvd2VyQ2FzZSgpLmluY2x1ZGVzKHRoaXMua2V5d29yZC50b0xvd2VyQ2FzZSgpKTtcbiAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gKHBvc3QudGl0bGUucmVuZGVyZWQudG9Mb3dlckNhc2UoKS5pbmNsdWRlcyh0aGlzLmtleXdvcmQudG9Mb3dlckNhc2UoKSkpICYmIChwb3N0Ll9lbWJlZGRlZFsnd3A6dGVybSddWzBdWzBdLnNsdWcuaW5jbHVkZXModGhpcy5zZWxlY3RlZENhdHMpKTtcbiAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9KTtcbiAgICB9XG59KTtcblxuXG5cbiJdLCJmaWxlIjoicmVzb3VyY2VzLmpzIn0=
