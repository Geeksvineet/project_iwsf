<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../assets/vendors/select2/select2.min.js"></script>
<script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>
<script src="../../assets/js/settings.js"></script>
<script src="../../assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="../../assets/js/file-upload.js"></script>
<script src="../../assets/js/typeahead.js"></script>
<script src="../../assets/js/select2.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('search');
      const searchResults = document.getElementById('search-results');

      searchInput.addEventListener('input', function() {
        const query = this.value.trim();

        if (query.length > 0) {
          fetchSearchResults(query);
        } else {
          searchResults.innerHTML = '';
        }
      });

      window.addEventListener('scroll', function() {
        searchResults.innerHTML = '';
      });

      function fetchSearchResults(query) {
        fetch('../../partials/search.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'query=' + encodeURIComponent(query)
          })
          .then(response => response.text())
          .then(data => {
            searchResults.innerHTML = data;
          });
      }
    });
  </script>