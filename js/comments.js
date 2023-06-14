$(document).ready(function() {
    // Load comments on page load
    $.ajax({
      type: 'GET',
      url: 'comments/comments.json',
      dataType: 'json',
      success: function(comments) {
        // Display existing comments
        $.each(comments, function(index, comment) {
          var commentHTML = '<div class="comment">';
          commentHTML += '<p>Name: ' + comment.fname + ' ' + comment.lname + '</p>';
          commentHTML += '<p>Email: ' + comment.email + '</p>';
          commentHTML += '<p>Comment: ' + comment.comment + '</p>';
          commentHTML += '<hr>';
          commentHTML += '</div>';
  
          $('#comments-container').append(commentHTML);
        });
      }
    });
  
    // Handle form submission using AJAX when the submit button is clicked
    $('#submit-btn').click(function() {
      var form = $('#comment-form');
      var url = form.attr('action');
      var formData = form.serialize(); // Serialize form data
  
      $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function(response) {
          // Display submitted comment
          $('#comments-container').append(response);
  
          // Clear the form
          form.trigger('reset');
        }
      });
    });
      // Refresh comments after form submission
    $('#comment-form').submit(function(e) {
        e.preventDefault(); // Prevent form submission
        loadComments(); // Load and display comments
  });
  });
  